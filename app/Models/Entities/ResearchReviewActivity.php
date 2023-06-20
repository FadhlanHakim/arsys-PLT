<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchReviewActivity extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'arsys_research_review_activity';

    protected static function newFactory()
    {
        return \Modules\ArSys\Database\factories\ResearchReviewActivityFactory::new();
    }
}
