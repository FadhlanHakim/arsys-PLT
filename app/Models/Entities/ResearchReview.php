<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchReview extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['research_id', 'reviewer_id', 'comment', 'decision_id', 'decisio_date'];
    protected $table = 'arsys_research_review';


    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'reviewer_id', 'id');
    }

    public function file()
    {
        return $this->belongsTo(ResearchReviewFile::class, 'review_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\ArSys\Database\factories\ResearchReviewFactory::new();
    }
}
