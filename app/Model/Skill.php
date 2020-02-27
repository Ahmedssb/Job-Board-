<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table='skills';
    protected $primaryKey='id';
    protected $fillable=[
        'id',
        'name',
        'job_id',
    ];
}
