<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SrteTracker extends Model
{
    public $timestamps = FALSE;
    protected $table = 'srte_tracker';
    protected $connection = 'ters';
}
