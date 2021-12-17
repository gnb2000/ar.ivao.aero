<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AtcPosition extends Model
{
    protected $table = 'atc_positions';
    public $primaryKey = 'PosId';
    public $incrementing = FALSE;
    public $timestamps = FALSE;
}
