<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    public function person(){
        return $this->belongsTo('App\Models\Person');
    }
    //return $this->belongsTo(Person::class);
}
