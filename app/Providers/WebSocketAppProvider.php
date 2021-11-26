<?php

namespace App\Providers;

use App\Models\WebConfig;
use BeyondCode\LaravelWebSockets\Apps\ConfigAppProvider;

class WebSocketAppProvider extends ConfigAppProvider
{
    public function __construct()
    {
        $this->apps = collect(WebConfig::all()->toArray());
    }
}
