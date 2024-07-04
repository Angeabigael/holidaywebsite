<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenoms',
        'corps',
        'structures_id'
    ];

    public function structure()
    {
        return $this->belongsTo(Structure::class, 'structures_id');
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function soldeconges()
    {
        return $this->hasMany(SoldeConge::class, 'personnels_id');
    }
}
