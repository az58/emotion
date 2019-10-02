<!-- Remember to include jQuery :) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script>
    $(function() {
        $('.modal').modal()
    });
</script>

<div class="modal" id="infos">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Plus d'informations</h4>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach($vehicles as $vehicle )
                        <li class="n-b-md data-result">
                            {{ $vehicle->id }}
                            {{ $vehicle->category }}
                            {{ $vehicle->type }}
                            {{ $vehicle->color }}
                            {{ $vehicle->battery_brand }}
                            {{ $vehicle->current_place }}
                            {{ $vehicle->day_price}} €
                            <button id="showOffer" data-content="{{ $vehicle->id }}">Voir l'offre</button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
