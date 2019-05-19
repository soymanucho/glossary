<?php

namespace glossary\Http\Controllers;

use glossary\Translation;
use glossary\Lenguage;
use glossary\Term;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TranslationController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Term $term)
    {
      $lenguages = Lenguage::all();
      return view('translation.newTranslation',compact('lenguages','term'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Term $term)
    {
      $this->validate(
          $request,
          [
              'name' => 'required|max:60',
              'definition' => 'required|max:150',
              'lenguage_id'=> 'required|exists:lenguages,id',
          ],
          [
          ],
          [
              'name' => 'name',
              'definition' => 'definition',
              'lenguage_id' => 'lenguage',
          ]
      );

      $term = Term::where('id',$term->id)->first();
      $user = Auth::user();

      $translatedTerm = New Term();
      $translatedTerm->name = $request->name;
      $translatedTerm->definition = $request->definition;
      $translatedTerm->lenguage_id = $request->lenguage_id;
      $translatedTerm->save();
      // $translatedTerm->translations->attach($term);
      $term->translations()->create([
        'dest_term_id' => $translatedTerm->id,
        'user_id'=> $user->id,
      ]);
      $term->save();
      return redirect()->route('show-translation', compact('term'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \glossary\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function show(Term $term)
    {
      $term = Term::where('id',$term->id)->with('translations')->first();

      return view('translation.show',compact('term'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \glossary\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function edit(Translation $translation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \glossary\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Translation $translation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \glossary\Translation  $translation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Translation $translation)
    {
        //
    }
}
