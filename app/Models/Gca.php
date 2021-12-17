<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gca extends Model
{
    public $timestamps = FALSE;
    public $increments = FALSE;
    public $primaryKey = 'vid';
    protected $table = 'gca';
}
