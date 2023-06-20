<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchReviewHistory extends Model
{
    use HasFactory;
    protected $table = 'arsys_research_review_history';
    protected $fillable = ['research_id', 'user_id', 'activity_id', 'comment'];
}
