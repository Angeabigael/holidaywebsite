<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $guarded = [
        ""
    ];

    public function typedemande()
    {
        return $this->belongsTo(TypeDemande::class, 'types_demandes_id');
    }

    public function personne()
    {
        return $this->belongsTo(Personnel::class, 'personnels_id');
    }
}
