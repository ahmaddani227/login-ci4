<?php

namespace App\Controllers;

class Admin extends BaseController
{

    protected $db, $builder;

    function __construct()
    {
        $this->db     = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {

        // $user = new \Myth\Auth\Models\UserModel();
        // $data['user'] = > $user->findAll();

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data = [
            'title' => 'Admin - Ci4',
            'users' => $query->getResult()
        ];

        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        $this->builder->select('users.id as userid, username, email, user_image, fullname, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'Detail - Ci4',
            'user' => $query->getRow()
        ];

        if (empty($data['user'])) {
            return redirect()->to('admin');
        }

        return view('admin/detail', $data);
    }
}
