<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffPosition extends Model
{
    protected $table = 'staff_positions';
    public $incrementing = FALSE;
	protected $primaryKey = 'Id';
    public $timestamps = FALSE;
}
