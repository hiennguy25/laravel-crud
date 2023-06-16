<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $message = session()->get('message');
        return view('admin.dashboard', ['message' => $message]);
    }
}
