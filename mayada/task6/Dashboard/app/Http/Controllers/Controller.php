<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function redirectAccoridingToRequest($request, $message)
    {
        if ($request->has('redirect') && $request->redirect == 'all') {
            return redirect()->action([static::class, 'all'])->with('success', $message);
        }
        if ($request->has('redirect') && $request->redirect == 'back') {
            return redirect()->back()->with('success', $message);
        }
    }
}
