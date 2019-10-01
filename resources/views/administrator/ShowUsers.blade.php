@extends('layouts.admin')

@section('users')

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
                                lastname
                            </th>
                            <th>
                                firstname
                            </th>
                            <th>
                                email
                            </th>
                            <th>
                                role
                            </th>
                            <th >
                                created_at
                            </th>
                            <th >
                                updated_at
                            </th>


                            </thead>
                            <tbody>
                            @foreach ($users as  $row)
                                <tr>
                                    <td> {{$row->id}} </td>
                                    <td> {{$row->lastname}} </td>
                                    <td> {{$row->firstname}} </td>
                                    <td> {{$row->email}} </td>
                                    <td> {{$row->role}} </td>
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