<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload_Artworks;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\art_form;
use App\Models\User;
use DB;
use Auth;

class Upload_ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth.web');
    }
    public function index()
    {
        $up_art = Upload_Artworks::all();
        $art_form = art_form::all();
        $data = array('up_art' => $up_art,
                      'art_form' => $art_form);
        return view('backend.upload_artwork', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // validate the image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'discript' => 'required|string',
            'name_art' => 'required|string:max:255',
            'type_art' => 'required|string',
            'select_art_form' => 'required|string',
            'art_tech' => 'required|string',
            'select_cer' => 'required|string',
            'price' => 'required',
        ]);

        $ua = new Upload_Artworks;

        // get the image file
        $image = $request->file('image');
        // generate a unique name for the image
        $name = uniqid() . '.' . $image->getClientOriginalExtension();
        // resize the image
        $img = Image::make($image)->resize(3840, 2160);
        // save the image
        Storage::put('public/images/' . $name, (string) $img->encode());
        // return the view

        $ua->image = $name;
        $ua->name = $request->input('name_art');
        $ua->description = $request->input('discript');
        $ua->type_art = $request->input('type_art');
        $ua->art_form = $request->input('select_art_form');
        $ua->art_tech = $request->input('art_tech');
        $ua->cer_auth = $request->input('select_cer');
        $ua->price = $request->input('price');
        $ua->frame_incl = $request->input('select_frame');
        $ua->shipment_avail = $request->input('select_ship');
        $ua->art_dimen = $request->input('art_dimen');
        $ua->show_hide = $request->input('hide_show');
        $ua->user_id = Auth::user()->id;
        $ua->save();
        // dd($ua);
        return redirect('home')->with('success', 'Artwork uploaded successfully.');
    }

    public function detail($id)
    {
        $user = User::select('users.*', 'detail_user.type')->join('detail_user', 'users.id', 'detail_user.id_user')
        ->where('users.id', Auth::user()->id)->first();
        if($user->type == '1'){
            $up_art = Upload_Artworks::join('art_form', 'upload_artwork.art_form', 'art_form.id')
            ->join('users', 'upload_artwork.user_id', 'users.id')
            ->select('upload_artwork.*', 'art_form.art_name', 'users.name as user_name')
            ->where('upload_artwork.id', $id)->first();
            // dd($up_art);
            $data = array('up_art' => $up_art);
        } elseif ($user->type == '2' || $user->type == '3') {
            $up_art = Upload_Artworks::join('art_form', 'upload_artwork.art_form', 'art_form.id')
                ->join('users', 'upload_artwork.user_id', 'users.id')
                ->select('upload_artwork.*', 'art_form.art_name', 'users.name as user_name')
                ->where('upload_artwork.user_id', Auth::user()->id)
                ->where('upload_artwork.id', $id)->first();
            // dd($up_art);
            $data = array('up_art' => $up_art);
        }
        return view('backend.artworksDetail', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $up_art = Upload_Artworks::find($id);
        $art_form_s = art_form::select('*')->where('id', $up_art->art_form)->first();
        $art_form = art_form::all();
        $data = array('up_art' => $up_art, 'art_form' => $art_form, 'art_form_s' => $art_form_s);
        return view('backend.artworksDetailEdit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ua = Upload_Artworks::find($request->input('id'));
        if($request->hasFile('image')){
            // get the image file
            $image = $request->file('image');
            // generate a unique name for the image
            $name = uniqid() . '.' . $image->getClientOriginalExtension();
            // resize the image
            $img = Image::make($image)->resize(3840, 2160);
            // save the image
            Storage::put('public/images/' . $name, (string) $img->encode());
            // return the view
            $ua->image = $name;
        }else{
            $ua->image = $ua->image;
        }
        if ($request->input('name_art') != null) {
            $ua->name = $request->input('name_art');
        }else{
            $ua->name = $ua->name;
        }
    //    $ua->name = $request->input('name_art');

        if ($request->input('discript') != null) {
            $ua->description = $request->input('discript');
        }else{
            $ua->description = $ua->description;
        }
    //    $ua->description = $request->input('discript');

        if ($request->input('type_art') != null) {
            $ua->type_art = $request->input('type_art');
        }else{
            $ua->type_art = $ua->type_art;
        }
    //    $ua->type_art = $request->input('type_art');

        if ($request->input('select_art_form') != null) {
            $ua->art_form = $request->input('select_art_form');
        }else{
            $ua->art_form = $ua->art_form;
        }
    //    $ua->art_form = $request->input('select_art_form');

        if ($request->input('art_tech') != null) {
            $ua->art_tech = $request->input('art_tech');
        }else{
            $ua->art_tech = $ua->art_tech;
        }
    //    $ua->art_tech = $request->input('art_tech');

        if ($request->input('select_cer') != null) {
            $ua->cer_auth = $request->input('select_cer');
        }else{
            $ua->cer_auth = $ua->cer_auth;
        }
    //    $ua->cer_auth = $request->input('select_cer');

        if ($request->input('price') != null) {
            $ua->price = $request->input('price');
        } else {
            $ua->price = $ua->price;
        }
    //    $ua->price = $request->input('price');

        if ($request->input('select_frame') != null) {
            $ua->frame_incl = $request->input('select_frame');
        }else{
            $ua->frame_incl = $ua->frame_incl;
        }
    //    $ua->frame_incl = $request->input('select_frame');

        if ($request->input('select_ship') != null) {
            $ua->shipment_avail = $request->input('select_ship');
        }else{
            $ua->shipment_avail = $ua->shipment_avail;
        }
    //    $ua->shipment_avail = $request->input('select_ship');

        if ($request->input('art_dimen') != null) {
            $ua->art_dimen = $request->input('art_dimen');
        } else {
            $ua->art_dimen = $ua->art_dimen;
        }

        if ($request->input('hide_show') != null) {
            $ua->show_hide = $request->input('hide_show');
        }else{
            $ua->show_hide = $ua->show_hide;
        }
    //    $ua->show_hide = $request->input('hide_show');
       $ua->user_id = Auth::user()->id;
       $ua->save();
        // dd($ua);
        return back()->with('success', 'Artwork updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
