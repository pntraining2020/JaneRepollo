<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        'id', 'name', 'status'
    ];
}
