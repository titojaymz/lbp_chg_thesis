<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 25/07/2018
 * Time: 19:12
 */
?>
<select class="form-control" name="x_prov_id" id="x_prov_id" onchange="getCities()" required>
    <option value="">Please select</option>
    <?php foreach($prov_data as $provList): ?>
        <option value="<?php echo $provList->prov_id ?>" <?php if($provList->prov_id == $ajax_prov_id){ echo 'selected'; }  ?>><?php echo $provList->prov_name ?></option>
    <?php endforeach ?>
</select>
