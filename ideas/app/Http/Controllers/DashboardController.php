<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class DashboardController extends Controller
{
    public function index()
    {
        $idea = new Idea();
        $idea->content = 'Hello youtube!!!';
        $idea->likes = 0;
        $idea->save();

        return view('dashboard', [
            'ideas' => Idea::orderBy('created_at', 'desc')->get(),
        ]);
    }
}