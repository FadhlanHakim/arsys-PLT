<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchLogType extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'arsys_research_log_type';


    protected static function newFactory()
    {
        return \Modules\ArSys\Database\factories\ResearchLogTypeFactory::new();
    }
}
