<?php

namespace App\Models;

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
}
