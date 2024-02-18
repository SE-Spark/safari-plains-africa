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
        'views',
        'created_by',
        'updated_by',
        'blogcategory_id',
    ];

    public function category()
    {
        return $this->belongsTo(Blogcategory::class, 'blogcategory_id');
    }
    public function comments()
    {
        return $this->hasMany(Blogcomment::class,'post_id','id');
    }
    public function likes()
    {
        return $this->hasMany(Bloglikes::class,'post_id','id');
    }
}
