<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coating extends Model
{
    protected $fillable = [
        'name','price','description'
    ];
}
