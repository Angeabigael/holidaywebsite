<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDemande extends Model
{
    use HasFactory;

    protected $table = 'types_demandes';

    protected $fillable = [
        'intitule'
    ];

    public function demande()
    {
        return $this->hasMany(Demande::class, 'types_demandes_id');
    }
}
