<?php

namespace App\Http\Controllers;

use http\Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Determine if the model has any of the given permissions.
     *
     * @param array|string $permissions
     *
     * @return void
     * @throws \Exception
     */
    final public function checkPermission(array|string $permissions): void
    {
        $access = ['all'];

        if (is_array($permissions)) $access = array_merge($access, $permissions);
        else $access[] = $permissions;

        if (!auth()->user()->hasAnyPermission($access)) throw new \Exception('Unauthorized action.', 403);
    }
}
