<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\BelongsToRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Itineraire extends Model
{
    protected $fillable = [
        'nomItineraire',
        'tarif',

    ];
    public function region(){
        return $this->belongsTo(Region::class);
    }
    use HasFactory;
}
