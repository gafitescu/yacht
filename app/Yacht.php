<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Yacht extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'status',
        'name',
        'registration_code',
        'next_maintenance_date',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'next_maintenance_date'
    ];
}
