<?php

namespace App\Modules\Anaf\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnafApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'user_id',
        'client_id',
        'client_secret',
        'is_active',
        'redirect_uri'
    ];
}
