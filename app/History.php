<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'yacht_id',
        'task_id'
    ];

    protected $dates = [
        'created_at',
        'deleted_at'
    ];

    public function yacht()
    {
        return $this->belongsTo('App\Yacht');
    }
}
