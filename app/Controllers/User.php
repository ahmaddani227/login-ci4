<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'User - Ci4'
        ];

        return view('user/index', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit - Ci4'
        ];

        return view('user/edit', $data);
    }
}
