<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchReviewDecisionType extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'arsys_research_review_decision_type';
}
