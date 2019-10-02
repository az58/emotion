<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


<div class="">
    <ul>
        @foreach($vehicles as $vehicle )
            <li class="n-b-md data-result">
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
