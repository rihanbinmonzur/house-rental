<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maintenance_request extends Model
{
    use HasFactory;
    protected $fillable = ['tenant_id', 'landlord_id', 'unit_id', 'title', 'description', 'priority', 'status', 'image_url'];
}
