<?php

namespace App\Http\Controllers;

use App\Jobs\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request): void
    {
        $data = [
            'name'          => $request->get('name'),
            'last_name'     => $request->get('last_name'),
            'nationalcard'  => $request->get('nationalcard'),
            'date_birth'    => $request->get('date_birth'),
            'password'      => $request->get('password')
        ];

        dispatch(new User($data));
    }
}
