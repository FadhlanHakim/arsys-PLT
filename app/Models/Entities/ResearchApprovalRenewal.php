<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchApprovalRenewal extends Model
{
    use \Awobaz\Compoships\Compoships;
    use HasFactory;
    protected $fillable = ['research_id', 'decision', 'approval_date'];
    protected $table = 'arsys_research_approval_renewal';

    public function research()
    {
        return $this->belongsTo(Research::class, 'research_id', 'id');
    }
}
