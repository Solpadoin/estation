<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $extension;

    public function __construct(\App\Extensions\Loaded\TestExtension $extension)
    {
        $this->extension = $extension;
    }

    public function extensionInfo()
    {
        return response()->json(['extenstion' => true, 'name' => $this->extension->name(), 'run-result' => $this->extension->run()]);
    }

    public function index()
    {
        return response()->json(['success' => true, 'name' => config('app.name'), 'version' => config('app.version')]);
    }
}
