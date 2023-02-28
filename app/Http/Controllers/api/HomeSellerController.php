<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload_Artworks;
use App\Models\art_form;
use DB;

class HomeSellerController extends Controller
{
    public function index(Request $req)
    {
        $search = $req->search_art;
        $art = Upload_Artworks::query();
        if ($search) {
            $art =  $art->where('name', 'like', "%{$search}%");
        }

        // $filter =
        $art = $art->get();



        $category = art_form::all();


        return response()->json(['status' => 200, 'message' => 'Successfully Search', 'art' => ['data' => $art, 'category' => $category]], 200);
    }

    public function detail_art_seller(Request $req)
    {
        $up_art = Upload_Artworks::find($req->id);
        $up_art->view = $up_art->view + 1;
        $up_art->save();

        $art_detail = Upload_Artworks::where('id', $req->id)->first();
        return response()->json(['status' => 200, 'message' => 'Successfully Search', 'art' => $art], 200);
    }
}
