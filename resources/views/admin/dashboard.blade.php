@extends('admin.index')


@section('title')
    Dashboard Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> HOME</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                    <div class="table-responsive">
                        <div class="col-md-6">
                            <a href="/admin/booking"> BOOKINGS</a>
                        </div>

                        <div class="col-md-6 ">
                            <a href="/admin/vehicle"> VEHICLES</a>
                        </div>

                        <div class="col-md-6">
                            <a href="/admin/user">USERS </a>
                        </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection

