<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table='jobs';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'title',
        'type',
        'location',
        'c_name',
        'des',
        'user_id',
        'cat_id',
        'cont_id',
       
    ];
}
