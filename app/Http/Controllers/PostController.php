<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        /**
         * Permission, role, & role_or_permission middleware must register in app/http/Kernal.php
         *
         * check http kernel file
        */
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]); // those permission are set in permissions table
        $this->middleware('permission:post-create', ['only' => ['store']]); // usually use Seeder to input permissions
        $this->middleware('permission:post-edit', ['only' => ['update']]); // add new permission for you controller and use here in consturctor
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    public function index()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
