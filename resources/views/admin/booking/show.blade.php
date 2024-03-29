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
                                start_hour
                            </th>
                            <th >
                                end_hour
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
                                    <tr id="{{$row->id}}">
                                        <td>
                                            {{$row->id}}
                                            <input type="hidden" value=" {{$row->id}} " name="id_booking"/>
                                        </td>
                                        <td>
                                            {{$row->user_id}}
                                            <input type="hidden" value=" {{$row->id}} " name="user_id"/>
                                        </td>
                                        <td>
                                            {{$row->vehicle_id}}
                                            <input type="hidden" value=" {{$row->id}} " name="vehicle_id"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->start_date}} " size="6" name="start_date"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->end_date}} " size="3" name="end_date"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->start_hour}} " size="6" name="start_hour"/>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->end_hour}} " size="3" name="end_hour"/>
                                        </td>
                                        <td>
                                            <select class="cobalt-TextField__Input"  name="status">
                                                <?php $aStatus=["payed", "waiting_payment", "finished", "running"];?>
                                                @foreach($aStatus as $state)
                                                    @if($state === $row->status)
                                                            <option selected value="{{ $state }}">{{ $state }}</option>
                                                    @else
                                                            <option value="{{ $state }}">{{ $state }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" value=" {{$row->place}} " size="6" name="place"/>
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
                if (confirm("Voulez-vous vraiment modifier cette location ?")) {
                    var idTr = $(this).parent().parent().attr('id');
                    var elem = $(this).parent().parent();

                    $.ajax({
                        method: 'POST',
                        url: '/admin/booking/ajax/edit',
                        data: {
                            id_booking: idTr,
                            start_date: elem.find('input[name="start_date"]').val(),
                            end_date: elem.find('input[name="end_date"]').val(),
                            status: elem.find('select[name="status"]').val(),
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
                           alert(response);
                        })
                        .fail(function (response) {
                            showResponse(response);
                        });
                }
            });

            $('.del').click(function(){
                if (confirm("Voulez-vous vraiment supprimer cette location ?")) {
                    var idBooking    =$(this).parent().parent().attr('id');

                    $.ajax({
                        method: 'POST',
                        url: '/admin/booking/ajax/del',
                        data: {
                            id_booking       : idBooking,
                        },
                        dataType: "json"
                    })
                        .done(function(id_booking) {
                            //Recupère l'élément <tr> qui a un attribut 'id' égal à l'identifiant de l'utilisateur
                            // que notre controlleur nous renvoie en message de reponse json
                            $('tr[id="'+id_booking+'"]').remove()
                        })
                        .fail(function(data,status) {
                            console.log("ok")
                        });
                }
            });

            function showResponse(response) {

            }
        });

    </script>


@endsection