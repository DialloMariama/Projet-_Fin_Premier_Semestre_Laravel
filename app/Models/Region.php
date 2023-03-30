<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'nomRegion',

    ];
    public function itineraire(){
        return $this->hasMany(Itineraire::class);
    }
    use HasFactory;
}
