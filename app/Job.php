<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    const JOB_NEW = 'NEW';
    const JOB_IN_PROGRESS = 'IN_PROGRESS';
    const JOB_COMPLETED = 'COMPLETED';

    use SoftDeletes;

    protected $fillable = [
        'yacht_id',
        'status',
        'client_notes'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function yacht()
    {
        return $this->belongsTo('App\Yacht');
    }

    public function history()
    {
        return $this->hasMany('App\History')->orderBy("created_at", "desc");
    }

    public function latest()
    {
        return  $this->orderBy('status', 'ASC')
            ->orderBy('updated_at', 'DESC')
            ->orderBy('updated_at', 'DESC');
    }

}
