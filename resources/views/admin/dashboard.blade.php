@extends('admin.index')


@section('title')
    Dashboard Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Simple Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <a href="/admin/booking"> BOOKINGS</a>
                        <a href="/admin/vehicle"> VEHICLES</a>
                        <a href="/admin/user">USERS </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection

