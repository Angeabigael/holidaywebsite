<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefHierarchique extends Model
{
    use HasFactory;

    protected $guarded = [
        ''
    ];

    public function structures()
    {
        return this->belongsTo(Structure::class);
    }
}
