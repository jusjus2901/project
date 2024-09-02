@extends('layouts.dashB')

@section('content')
<div class="container">

    <div class="row justify-content-center tw-mb-5">
        <div class="col-md-11 tw-border-2 tw-border-yellow-400 tw-bg-yellow-400 tw-bg-opacity-10 tw-rounded-md">
            <div class="d-flex align-items-center p-3">
                <div class="flex-grow-1 fw-bold tw-text-3xl tw-text-yellow-500">
                    Users
                </div>
                <div class="d-flex align-items-center">
                    <button class="btn btn-link tw-bg-white tw-border-2 tw-border-yellow-500 tw-text-yellow-500 tw-px-3 tw-py-2 tw-rounded-md">
                        <i class="bi bi-search"></i>
                    </button>

                    <button class="btn btn-link text-dark p-0 me-3" style="border: none;">
                        <i class="bi bi-printer"></i>
                    </button>

                    <button class="btn text-white d-flex align-items-center" style="background-color: #ffc107; border: none;">
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
            @foreach ($allLineMan as $row)
                <tr class="text-white">
                    <!-- Add the counter as the first column data -->
                    <td>{{ $counter }}</td>
                    @php
                        $counter++;
                    @endphp
                    @foreach ($columns as $colKey => $label)
                        @if ($colKey !== 'id')
                            @if (isset($row[$colKey]))
                                <td>{{ $row[$colKey] }}</td>
                            @elseif ($colKey === "fullinformation")
                                <td class="text-center">
                                    <button class="table-users-full-info-btn btn btn-warning btn-sm justify-center tw-w-40" data-data="{{ json_encode($row) }}">
                                        <span class="tw-text-white">View Details</span>
                                    </button>
                                </td>
                            @elseif ($colKey === "action")
                                <td class="text-center">
                                    <button class="table-users-action-btn border tw-px-2" data-data="{{ json_encode($row) }}">
                                        ...
                                    </button>
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

    <!-- diri dapita -->
    <div id="modal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modal-head" class="modal-header bg-dark text-white">
                    <h5 class="modal-title">MODAL HEAD</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-body" class="modal-body bg-light">
                    <!-- Modal content here -->
                </div>
                <div id="modal-footer" class="modal-footer bg-dark text-white d-flex justify-content-end">
                    <button class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('header-nav')
@include('layouts.adminHeader')
@endsection

@section('scripts')
{{-- @vite('') --}}
    {{-- <script src="{{ asset('js/userstable.js') }}"></script> --}}
    @vite(['resources/js/userstable.js'])
@endsection
