<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 25/07/2018
 * Time: 19:12
 */
?>
<select class="form-control" name="x_muni_city_id" id="x_muni_city_id" onchange="getBrgy()" required>
    <option value="">Please select</option>
    <?php foreach($cities_list as $cityList): ?>
        <option value="<?php echo $cityList->muni_city_id ?>"><?php echo $cityList->muni_city_name ?></option>
    <?php endforeach ?>
</select>
