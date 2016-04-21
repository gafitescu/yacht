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


    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    public function descending()
    {
        return  $this->orderBy('created_at', 'DESC');
    }

    public function scopeForJob($query, $id)
    {
        return $query->where('job_id', $id)
            ->orderBy('created_at', 'DESC');
    }
}
