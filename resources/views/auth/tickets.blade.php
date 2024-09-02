@extends('layouts.dashB')

@section('content')

<div class="row justify-content-center tw-mb-5">
    <div class="col-md-11 tw-border-2 tw-border-yellow-400 tw-bg-yellow-400 tw-bg-opacity-10 tw-rounded-md">
        <div class="d-flex align-items-center p-3">
            <div class="flex-grow-1 fw-bold tw-text-3xl tw-text-yellow-500">
                Tickets
            </div>
            <div class="d-flex align-items-center">
                @if (Auth::user()->role === 'admin')
                    <button class="btn btn-link tw-bg-white tw-border-2 tw-border-yellow-500 tw-text-yellow-500 tw-rounded-md">
                        <i class="bi bi-search"></i>
                    </button>

                    <button class="btn btn-link tw-bg-white tw-border-2 tw-border-yellow-500 tw-text-yellow-500 tw-rounded-md ms-3">
                        <i class="bi bi-printer"></i>
                    </button>

                    <button class="btn text-white d-flex align-items-center ms-2" style="background-color: #ffc107; border: none;">
                        <i class="bi bi-person me-2">Users</i>
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div class="d-flex align-items-start flex-column col-md-12 p-3">
        @if (Auth::user()->role === 'admin')
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-responsive-sm mb-0" style="border-color: #212832;">
                    <thead>
                        <tr>
                            <td class="text-white py-2 px-3" style="background: #212832; border-bottom-width: 2px;">No</td>
                            @foreach ($columns as $key => $label)
                                @if ($key !== 'id')
                                    <td class="text-white py-2 px-3" style="background: #212832; border-top-width: 2px; border-bottom-width: 2px;">{{ $label }}</td>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @foreach ($allTickets as $ticket)
                            <tr class="text-white">
                                <td class="py-2 px-3">{{ $counter }}</td>
                                @php
                                    $counter++;
                                @endphp
                                @foreach ($columns as $colKey => $label)
                                    @if ($colKey !== 'id')
                                        @if (isset($ticket[$colKey]))
                                            <td class="py-2 px-3">{{ $ticket[$colKey] }}</td>
                                        @elseif ($colKey === "fullinformation")
                                            <td class="text-center py-2 px-3">
                                                <button class="table-users-full-info-btn btn btn-warning btn-sm justify-center tw-w-40" data-data="{{ json_encode($ticket) }}">
                                                    <span class="tw-text-white">View Details</span>
                                                </button>
                                            </td>
                                        @elseif ($colKey === "action")
                                            <td class="text-center py-2 px-3">
                                                <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info btn-sm">View</a>
                                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        @else
                                            <td colspan="{{ count($columns) }}" class="py-2 px-3" style="border-bottom-width: 2px;"></td>
                                        @endif
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>

@endsection

@section('header-nav')
    @include('layouts.adminHeader')
@endsection
