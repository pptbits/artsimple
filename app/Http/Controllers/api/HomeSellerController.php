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
        $art = $art->get();


        $category = art_form::all();


        return response()->json(['status' => 200, 'message' => 'Successfully Search', 'art' => ['data' => $art, 'category' => $category]], 200);
    }
}
