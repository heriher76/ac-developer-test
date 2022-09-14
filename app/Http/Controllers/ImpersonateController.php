<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stancl\Tenancy\Features\UserImpersonation;
use Auth;

class ImpersonateController extends Controller
{
    public function store($locale, $token)
    {
        return UserImpersonation::makeResponse($token);
    }
}
