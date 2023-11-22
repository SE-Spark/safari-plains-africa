<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'customer_id',
        'destination_id',
        'rating',
        'comment',
        'approved',
        'approved_by'
    ];
    public function user(){
        return $this->belongsTo(User::class,'id','customer_id');
    }
    public function destination(){
        return $this->hasOne(Destinations::class,'id','destination_id');
    }
}
