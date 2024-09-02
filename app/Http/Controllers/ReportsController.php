<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SummaryReport;

class ReportsController extends Controller
{
    public function index()
    {
        $summaryReports = SummaryReport::all();
        return view('auth.reports', [
            'columns' => [
                'user_inspected' => 'User Inspected',
                'observation' => 'Observation',
                'date_inspected' => 'Date Inspected',
                'status' => 'Status',
                'fullinformation' => 'Full Information',
                'action' => 'Actions',
            ],
            'summaryReports' =>$summaryReports,
        ]);
    }
}
