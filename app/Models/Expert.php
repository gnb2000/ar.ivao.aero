<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    public $primaryKey = 'vid';
    public $incrementing = FALSE;
    public $timestamps = FALSE;
    protected $connection = 'ters';
}
