<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $fillable = [
        'id', 'employee_id', 'clock_in', 'clock_out', 'break_in', 'break_out'
    ];
}
