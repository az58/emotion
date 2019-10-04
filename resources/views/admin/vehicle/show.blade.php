@extends('admin.index')

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
                                <tr id="{{$row->id}}">
                                    <td>
                                        <input type="text" value=" {{$row->id}} " size="3" name="id_user"/>
                                    </td>
                                    <td>
                                    <td>
                                        <select class="cobalt-TextField__Input"  name="category">
                                            <option value="car">car</option>
                                            <option selected  value="scooter">scooter</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" value=" {{$row->brand}} " size="10" name="brand"/>
                                    </td>
                                    <td>
                                        <input type="text" value=" {{$row->type}} " size="10" name="type"/>
                                    </td>
                                    <td>
                                        <input type="text" value=" {{$row->color}} " name="color"/>
                                    </td>

                                    <td>
                                        <input type="text" value=" {{$row->current_place}} " name="color"/>
                                    </td>

                                    <td>
                                        <input type="text" value=" {{$row->licence_plate}} " name="color"/>
                                    </td>

                                    <td>
                                        <input type="text" value=" {{$row->kilometer}} " name="color"/>
                                    </td>

                                    <td>
                                        <input type="text" value=" {{$row->serial_number}} " name="color"/>
                                    </td>

                                    <td>
                                        <input type="text" value=" {{$row->date_purchase}} " name="color"/>
                                    </td>

                                    <td>
                                        <input type="text" value=" {{$row->buying_price}} " name="color"/>
                                    </td>

                                    <td>
                                        <input type="text" value=" {{$row->day_price}} " name="color"/>
                                    </td>

                                    <td>
                                        <input type="text" value=" {{$row->battery_level}} " name="color"/>
                                    </td>

                                    <td>
                                        <select class="cobalt-TextField__Input"  name="battery_brand">
                                            <option value="c_n">Cadmium nickel</option>
                                            <option selected  value="n_m_h">Nickel métal hydrure</option>
                                            <option selected  value="l">Lithium</option>
                                            <option selected  value="l_i">Lithium-ion</option>
                                        </select>
                                    </td>

                                    <td>
                                        <img src="{{$row->picture}}">
                                    </td>

                                    <td> {{$row->created_at}} </td>
                                    <td> {{$row->updated_at }} </td>

                                    <td>
                                        <button class="fas fa-edit fa-lg edit" id="edit"></button>
                                        <button class="fas fa-trash fa-lg del" id="del"></button>
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
                var idTr  = $(this).parent().parent().attr('id');
                var elem = $(this).parent().parent();

                $.ajax({
                    method: 'POST',
                    url: '/admin/vehicle/ajax/edit',
                    data: {
                        id_vehicle      : idTr,
                        category        : elem.find('select[name="category"]').val(),
                        brand           : elem.find('input[name="brand"]').val(),
                        type            : elem.find('input[name="type"]').val(),
                        color           : elem.find('input[name="color"]').val(),
                        current_place   : elem.find('input[name="current_place"]').val(),
                        licence_plate   : elem.find('input[name="licence_plate"]').val(),
                        kilometer       : elem.find('input[name="kilometer"]').val(),
                        serial_number   : elem.find('input[name="serial_number"]').val(),
                        date_purchase   : elem.find('input[name="date_purchase"]').val(),
                        buying_price    : elem.find('input[name="buying_price"]').val(),
                        day_price       : elem.find('input[name="day_price"]').val(),
                        battery_level   : elem.find('input[name="battery_level"]').val(),
                        battery_brand   : elem.find('select[name="battery_brand"]').val(),
                    },
                    dataType: "json"
                })
                    .done(function(response) {
                        console.log(response);
                    })
                    .fail(function(data,status) {

                    });
            });
            $('.del').click(function(){
                if (confirm("Voulez-vous vraiment supprimer cette Véhicule ?")) {
                    var idTr    =$(this).parent().parent().attr('id');
                    var elem    =$(this).parent().parent();

                    $.ajax({
                        method: 'POST',
                        url: '/admin/vehicle/ajax/del',
                        data: {
                            id_vehicle       : idTr,
                        },
                        dataType: "json"
                    })
                
                    .done(function(id_vehicle) {
                        //Recupère l'élément <tr> qui a un attribut 'id' égal à l'identifiant de l'utilisateur
                        // que notre controlleur nous renvoie en message de reponse json
                        $('tr[id="'+id_vehicle+'"]').remove()
                    })
                    .fail(function(data,status) {
                        console.log("ok")
                    });
                }
            });
        });
        

    </script>
@endsection