<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'user_issued',
        'ticket_status',
        'ticket_description',
        'full_information',
    ];

    protected $casts = [
        'full_information' => 'array',
    ];
}
