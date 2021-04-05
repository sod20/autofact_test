<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $fillable = [
        'user_id',
        'note',
        'page_load_speed',
        'page_reliability',
        'created_at',
    ];
}
