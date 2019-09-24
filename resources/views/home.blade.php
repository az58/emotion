@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <fieldset>
                            <legend>En route !</legend>
                            <div class="form-group">
                                <div class="row">
                                    <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" size="20"/>
                                    <select class="custom-select">
                                        @foreach ($aCities as $key => $row)
                                            <option value="{{ $key }}">{{ $row }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
</div>

@endsection
