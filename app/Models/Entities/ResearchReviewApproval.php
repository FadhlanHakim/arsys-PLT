<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchReviewApproval extends Model
{
    use HasFactory;

    protected $fillable = ['research_id', 'reviewer_id', 'comment', 'decision_id', 'decision_date'];
    protected $table = 'arsys_research_review';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'reviewer_id', 'id');
    }

    public function file()
    {
        return $this->hasOne(ResearchReviewFile::class, 'review_id', 'id');
    }
}
