<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'id',
        'post_id',
        'comment',
        'parent_id',
        'level',
        'lft',
        'rgt',
        'depth',
        'children_count',
        'created_by',
        'updated_by',
        'approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
