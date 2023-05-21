<?php

declare(strict_types=1);

namespace App;

use Illuminate\Foundation\Application;

class BaseApplication extends Application
{
    protected $namespace = 'App\\';

    public function path($path = '')
    {
        return $this->basePath . DIRECTORY_SEPARATOR . 'src/App' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
