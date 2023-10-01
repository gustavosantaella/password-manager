<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        private UserService $userService,
        private AuthService $authService,
    ){    }
    public function register(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = $this->userService->findOneByEmail($email);
        if($data){
            throw new Exception("User already exists");
        }
        $password = $this->authService->hashPassword($password);
        $user = $this->userService->newUser([
            'email' => $email,
            "name" => "",
            "password" => $password
        ]);


        return Response::http($user, 201);
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = $this->userService->findOneByEmail($email);
        if(!$data){
            throw new Exception("Email not found");
        }
        return Response::http($this->authService->login($data, $password), 200);
    }
}
