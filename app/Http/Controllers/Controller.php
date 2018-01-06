<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Mpociot\Reanimate\ReanimateModels;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ReanimateModels, ValidatesRequests;
}
