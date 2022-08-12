<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Add;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adds = Add::latest()->get();
        $first_add = $adds->first();
        $adds = $adds->except($first_add->id);
        return view('welcome', compact('adds', 'first_add'));
    }
}
