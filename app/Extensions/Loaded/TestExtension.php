<?php

namespace App\Extensions\Loaded;

use App\Extensions\Kernel as ExtensionKernel;

class TestExtension extends ExtensionKernel
{
    const EXTENSION_NAME = "TestExtension";

	public function handle()
    {
        parent::handle();
        $this->run();
    }

    /* Entry Point */
    public function run()
    {
        return 0;
    }
}