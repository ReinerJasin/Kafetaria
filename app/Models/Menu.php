<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    
    protected $table = 'menu';

    public function cafeRelation()
    {
        return $this->belongsTo(Cafe::class, 'CafeID', 'id');
    }
}
