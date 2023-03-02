<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login - Ci4'
        ];

        return view('auth/login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Register - Ci4'
        ];

        return view('auth/register', $data);
    }

    public function user()
    {
        $data = [
            'title' => 'User - Ci4'
        ];

        return view('user/index', $data);
    }
}
