<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'image_url',
        'content',
        'is_published',
        'created_by',
        'updated_by',
        'blogcategory_id',
    ];
}
