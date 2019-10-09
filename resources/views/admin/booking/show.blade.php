@extends('admin.index')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

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
                            <th >
                                start_date
                            </th>
                            <th >
                                end_date
                            </th>
                            <th >
                                status
                            </th>
                            <th >
                                place
                            </th>
                            <th >
                               price
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
                            <th>
                                Edit
                            </th>

                            </thead>
                            <tbody>
                                @foreach ($bookings as  $row)
                                    <tr>
                                        <td>
                                            <input type="text" value=" {{$row->id}} "  name="id_booking"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->user_id}} " size="3" name="user_id"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->vehicle_id}} " size="3" name="vehicle_id"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->start_date}} " size="6" name="start_date"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->end_date}} " size="3" name="end_date"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->status}} " size="3" name="status"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->place}} " size="3" name="place"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->price}} " size="3" name="price"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->age}} " size="3" name="age"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->phone}} " size="3" name="phone"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->address}}" size="3" name="address"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->driving_licence}} " size="3" name="driving_licence"/>
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

@section('scripts')

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
                if (confirm("Voulez-vous vraiment modifier cet utilisateur ?")) {
                    var idTr = $(this).parent().parent().attr('id');
                    var elem = $(this).parent().parent();

                    $.ajax({
                        method: 'POST',
                        url: '/admin/booking/ajax/edit',
                        data: {
                            id_booking: idTr,
                            user_id: elem.find('input[name="user_id"]').val(),
                            vehicle_id: elem.find('input[name="vehicle_id"]').val(),
                            start_date: elem.find('input[name="start_date"]').val(),
                            end_date: elem.find('input[name="end_date"]').val(),
                            status: elem.find('input[name="status"]').val(),
                            place: elem.find('input[name="place"]').val(),
                            price: elem.find('input[name="price"]').val(),
                            age: elem.find('input[name="age"]').val(),
                            phone: elem.find('input[name="phone"]').val(),
                            address: elem.find('input[name="address"]').val(),
                            driving_licence: elem.find('input[name="driving_licence"]').val(),
                            
                        },
                        dataType: "json"
                    })
                        .done(function (response) {
                            console.log(response);
                        })
                        .fail(function (data, status) {

                        });
                }
            })

            /*$('.del').click(function(){
                if (confirm("Voulez-vous vraiment supprimer cet utilisateur ?")) {
                    var idTr    =$(this).parent().parent().attr('id');

                    $.ajax({
                        method: 'POST',
                        url: '/admin/booking/ajax/del',
                        data: {
                            id_booking       : idTr,
                        },
                        dataType: "json"
                    })
                        .done(function(id_user) {
                            //Recupère l'élément <tr> qui a un attribut 'id' égal à l'identifiant de l'utilisateur
                            // que notre controlleur nous renvoie en message de reponse json
                            $('tr[id="'+id_user+'"]').remove()
                        })
                        .fail(function(data,status) {
                            console.log("ok")
                        });
                }
            });*/

        });

    </script>


@endsection