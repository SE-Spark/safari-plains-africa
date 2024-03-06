<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloglikes extends Model
{
    use HasFactory;

    protected $table = "bloglikes";
    protected $fillable = [
        'id',
        'post_id',
        'parent_id',
        'created_by',
    ];
}
