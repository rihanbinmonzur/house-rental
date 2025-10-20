<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;
  								
    protected $fillable = ['name','email','password','phone','address','nid','employment_status','profile_photo','status'];
}
