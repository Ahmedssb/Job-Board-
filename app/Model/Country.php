<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table='countries';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'country_code',
        'country_name',
    ];
}
