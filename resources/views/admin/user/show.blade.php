@extends('admin.index')

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
                                      <input type="text" value=" {{$row->id}} " size="3" name="id_User"/>
                                    </td>
                                    <td>
                                      <input type="text" value=" {{$row->lastname}} " size="10" name="lastname"/>
                                    </td><td>
                                      <input type="text" value=" {{$row->firstname}} " size="10" name="firstname"/>
                                    </td><td>
                                      <input type="text" value=" {{$row->email}} " name="email"/>
                                    </td>
                                    <td>

                                        <select class="cobalt-TextField__Input"  name="role">
                                            <option value="admin">admin</option>
                                            <option selected  value="buyer">buyer</option>
                                        </select>
                                    </td>
                                    <td>
                                        {{$row->created_at}}
                                    </td>
                                    <td>
                                        {{$row->updated_at}}
                                    </td>
                                <td>
                                    <button class="fas fa-edit fa-lg edit"></button>
                                    <button class="fas fa-trash fa-lg del"></button>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- jQuery Modal -->
    <script>

        $(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.edit').click(function() {
                var idTr  = $(this).parent().parent().attr('id');
                var elem  = $(this).parent().parent();

                $.ajax({
                    method: 'POST',
                    url: '/admin/user/ajax/edit',
                    data: {
                        id_user       : idTr,
                        lastname      : elem.find('input[name="lastname"]').val(),
                        firstname     : elem.find('input[name="firstname"]').val(),
                        email         : elem.find('input[name="email"]').val(),
                        role          : elem.find('select[name="role"]').val()
                    },
                    dataType: "json"
                })
                .done(function(response) {
                    console.log(response);
                })
                .fail(function(data,status) {

                });
            })

            $('.del').click(function(){
                var idTr    =$(this).parent().parent().attr('id');
                var elem    =$(this).parent().parent();

                $.ajax({
                    method: 'POST',
                    url: '/admin/user/ajax/del',
                    data: {
                        id_user       : idTr,
                    },
                    dataType: "json"
                })
                .done(function() {
                        elem.remove()
                })
                .fail(function(data,status) {

                });
            });

        });

</script>

