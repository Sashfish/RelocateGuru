<?php

namespace App\Http\Controllers;
use App\Subcategories;
use App\Http\Requests\SubcategoriesFormRequest;
use Carbon\Carbon;

use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{      public function create(){
  return view ('subcategories.create');
}
      public function store(SubcategoriesFormRequest $request){
        $subcategory =new Subcategory(array(
          'name'=>$request->get('name'),
          'slug'=>$request->get('name'),
        ));
        $subcategory->save();
        return redirect ('subcategory/create')->with('status','A new subcategory has been created');
      }
    //
    }
