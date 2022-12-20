<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $returnUrl;
    public $fileRepo;

    public function prepare($request, $fillables)
    {
        $data = array();
        foreach ($fillables as $fillable)
        {
            if ($request->has($fillable))
            {
                $data[$fillable] = $request->$fillable;
            }
        }
        return $data;
    }
}
