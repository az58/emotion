<div class="col-md-5">
    <form action="/vehicle/search" method="post">
        @csrf
        <div class="flex-row">
            <label for="date-picker">Du : </label>
            <input type="text" class ="cobalt-TextField__Input" name="daterange" value="<?php echo $sToday->format('m/d/Y');?>" id="date-picker"/>

            <label for="cities-select">À partir de : </label>
            <select class="cobalt-TextField__Input" id="cities-select" name="cities">
                <option selected value="paris">Paris</option>
                @foreach ($aCities as $key => $row)
                    <option value="{{ $row }}">{{ $row }}</option>
                @endforeach
            </select>
            <label for="categories-select">Car / Scooter : </label>
            <select class="cobalt-TextField__Input" id="categories-select" name="category">
                <option value="car">Car</option>
                <option value="scooter">Scooter</option>
                <option selected  value="">Car and Scooter</option>
            </select>
        </div>
        <div class="">
            <p>Moins de:</p>
            <div>
                <input type="range" id="price_end" name="price_end" min="100" max="1000" value="150" step="1">
                <span class="cobalt-Icon" id="price_end_value"></span>
            </div>
        </div>
        <input  type="submit" id="book" class="cobalt-Button cobalt-Button--primary" value="Reserver"/>
    </form>

<div id="result-content" class="m">
    {{--   Search Result zone   --}}

</div>
</div>