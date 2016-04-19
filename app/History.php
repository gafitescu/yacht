<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class History extends Model
{
    use SoftDeletes;

    protected $table = 'history';

    protected $fillable = [
        'yacht_id',
        'task_id'
    ];

    protected $dates = [
        'created_at',
        'deleted_at'
    ];

    /* don't need the updated_at so we override it*/
    public function setUpdatedAt($value){}

    public function yacht()
    {
        return $this->belongsTo('App\Yacht');
    }
}
