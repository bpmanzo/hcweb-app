<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','price','image','type' 
    ];

    public function getPriceAttribute($value){
        $newForm = "₱ ".$value;
        return $newForm;
    }
    use HasFactory;
}
