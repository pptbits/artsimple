<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class art_form extends Model
{
    use HasFactory;
    protected $table = 'art_form';
    protected $fillable = ['art_form'];
}
