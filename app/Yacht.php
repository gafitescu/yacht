<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Yacht extends Model
{
    const SAILING = 'SAILING';
    const CHECKING = 'CHECKING';
    const UPGRADING = 'UPGRADING';
    const UNDER_REPAIR = 'UNDER_REPAIR';

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


    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function history()
    {
        return $this->hasMany('App\History')->orderBy("created_at", "desc");
    }
}
