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
      $glossaries = Glossary::with('terms')->with('terms.lenguage')->orderBy('glossaries.id','desc')->take(4)->get();
      // dd($glossaries);
      return view('home',compact('lenguages','glossaries'));
    }
}
