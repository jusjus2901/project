<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SummaryReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_inspected',
        'observation',
        'date_inspected',
        'status',
        'full_information',
    ];

    protected $casts = [
        'date_inspected' => 'date',
    ];
}
