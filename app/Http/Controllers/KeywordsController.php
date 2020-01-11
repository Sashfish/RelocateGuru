<?php

namespace App\Http\Controllers;
use App\Keywords;
use App\Http\Requests\KeywordsFormRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KeywordsController extends Controller
{      public function create(){
  return view ('keywords.create');
}
      public function store(KeywordsFormRequest $request){
        $keyword =new Keyword(array(
          'name'=>$request->get('name'),
          'slug'=>$request->get('name'),
        ));
        $keyword->save();
        return redirect ('keyword/create')->with('status','A new keyword has been created');
      }
    }
