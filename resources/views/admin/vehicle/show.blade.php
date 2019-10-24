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
                                    current_place
                                </th>
                                <th>
                                    available
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

                                <th >
                                    edit
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as  $row)
                                    <tr id="{{$row->id}}">
                                        <td>
                                            {{$row->id}}
                                            <input type="hidden" value=" {{$row->id}} " name="id_vehicle"/>
                                        </td>

                                        <td>
                                            <select class="cobalt-TextField__Input"  name="category">
                                                <?php $categ=['car','scooter'];?>
                                                @foreach( $categ as $cat)
                                                    @if( $cat === $row->category)
                                                            <option selected value="{{ $cat}} ">{{ $cat}}</option>
                                                    @else
                                                            <option  value="{{ $cat }} ">{{ $cat}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->brand}} " size="6" name="brand"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->type}} " size="5" name="type"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->color}} " size="4" name="color"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->current_place}} " size="7" name="current_place"/>
                                        </td>
                                        <td>
                                            <select class="cobalt-TextField__Input"  name="status">
                                                <?php $aAvailability=["Visible" => 1, "caché" => 0];?>

                                                @foreach( $aAvailability as $key => $value)
                                                    @if($value === $row->available)
                                                        <option selected value="{{ $value }}">{{ $key }}</option>
                                                    @else
                                                        <option value= "{{ $value }}">{{ $key }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->licence_plate}} " size="8" name="licence_plate"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->kilometer}} " size="5" name="kilometer"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->serial_number}} " size="10" name="serial_number"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->date_purchase}} " size="6"name="date_purchase"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->buying_price}} " size="3" name="buying_price"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->day_price}} " size="3" name="day_price"/>
                                        </td>

                                        <td>
                                            <input type="text" value=" {{$row->battery_level}} " size="3" name="battery_level"/>
                                        </td>

                                        <td>
                                            <select class="cobalt-TextField__Input"  name="battery_brand">
                                                <option value="c_n"> Cadmium nickel </option>
                                                <option selected value="n_m_h"> Nickel métal hydrure </option>
                                                <option selected value="l"> Lithium </option>
                                                <option selected value="l_i"> Lithium-ion </option>
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
    <div class="row">
        <form action="vehicle/add" method="POST">
            @csrf
            <div class="row">
                <input type="text" name="brand" placeholder="Huyndai" required>

                <input type="text" name="type" placeholder="Getz" required>

                <input type="text" name="color" placeholder="blue" required>

                <select name="category">
                    <option selected value="car">Voiture</option>
                    <option value="scooter">Scooter</option>
                </select>

                <input type="text" name="serial_number" placeholder="numero de serie" required>

                <input type="text" name="licence_plate" placeholder="plaque d'immatriculation" required>

                <input type="number" name="kilometer" placeholder="Nombre de kilometre " required>

                <input type="date" name="date_purchase" placeholder="date d'achat" required>

                <input type="number" min="200" max="1000000" name="buying_price" placeholder="Prix d'achat" required>
            </div>

            <div class="row">

                <select name="available">
                    <option selected value="1">Disponible</option>
                    <option value="0">Non disponible</option>
                </select>

                <input type="number" min="15" max="500" name="day_price" placeholder="Prix à la journée" required>

                <select name="current_place">
                    @foreach($countries as $country)
                        <option value="{{$country}}">{{$country}}</option>
                    @endforeach
                </select>

                <input type="number" min="0" max="100" name="battery_level" placeholder="Niveau de battery en %" value="100" required>

                <select name="battery_brand">
                    <option value="c_n"> Cadmium nickel </option>
                    <option selected value="n_m_h"> Nickel métal hydrure </option>
                    <option selected value="l"> Lithium </option>
                    <option selected value="l_i"> Lithium-ion </option>
                </select>

                <input type="file" name="picture" >
            </div>

            <input type="submit">
        </form>

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
                if (confirm("Voulez-vous vraiment modifier ce Vehicule ?")) {
                    var idTr = $(this).parent().parent().attr('id');
                    var elem = $(this).parent().parent();

                    $.ajax({
                        method: 'POST',
                        url: '/admin/vehicle/ajax/edit',
                        data: {
                            id_vehicle: idTr,
                            category: elem.find('select[name="category"]').val(),
                            brand: elem.find('input[name="brand"]').val(),
                            type: elem.find('input[name="type"]').val(),
                            color: elem.find('input[name="color"]').val(),
                            current_place: elem.find('input[name="current_place"]').val(),
                            available: elem.find('select[name="status"]').val(),
                            licence_plate: elem.find('input[name="licence_plate"]').val(),
                            kilometer: elem.find('input[name="kilometer"]').val(),
                            serial_number: elem.find('input[name="serial_number"]').val(),
                            date_purchase: elem.find('input[name="date_purchase"]').val(),
                            buying_price: elem.find('input[name="buying_price"]').val(),
                            day_price: elem.find('input[name="day_price"]').val(),
                            battery_level: elem.find('input[name="battery_level"]').val(),
                            battery_brand: elem.find('select[name="battery_brand"]').val(),
                        },
                        dataType: "json"
                    })
                    .done(function (response) {
                        console.log(response);
                    })
                    .fail(function (data, status) {

                    });
                }
            });

            $('.del').click(function(){
                if (confirm("Voulez-vous vraiment supprimer ce véhicule ?")) {
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
                        console.log("an error occured")
                    });
                }
            });
        });
        

    </script>
@endsection