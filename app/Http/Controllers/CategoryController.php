<?php

namespace App\Http\Controllers;
use App\Category;
use App\Http\Requests\CategoryFormRequest;
use Carbon\Carbon;
use App\Tip;
use App\Comment;
use Illuminate\Http\Request;

class CategoryController extends Controller
{      public function create(){
  return view ('category.create');
}
      public function store(CategoryFormRequest $request)
      {
        $category =new Category(array(
          'name'=>$request->get('name'),
          'slug'=>$request->get('name'),
        ));
        $category->save();
        return redirect ('category/create')->with('status','A new category has been created');
      }

      public function getCat(Category $category)
      {
        $tips = $category->tip();
        $comments = Comment::orderBy('id')->get();
        return view('tip.try', compact('tips', 'comments'));
      }
    
    }
