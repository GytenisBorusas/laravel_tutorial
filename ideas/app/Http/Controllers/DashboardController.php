<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = [
        [
            'name' => 'Alex',
            'age' => 30,
        ],
        [
            'name' => 'John',
            'age' => 17,
        ],
        [
            'name' => 'Jane',
            'age' => 35,
        ]
    ];


        return view('dashboard',
            [
                'users' => $users
            ]);
    }
}
