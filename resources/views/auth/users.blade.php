@extends('layouts.dashB')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Hello Users</h1>
        </div>
    </div>
    <table class="table table-responsive table-collapsed">
        <thead>
            <tr>
            @foreach ($columns as $key => $label)
               <td>{{ $label }}</td>
            @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($allLineMan as $row)
                <tr>
                    @foreach ($columns as $colKey => $label)
                        @if (isset($row[$colKey]))
                            <td>{{ $row[$colKey] }}</td>
                        @elseif ($colKey === "fullinformation")
                            <td>
                                <button class="table-users-full-info-btn btn btn-warning" data-data="{{ json_encode($row) }}">
                                    View Details
                                </button>
                            </td>
                        @elseif ($colKey === "action")
                            <td>
                                <button class="table-users-action-btn border p-2" data-data="{{ json_encode($row) }}">
                                    ...
                                </button>
                            </td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- diri dapita -->
    <div id="modal" class="d-none">
        <div id="modal-head">MODAL HEAD</div>
        <div id="modal-body"></div>
        <div id="modal-footer">
            <button id="modal-close-btn">OK</button>
        </div>
    </div>
</div>
@endsection

@section('header-nav')
@include('layouts.adminHeader')
@endsection

@section('scripts')
<script src="{{ asset('js/userstable.js') }}"></script>
@endsection
