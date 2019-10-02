<div class="col-md-8">
<fieldset class="">
    <div class="flex-row">
        <label for="date-picker">Du : </label>
        <input type="text" class ="cobalt-TextField__Input" name="daterange" value="<?php echo $sToday->format('m/d/Y').' - '.$sAWeek->format('m/d/Y'); ?>" id="date-picker"/>
        <label for="cities-select">À partir de : </label>
        <select class="cobalt-TextField__Input" id="cities-select" name="cities">
            <option selected value="447">Paris</option>
            @foreach ($aCities as $key => $row)
                <option value="{{ $key }}">{{ $row }}</option>
            @endforeach
        </select>
        <label for="categories-select">Car / Scooter : </label>
        <select class="cobalt-TextField__Input" id="categories-select" name="categories">
            <option value="car">Car</option>
            <option value="scooter">Scooter</option>
            <option selected  value="">Car and Scooter</option>
        </select>
        <button type="submit" id="book" class="cobalt-Button cobalt-Button--primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
</fieldset>
<div class="">
    <p>Filter settings:</p>

    <div>
        <input type="range" id="price_start" name="price_start" min="10" max="100" value="10" step="1">
        <span class="cobalt-Icon" id="price_start_value"></span>
        <label for="price_start">Price Min</label>
    </div>

    <div>
        <input type="range" id="price_end" name="price_end" min="100" max="1000" value="150" step="1">
        <span class="cobalt-Icon" id="price_end_value"></span>
        <label for="price_end">Price Max</label>
    </div>
</div>

<div id="result-content" class="m">
    {{--   Search Result zone   --}}

</div>
</div>