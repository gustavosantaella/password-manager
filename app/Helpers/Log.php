<?php

namespace App\Helpers;

abstract class Log
{

    public static final function print(mixed $data){
        $output = new \Symfony\Component\Console\Output\ConsoleOutput();

        $output->writeln($data);
    }
}
