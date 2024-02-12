<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class ClassSection extends Model
{
    protected $table = 'classsections';
    //
    protected $fillable = [
        'name',
    ];

}
