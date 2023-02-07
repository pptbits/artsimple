<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    protected $table = 'detail_user';
    protected $fillable = [ 'type',
                            'id_user',
                            'name',
                            'tel',
                            'email',
                            'company',
                            'birth',
                            'idcard',
                            'front_idcard',
                            'selfie_idcard',
                            'bookbank_img',
                            'university_card',
                        ];
}
