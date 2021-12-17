<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    protected $table = 'staff_members';
    public $incrementing = FALSE;
    protected $primaryKey = 'position';
    public $timestamps = FALSE;
}
