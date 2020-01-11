<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Tip;
use App\CityAreas;
class MapController extends Controller
{
    public function gmaps() {
      $locations = DB::table('tips')->get();
      $tip=Tip::get();
      return view('tipmap',compact('locations', 'tip'));
    }
}
