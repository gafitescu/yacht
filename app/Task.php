<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    const CHECKING = 'CHECKING';
    const UPGRADING = 'UPGRADING';
    const UNDER_REPAIR = 'UNDER_REPAIR';

    use SoftDeletes;

    protected $fillable = [
        'code',
        'status',
        'name',
        'description',
        'average_duration',
        'next_maintenance_date',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
