@extends('layouts.app')

@section('content')
    <input id="card-name" type="text" value="{{ $intent->amount }}">{!! "<i class='fa fa-".$intent->currency."' aria-hidden='true'></i>"!!}
    <!-- placeholder for Elements -->
    <div id="card-element"></div>
    <button id="card-button" data-secret="{{ $intent->client_secret }} ">
        Submit Payment
    </button>
@endsection