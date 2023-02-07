<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload_Artworks extends Model
{
    use HasFactory;

    protected $table = 'upload_artwork';
    protected $fillable = [ 'image',
                            'name',
                            'description',
                            'type_art',
                            'art_form',
                            'art_tech',
                            'cer_auth',
                            'price',
                            'frame_incl',
                            'shipment_avail',
                            'art_dimen',
                            'show_hide',
                            'view',
                            'user_id',
                        ];

    //
}
