<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 25/07/2018
 * Time: 19:12
 */
?>
<select class="form-control" name="x_brgy_id" id="x_brgy_id" required>
    <option value="">Please select</option>
    <?php foreach($cities_list as $cityList): ?>
        <option value="<?php echo $cityList->brgy_id ?>" <?php if($cityList->brgy_id == $ajax_brgy_id){ echo 'selected'; } ?>><?php echo $cityList->brgy_name ?></option>
    <?php endforeach ?>
</select>
