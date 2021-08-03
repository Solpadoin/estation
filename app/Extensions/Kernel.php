<?php

namespace App\Extensions;

class Kernel
{
    const EXTENSION_NAME = "Kernel";

    public function handle()
    {
        
    }

    /* Entry Point */
    public function run()
    {
        return 0;
    }

    public function name()
    {
        return static::EXTENSION_NAME;
    }
}
