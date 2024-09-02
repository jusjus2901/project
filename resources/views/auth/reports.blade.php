@extends('layouts.dashB')

@section('content')

<div class="row justify-content-center tw-mb-5">
    <div class="col-md-11 tw-border-2 tw-border-yellow-400 tw-bg-yellow-400 tw-bg-opacity-10 tw-rounded-md">
        <div class="d-flex align-items-center p-3">
            <div class="flex-grow-1 fw-bold tw-text-3xl tw-text-yellow-500">
                Reports
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-link tw-bg-white tw-border-2 tw-border-yellow-500 tw-text-yellow-500 tw-rounded-md">
                    <i class="bi bi-search"></i>
                </button>

                <button class="btn btn-link text-dark p-0 me-3">
                    <i class="bi bi-printer"></i>
                </button>

                <button class="btn text-white d-flex align-items-center ms-2" style="background-color: #ffc107; border: none;">
                    <i class="bi bi-person me-2">Users</i>
                </button>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover table-bordered table-responsive-sm" style="border-color: #212832;">
    <thead>
        <tr>
            <td class="text-white" style="background: #212832; border-bottom-width: 2px;">No</td>
            @foreach ($columns as $key => $label)
                @if ($key !== 'id')
                    <td class="text-white" style="background: #212832; border-top-width: 2px; border-bottom-width: 2px;">{{ $label }}</td>
                @endif
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php
            $counter = 1;
        @endphp
        @foreach ($summaryReports as $report)
            <tr class="text-white">
                <!-- Add the counter as the first column data -->
                <td>{{ $counter }}</td>
                @php
                    $counter++;
                @endphp
                @foreach ($columns as $colKey => $label)
                    @if ($colKey !== 'id')
                        @if ($colKey === 'user_inspected')
                            <td>{{ $report->user_inspected }}</td>
                        @elseif ($colKey === 'observation')
                            <td>{{ $report->observation }}</td>
                        @elseif ($colKey === 'date_inspected')
                            <td>{{ $report->date_inspected->format('Y-m-d') }}</td>
                        @elseif ($colKey === 'status')
                            <td>{{ $report->status }}</td>
                        @elseif ($colKey === 'full_information')
                            <td class="text-center">
                                <button class="table-summary-report-full-info-btn btn btn-warning btn-sm justify-center tw-w-40">
                                    <span class="tw-text-white">View Details</span>
                                </button>
                            </td>
                        @elseif ($colKey === 'action')
                            <td class="text-center">
                                <a href="{{ route('summary_reports.show', $report->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('summary_reports.edit', $report->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('summary_reports.destroy', $report->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        @else
                            <td colspan="{{ count($columns) }}" style="border-bottom-width: 2px;"></td>
                        @endif
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('header-nav')
    @include('layouts.adminHeader')
@endsection
