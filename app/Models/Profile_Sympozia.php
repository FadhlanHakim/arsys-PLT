<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_Sympozia extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'user_code', 'first_name', 'last_name', 'affiliation', 'email'];
    protected $table = 'sympozia_profile';
}
