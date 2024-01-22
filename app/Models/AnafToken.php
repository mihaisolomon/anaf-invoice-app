<?php

namespace App\Models;

use App\Modules\Anaf\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnafToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'anaf_application_id',
        'metadata',
        'expires_in'
    ];

    protected $casts = [
        'metadata' => Json::class
    ];
}
