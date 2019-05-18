<?php

namespace glossary\Http\Controllers;

use Illuminate\Http\Request;
use glossary\Lenguage;
use glossary\Glossary;

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
      $lenguages = Lenguage::all();
      $glossaries = Glossary::with('terms')->orderBy('created_at')->take(4)->get();
      return view('home',compact('lenguages','glossaries'));
    }
}
