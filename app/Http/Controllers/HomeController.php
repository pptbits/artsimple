<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\art_form;
use App\Models\Upload_Artworks;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth.web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $reqeust)
    {
        $user = User::select('users.*', 'detail_user.type')->join('detail_user', 'users.id', 'detail_user.id_user')
        ->where('users.id', Auth::user()->id)->first();
        if($user->type == '1'){
            $user->assignRole('Buyer');
            $up_art = Upload_Artworks::all();
            $data = array('up_art' => $up_art);
            return view('backend.gallery', $data);
        }elseif($user->type == '2' || $user->type == '3'){
            $user->assignRole('Seller');
            $up_art = Upload_Artworks::join('users', 'upload_artwork.user_id', 'users.id')
            ->select('upload_artwork.*', 'users.name as user_name')
            ->where('upload_artwork.user_id', Auth::user()->id)->get();
            // dd($up_art);
            $data = array('up_art' => $up_art);
            return view('backend.gallery', $data);
        } elseif ($user->type == '4') {
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
