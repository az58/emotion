@extends('administrator.admin')

@section('vehicle')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                id
                            </th>
                            <th>
                                category
                            </th>
                            <th>
                                brand
                            </th>
                            <th>
                                type
                            </th>
                            <th>
                                color
                            </th>
                            <th>
                            <th>
                                current_place
                            </th>
                            <th>
                                licence_plate
                            </th>
                            <th>
                                kilometer
                            </th>
                            <th>
                                serial_number
                            </th>
                            <th>
                                date_purchase
                            </th>
                            <th>
                                buying_price
                            </th>
                            <th>
                                day_price
                            </th>
                            <th>
                                battery_level
                            </th>
                            <th>
                                battery_brand
                            </th>
                            <th>
                                picture
                            </th>

                            <th >
                                created_at
                            </th>
                            <th >
                                updated_at
                            </th>


                            </thead>
                            <tbody>
                            @foreach ($vehicles as  $row)
                                <tr>
                                    <td> {{$row->id}} </td>
                                    <td> {{$row->category}} </td>
                                    <td> {{$row->brand}} </td>
                                    <td> {{$row->type}} </td>
                                    <td> {{$row->color}} </td>
                                    <td> {{$row->current_place}} </td>
                                    <td> {{$row->licence_plate}} </td>
                                    <td> {{$row->kilometer}} </td>
                                    <td> {{$row->serial_number}} </td>
                                    <td> {{$row->date_purchase}} </td>
                                    <td> {{$row->buying_price}} </td>
                                    <td> {{$row->day_price }} </td>
                                    <td> {{$row->battery_level}} </td>
                                    <td> {{$row->battery_brand}} </td>
                                    <td> <img src="{{$row->picture}}"> </td>
                                    <td> {{$row->created_at}} </td>
                                    <td> {{$row->updated_at }} </td>

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

@section('scripts')

@endsection