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
                    <span>Soit {{ $vehicle->day_price *  $iDays }} pour {{ $iDays }} jours</span>
                    <img src="{{ $vehicle->picture}}" width="132" height="100">
                </li>
            @endforeach
        </ul>
    </div>
</div>
