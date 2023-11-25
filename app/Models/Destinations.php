<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name',
        'address',
        'description',
        'image_url',
        'status',
    ];
    
    public function packages()
    {
        return $this->belongsToMany(Packages::class, 'package_destination', 'destination_id', 'package_id');
    }
}
