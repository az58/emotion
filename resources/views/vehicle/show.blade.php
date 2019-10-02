@include("layouts.app")
<div class="content">
    <div class="">
        <ul>
            @foreach($vehicles as $vehicle )
                <li class="">
                    {{ $vehicle->category }}
                    {{ $vehicle->type }}
                    {{ $vehicle->color }}
                    {{ $vehicle->battery_brand }}
                    {{ $vehicle->current_place }}
                    {{ $vehicle->day_price}} €
                </li>
            @endforeach
        </ul>
    </div>
</div>
