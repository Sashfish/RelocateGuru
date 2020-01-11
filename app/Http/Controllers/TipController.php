<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Input;
use DB;
use Image;
use App\Tip;
use App\model\User;
use App\Subcategories;
use App\Category;
use App\City;
use App\Comment;
use App\Tip_likes;
use App\CityAreas;
use Carbon\Carbon;
use Cache;

class TipController extends Controller
{
    public function select(){
        $data=Tip::get();
        $url = Storage::disk('s3');
        $comments = Comment::orderBy('id')->get();
        $likes = Tip_likes::get();
        return view('tip', compact('data', 'url','comments','likes'));
}


public function HomePage(){
  $today = Carbon::today()->toDateString();
  $randomTips = Cache::remember('randomTips', 5*24, function () {
    return Tip::inRandomOrder()->take(6)->get();
  });

  $comments = Comment::orderBy('id')->get();
  return view('welcome', compact('randomTips','comments'));

}
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/

    public function create(){
      $categories=Category::all();
      $cities=City::all();
      return view('tip.create',compact('categories','cities'));
    }

    /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */

    public function store(Request $request, City $city, Category $category){
      $this->validate($request, [
        'image' => 'required|image|max:1999']);
      $tipsnew = new Tip;
      $tipsnew->title = $request->title;
      $tipsnew->description = $request->description;
      $tipsnew->category_id = $request->category;
      $tipsnew->city_id = $request->city;
      $tipsnew->user_id = auth()->id();
      $tipsnew->url = $request->url;

     if ($request->hasFile('image')) {
        try{

          $file = $request->file('image');
          $name = time() . '.' . $file->getClientOriginalExtension();
          $img = \Image::make($file->getRealPath());
          $img->fit(1080);
          $img->stream();
          Storage::disk('s3')->put('tip'.'/'.$name, $img->__toString());
          $tipsnew->image = 'tip'.'/'.$name;
        }
        catch (\Exception $e)
                  {
                      $response = [
                          'information' => 'Error. Something went wrong. Please try again',
                      ];
                      $statusCode = 400;
                      return response()->json($response, $statusCode);
                }
          }
      $tipsnew->save();



      return redirect ('tipmap')->with('success','your tip is created');
    }

    public function edit($id){
      $tip=Tip::whereId($id)->firstOrFail();
      $categories=Category::all();
      $selectedCategories=$tip->categories->lists('id')->toArray();
      return view('tip.edit',compact('tip','categories','selectedCategories'));
    }

    public function search(Request $request, City $city, Category $category, User $user){
        $q = $request->get('q');
        if ($q != ""){
         $tips = Tip::where('title','LIKE','%'.$q.'%')
                    ->orWhere('description','LIKE','%'.$q.'%')
                    ->orWhereHas('user', function($id) use($q){
                      return $id->where('name', 'LIKE','%'.$q.'%');
                    })
                    ->orWhereHas('city', function($id) use($q){
                      return $id->where('name', 'LIKE','%'.$q.'%');
                    })
                    ->orWhereHas('category', function($id) use($q){
                      return $id->where('name', 'LIKE','%'.$q.'%');
                    })
                    ->get();
                 if(count($tips) > 0)

           $comments = Comment::orderBy('id')->get();
           return view('tip.search', ['tips' => $tips], ['comments'=> $comments]);
        }
    }

    public function addComment(Request $request)
       {
           $commentnew = new Comment;
           $commentnew->user_id = Auth::user()->id;
           $commentnew->username=$request->username;
           $commentnew->tip_id= 1;//NEEDS TO BE FIXED
           $commentnew->body = $request->text;
           $commentnew->save();
           return $commentnew;
       }

       public function show(tip $tip)
       {
         return view('tip.show' , compact('tip'));
       }


       public function postLikeTip( $tipID ){
        $tip = Tip::where('id', '=', $tipID)->first();
        $tip->likes()->attach( Auth::user()->id, [
          'created_at'    => date('Y-m-d H:i:s'),
          'updated_at'    => date('Y-m-d H:i:s')
      ] );

      return response()->json( ['tip_liked' => true], 201 );
      }

      public function deleteLikeTip( $tipID ){
        $tip = Cafe::where('id', '=', $tipID)->first();
        $tip->likes()->detach( Auth::user()->id );

        return response(null, 204);

      }



}
