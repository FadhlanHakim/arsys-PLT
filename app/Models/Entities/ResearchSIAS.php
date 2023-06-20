<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchSIAS extends Model
{
    use HasFactory;

    protected $fillable = ['research_id', 'event_type', 'approval', 'approval_date'];
    protected $table = 'arsys_research_sias';

    public function research()
    {
        return $this->belongsTo(Research::class, 'research_id', 'id');
    }

    protected static function newFactory()
    {
        return \Modules\ArSys\Database\factories\ResearchSIASFactory::new();
    }
}
