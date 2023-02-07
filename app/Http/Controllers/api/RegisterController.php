<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\DetailUser;
use DB;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8',
            'tel' => 'required|string|max:20',
            'birth' => 'required|date',
            'idcard' => 'required|string|max:13',
            'front_idcard' => 'required|image|mimes:jpeg,png,jpg|max:4096',
            'selfie_idcard' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Encrypt id card number
        if($request->idcard){
            $encryptedIdCardNumber = Crypt::encryptString($request->idcard);
        }else{
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // get the image file
        if ($request->file('front_idcard')) {
            $image_front = $request->file('front_idcard');
            // generate a unique name for the image
            $image_string_front = uniqid() . '.' . $image_front->getClientOriginalExtension();
            // resize the image
            $img_f = Image::make($image_front)->resize(300, 300);
            // save the image
            Storage::put('public/images/idcard' . $image_string_front, (string) $img_f->encode());
            // return the view
        }

        if($request->file('selfie_idcard')){
            $image_seflie = $request->file('selfie_idcard');
            $image_string_self = uniqid() . '.' . $image_seflie->getClientOriginalExtension();
            $img_s = Image::make($image_seflie)->resize(1000, 1000);
            Storage::put('public/images/idcard' . $image_string_self, (string) $img_s->encode());
        }

        if($request->file('bookbank_img')){
            $image_bookbank = $request->file('bookbank_img');
            $image_string_bookbank = uniqid() . '.' . $image_bookbank->getClientOriginalExtension();
            $img_b = Image::make($image_bookbank)->resize(400, 400);
            Storage::put('public/images/bookbank' . $image_string_bookbank, (string) $img_b->encode());
        }

        if($request->file('university_card')){
            $image_univercard = $request->file('university_card');
            $image_string_univercard = uniqid() . '.' . $image_univercard->getClientOriginalExtension();
            $img_u = Image::make($image_univercard)->resize(300, 300);
            Storage::put('public/images/university_card' . $image_string_univercard, (string) $img_u->encode());
        }

        // Create a new detail user record
        $detailUser = DetailUser::create([
            'type' => $request->type,
            'id_user' => $user->id,
            'name' => $request->name,
            'tel' => $request->tel,
            'email' => $request->email,
            'birth' => $request->birth,
            'idcard' => $encryptedIdCardNumber,
            'front_idcard' => $image_string_front,
            'selfie_idcard' => $image_string_self,
            'bookbank_img' => $image_string_bookbank,
            'university_card' => $image_string_univercard,
        ]);

        $data = DB::table('users')
            ->join('detail_user', 'users.id', '=', 'detail_user.id_user')
            ->select('users.*', 'detail_user.*')
            ->where('users.id', $user->id)
            ->get();

        // Return success response
        return response()->json(['status'=> 200,'message' => 'Successfully registered.','data' => ['user' => $data]], 200);
    }
}
