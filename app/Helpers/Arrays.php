<?php

namespace App\Helpers;

trait Arrays
{
    public function __toArray(){
        return  call_user_func('get_object_vars', $this);
    }
}
