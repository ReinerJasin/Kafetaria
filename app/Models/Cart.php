<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    
    protected $table = 'cart';
    
    public function menuRelation()
    {
        return $this->belongsTo(Menu::class, 'MenuID', 'id');
    }
    
    public function paymentRelation()
    {
        return $this->belongsTo(Payment::class, 'PaymentID', 'id');
    }
}
