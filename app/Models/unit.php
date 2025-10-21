<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    use HasFactory;
    protected $fillable =['property_id','unit_number','floor','size','bedrooms','bathrooms','rent_amount','status','image_url'];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
