<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalReviewer extends Model
{
    use HasFactory;
    protected $fillable = ['research_id', 'reviewer', 'comment'];
    protected $table = 'arsys_proposal_reviewer';

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'reviewer_id', 'id');
    }

    public function file()
    {
        return $this->hasOne(ResearchReviewFile::class, 'id', 'review_id');
    }
    public function decision()
    {
        return $this->belongsTo(ResearchReviewDecisionType::class, 'decision_id', 'id');
    }
}
