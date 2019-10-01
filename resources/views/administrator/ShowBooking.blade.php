@section('bookingBar')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> BOOKING</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                id
                            </th>
                            <th>
                                user_id
                            </th>
                            <th>
                                vehicle_id
                            </th>
                            <th class="text-right">
                                start_date
                            </th>
                            <th >
                                end_date
                            </th>
                            <th >
                                state
                            </th>
                            <th >
                                booking_price
                            </th>
                            <th >
                                age
                            </th>
                            <th >
                                phone
                            </th>
                            <th >
                                address
                            </th>
                            <th >
                                driving_licence
                            </th>

                            </thead>
                            <tbody>
                                @foreach ($bookings as  $row)
                                        <tr>
                                            <td> {{$row->id}} </td>
                                            <td> {{$row->user_id}} </td>
                                            <td> {{$row->vehicle_id}} </td>
                                            <td> {{$row->start_date}} </td>
                                            <td> {{$row->end_date}} </td>
                                            <td> {{$row->state}} </td>
                                            <td> {{$row->age}} </td>
                                            <td> {{$row->phone}} </td>
                                            <td> {{$row->address}} </td>
                                            <td> {{$row->driving_licence}} </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection