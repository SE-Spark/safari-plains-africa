<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'comment_text',
        'post_id',
        'user_id',
        'status',
    ];
}
