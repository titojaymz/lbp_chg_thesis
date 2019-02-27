<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 25/07/2018
 * Time: 19:12
 */
?>
<select class="form-control" name="x_prov_id" id="x_prov_id" onchange="getCities()" required>
    <option value="">Please select</option>
    <?php foreach($prov_list as $provData): ?>
        <option value="<?php echo $provData->prov_id ?>"><?php echo $provData->prov_name ?></option>
    <?php endforeach ?>
</select>
