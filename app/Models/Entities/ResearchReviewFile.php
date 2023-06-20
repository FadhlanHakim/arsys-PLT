<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchReviewFile extends Model
{
    use HasFactory;

    protected $fillable = ['reviewer_id', 'filename'];

    protected $table = 'arsys_research_review_file';

    protected static function newFactory()
    {
        return \Modules\ArSys\Database\factories\ResearchReviewFileFactory::new();
    }
}
