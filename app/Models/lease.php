<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lease extends Model
{
    use HasFactory;

protected $fillable = ['id','unit_id','tenant_id','landlor_id','start_date','end_date','security_deposite','rent_amount','rent_due_day','late_fee','status','terms','created_at'];
} 
														

