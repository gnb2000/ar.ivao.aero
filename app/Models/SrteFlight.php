<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SrteFlight extends Model
{
    public $timestamps = FALSE;
    protected $connection = 'ters';

    protected $fillable = [
        'conn_time',
    ];
}
