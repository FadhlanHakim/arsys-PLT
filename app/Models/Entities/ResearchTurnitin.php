<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchTurnitin extends Model
{
    use HasFactory;

    protected $fillable = ['research_id', 'event_type', 'approval', 'score', 'approval_date'];
    protected $table = 'arsys_research_turnitin';

    public function research()
    {
        return $this->belongsTo(Research::class, 'research_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\ArSys\Database\factories\ResearchTurnitinFactory::new();
    }
}
