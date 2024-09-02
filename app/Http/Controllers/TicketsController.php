<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketsController extends Controller
{
    public function index()
    {

        $allTickets = Ticket::all();
        return view('auth.tickets', [
            'columns' => [
                'id' => 'NO',
                'ticket_id' => 'Ticket ID',
                'user_issued' => 'User Issued',
                'ticket_status' => 'Ticket Status',
                'ticket_description' => 'Ticket Description',
                'fullinformation' => 'Full Information',
                'action' => 'Actions',
            ],

            'allTickets' => $allTickets
        ]);
    }
}
