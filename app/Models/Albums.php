<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CRUD;

class Albums extends Model
{
    use HasFactory;

    protected $table = 'tbl_images';
    protected $primaryKey = 'image_id';
    protected $fillable = [
        'id','image_id','image','created_at','updated_at',
    ];
}
