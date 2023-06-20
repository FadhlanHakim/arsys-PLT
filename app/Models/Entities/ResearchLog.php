<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchLog extends Model
{
    use HasFactory;

    protected $fillable = ['research_id', 'message', 'loger_id', 'loger_role'];
    protected $table = 'arsys_research_log';

    protected static function newFactory()
    {
        return \Modules\ArSys\Database\factories\ResearchLogFactory::new();
    }
}
