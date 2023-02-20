<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Upload_Artworks;
use DB;

class HomeSellerController extends Controller
{
    public function index(Request $req)
    {
        $art = DB::table('upload_artworks')
            ->join('users', 'upload_artworks.user_id', '=', 'users.id')
            ->select('upload_artworks.*')
            ->get();

        return response()->json(['art' => $art]);
    }
}
