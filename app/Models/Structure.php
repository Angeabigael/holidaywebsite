<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
        'acronyme'
    ];

    public function personnel()
    {
        return $this->hasMany(Personnel::class, 'structures_id');
    }

    public function chefH()
    {
        return $this->hasMany(ChefHierarchique::class);
    }
}
