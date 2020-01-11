<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\model\User;
use App\Tip;
use App\Tip_likes;
use App\Profile;
use App\Comment;
use App\Category;
use App\City;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Storage;
use Image;
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
    public function index(User $user)
    {
      $categories=Category::all();
      $cities=City::all();
      
      $db=DB::table('categories');
       $data=$db->get();
       $tip_likes = Tip_likes::with('user')
           ->orderBy('created_at', 'desc')
           ->get();
           $tipCount = Cache::remember(
            'count.tips.' . Auth()->user()->id,
            now()->addSeconds(30),
            function () use ($user) {
                return Auth()->user()->tip->count();
            });
        $followersCount = Cache::remember(
            'count.followers.' . Auth()->user()->id,
            now()->addSeconds(30),
            function () use ($user) {
                return Auth()->user()->followers->count();
            });
        $followingCount = Cache::remember(
            'count.following.' . Auth()->user()->id,
            now()->addSeconds(30),
            function () use ($user) {
                return Auth()->user()->following->count();
            });
            $user = User::all();
    return view('home', ['data'=>$data,'tip_likes'=>$tip_likes,'cities'=> $cities, 'categories'=> $categories, 'user' => $user, 'tipCount'=> $tipCount, 'followersCount' => $followersCount, 'followingCount'=> $followingCount]);
    }

    public function profile(User $user){
      $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
      $tipCount = Cache::remember(
          'count.tips.' . $user->id,
          now()->addSeconds(30),
          function () use ($user) {
              return $user->tip->count();
          });
      $followersCount = Cache::remember(
          'count.followers.' . $user->id,
          now()->addSeconds(30),
          function () use ($user) {
              return $user->followers->count();
          });
      $followingCount = Cache::remember(
          'count.following.' . $user->id,
          now()->addSeconds(30),
          function () use ($user) {
              return $user->following->count();
          });
      return view('profile.index', compact('user', 'follows', 'tipCount', 'followersCount', 'followingCount'));
    }
    public function deleteuser(){
      $userid=Auth::user()->id;
      $user=User::find($userid);
      $user->delete($user->id);
      return redirect('/');
    }
    public function getprofile(){
      $userid=Auth::user()->id;
      $user=User::find($userid);
      $user->get();
      return view('editprofile')->with('user',$user);
    }
    public function updateprofile(Request $request){
      $this->validate($request, [
        'image' => 'image|nullable|max:1999']);
      $userid=Auth::user()->id;
      $profile = User::find($userid);
      $profile->name = $request->name;
      $profile->email = $request->email;
     if ($request->hasFile('image')) {
        try{
          $file = $request->file('image');
          $name = time() . '.' . $file->getClientOriginalExtension();
          $img = \Image::make($file->getRealPath());
          $img->fit(1080);
          $img->stream();
          $oldavatar=Auth::user()->avatar;
          $oldavatar=(string) $oldavatar;
          if ($oldavatar = 'avatar/default.png'){
            Storage::disk('s3')->put('avatar'.'/'.$name, $img->__toString());
          }
          else{
          Storage::disk('s3')->put('avatar'.'/'.$name, $img->__toString());
          Storage::disk('s3')->delete($oldavatar);
          }

          $profile->avatar = 'avatar'.'/'.$name;
        }
        catch (\Exception $e)
                  {
                      $response = [
                          'information' => 'Error. Something went wrong. Please try again',
                          'img'=>$oldavatar,
                      ];
                      $statusCode = 400;
                      return response()->json($response, $statusCode);
                }
          }
      $profile->save();
      return redirect ('/home')->with('status','your profile was updated');
    }


    public function deletepost($id){
      Tip::findOrFail($id)->delete();
      return redirect('/home');
    }
}
