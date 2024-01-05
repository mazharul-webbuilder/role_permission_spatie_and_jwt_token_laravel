<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        /**
         * Permissions, role, & role_permission middleware must register in app/http/Kernal.php
         *
         * check http kernel file
        */
        $this->middleware('permissions:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'show']]); // those permission are set in permissions table
        $this->middleware('permissions:post-create', ['only' => ['store']]); // usually use Seeder to input permissions
        $this->middleware('permissions:post-edit', ['only' => ['update']]); // add new permission for you controller and use here in consturctor
        $this->middleware('permissions:post-delete', ['only' => ['destroy']]);
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
