<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Divison;

class District extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function division(){
        return $this->belongsTo(Divison::class,'division_id','id');
    }
}
