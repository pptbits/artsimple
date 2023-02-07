<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\art_form;
use App\Models\Upload_Artworks;

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
    public function index(Request $reqeust)
    {
        $user = DB::tale('users')->select('users.*', 'details.type')->join('details', 'users.id', 'details.id_user')->where('users.id', Auth::user()->id)->first();
        if($user->type == '1'){
            $user->assignRole('Buyer');
            return view('backend.gallery');
        }elseif($user->type == '2'){
            $user->assignRole('Seller');
            $up_art_j = Upload_Artworks::join('users', 'upload_artwork.user_id', 'users.id')->get()->toArray();
            $up_art = Upload_Artworks::where('user_id', $up_art_j)->get();
            // dd($up_art);
            $data = array('up_art' => $up_art);
            return view('backend.gallery', $data);
        } elseif ($user->type == '2') {
            $user->assignRole('Admin');
            $art_form = art_form::all();
            $data = array('art_form' => $art_form);
            return view('admin.art_form', $data);
        }else{
            return back();
        }
        // dd($user->type);
    }
}
