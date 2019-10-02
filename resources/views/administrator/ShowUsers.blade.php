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
                                Id
                            </th>
                            <th>
                                Lastname
                            </th>
                            <th>
                                Firstname
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Role
                            </th>
                            <th >
                                Created_at
                            </th>
                            <th >
                                Updated_at
                            </th>
                            <th >
                                Edit
                            </th>


                            </thead>
                            <tbody>
                            @foreach ($users as  $row)
                                <tr id="{{$row->id}}">
                                    <td>
                                      <input type="text" value=" {{$row->id}} " name="id_User"/>
                                    </td>
                                    <td>
                                      <input type="text" value=" {{$row->lastname}} " name="lastname"/>
                                    </td><td>
                                      <input type="text" value=" {{$row->firstname}} " name="firstname"/>
                                    </td><td>
                                      <input type="text" value=" {{$row->email}} " name="email"/>
                                    </td>
                                    </td>
                                    <td>
                                        <select class="cobalt-TextField__Input"  name="role">
                                            <option value="admin">admin</option>
                                            <option value="buyer">buyer</option>
                                        </select>
                                      <input type="text" value=" {{$row->role}} " name="role"/>

                                    </td>
                                    </td>
                                    <td>
                                        {{$row->created_at}}
                                    </td>
                                    </td>
                                    <td>
                                        {{$row->updated_at}}
                                    </td>
                                <td>
                                    <button class="fas fa-edit fa-lg" Class="edit"></button>
                                    <button class="fas fa-trash fa-lg" id="del"></button>
                                </td>
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


    <!-- Remember to include jQuery :visage_légèrement_souriant: -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script><!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script>

        $(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.edit').click(function() {
                var idTr  = $(this).parent().parent().attr('id');
                var elem = $(this).parent().parent();
                $.ajax({
                    method: 'POST',
                    url: '/ajaxEditUser',
                    data: {
                        id_user       : idTr,
                        lastename     : elem.find('input[name="lastname"]').val(),
                        firstname     : elem.find('input[name="firstname"]').val(),
                        email         : elem.find('input[name="email"]').val(),
                        role          : elem.find('select[name="role"]').val()
                    },
                    dataType: "json"
                })
                    .done(function(response) {
                        console.log(response);
                    });
            })
                .fail(function(data,status) {
                    result.text('not found');
                });
        });

</script>

