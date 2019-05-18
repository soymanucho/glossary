<?php

namespace glossary\Http\Controllers;

use glossary\Glossary;
use glossary\User;
use glossary\Lenguage;
use glossary\Subject;
use Illuminate\Support\Facades\Auth;
use glossary\Term;
use Illuminate\Http\Request;

class GlossaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function byUser(User $user)
    {
      $glossaries = Glossary::where('user_id',$user->id)->with('subjects')->get();
      return view('glossary.byUser',compact('glossaries','user'));
    }
    public function search($text)
    {
      $glossaries = Glossary::where('user_id',$user->id)->with('subjects')->get();
      return view('glossary.byUser',compact('glossaries','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $lenguages = Lenguage::all();
      $subjects = Subject::all();
      // $terms = Term::all();
      return view('glossary.newGlossary',compact('lenguages','subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate(
          $request,
          [
              'title' => 'required|max:60',
              'description' => 'required|max:150',
              'lenguage_id'=> 'required|exists:lenguages,id',
          ],
          [
          ],
          [
              'title' => 'title',
              'description' => 'description',
              'lenguage_id' => 'lenguage',
          ]
      );


      $glossary = New Glossary();
      $glossary->title = $request->title;
      $glossary->description = $request->description;
      $glossary->user_id = Auth::user()->id;

      $glossary->save();


      // $terms = collect([]);
      for ($i = 1; $i < 6; $i++) {
        if ($request->input("term_name_".$i)) {
          $term = Term::firstOrCreate(['name' => $request->input("term_name_".$i),'definition'=>$request->input("term_def_".$i),'lenguage_id' => $request->lenguage_id]);
          // $term->name = $request->input("term_name_".$i);
          // $term->lenguage_id = $request->lenguage_id;
          // $term->definition = $request->input("term_def_".$i);
          $term->save();
          $glossary->terms()->attach($term);
        }
      }
      // dd($glossary);
      return redirect(route('home'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \glossary\Glossary  $glossary
     * @return \Illuminate\Http\Response
     */
    public function show(Glossary $glossary)
    {
      $glossary = Glossary::where('id',$glossary->id)->with('terms')->with('terms.translations.destTerm')->first();
      // dd($glossary->terms());
      return view('glossary.detail',compact('glossary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \glossary\Glossary  $glossary
     * @return \Illuminate\Http\Response
     */
    public function edit(Glossary $glossary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \glossary\Glossary  $glossary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Glossary $glossary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \glossary\Glossary  $glossary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Glossary $glossary)
    {
        //
    }
}
