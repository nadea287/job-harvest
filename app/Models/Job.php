<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'company',
        'location',
        'description'
    ];


    public function cvs(): BelongsToMany
    {
        return $this->belongsToMany(Cv::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('score', function (Builder $builder) {
            $builder->select('jobs.*',
                DB::raw('(SELECT COUNT(cv_id) FROM cv_job JOIN cvs ON cvs.id = cv_job.cv_id WHERE cv_job.job_id = jobs.id) AS score'));
        });
    }
}
