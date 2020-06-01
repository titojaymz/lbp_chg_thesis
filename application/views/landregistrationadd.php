<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 21/04/2018
 * Time: 18:47
 */
?>
<?php if ($access_level == -1){ ?>
<div class="content-page">
    <?php } ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('landregistration/index'); ?>"><i class="glyphicon glyphicon-home"></i></a></li>
        <li><a href="<?php echo base_url('landregistration/index'); ?>">Landowners' Claim Folders list</a></li>
        <li><strong>Landowners' Claim Folders new record</strong></li>
    </ul>
    <div class="content">
        <div class="page-heading">
            <h1><i class='icon-cogs'></i>Landowners' Claim Folders Records</h1>
        </div>

        <?php if (validation_errors() <> ''){ ?>
            <div class="alert alert-danger">
                <?php if ($system_message <> ''){ ?>
                    <strong><?php echo $system_message ?></strong>
                <?php } ?>
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>
        <?php if(ENVIRONMENT == 'development') { ?>
            <pre>
                <?php print_r($access_level) ?>
            </pre>
        <?php } ?>


        <div class="widget">
            <div class="widget-header transparent">
                <h2><strong>New</strong> record</h2>
                <div class="additional-btn">
                    <?php /*
        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
        */ ?>
                </div>
            </div>
            <div class="widget-content padding">
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group"> <!-- Date Received from DAR -->
                        <label for="input-text" class="col-sm-2 control-label">Date Received from DAR</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control datepicker-input" data-mask="9999-99-99" placeholder="yyyy-mm-dd" name="x_date_recvd_dar" id="x_date_recvd_dar" value="<?php echo set_value('x_date_recvd_dar'); ?>" required>
                        </div>
                    </div> <!-- ./Date Received from DAR -->
                    <div class="form-group"> <!-- Claim folder number -->
                        <label for="input-text" class="col-sm-2 control-label">Claim folder number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Claim folder number" name="x_claim_fld_no" id="x_claim_fld_no" maxlength="50" value="<?php echo set_value('x_claim_fld_no'); ?>" required>
                        </div>
                    </div> <!-- ./Claim folder number -->
                    <div class="form-group"> <!-- Name of land owner -->
                        <label for="input-text" class="col-sm-2 control-label">Name of land owner</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Name of land owner" name="x_name_land_owner" id="x_name_land_owner" maxlength="100" value="<?php echo set_value('x_name_land_owner'); ?>" required>
                        </div>
                    </div> <!-- ./Name of land owner -->
                    <div class="form-group"> <!-- No. of FBs -->
                        <label for="input-text" class="col-sm-2 control-label">No. of FBs</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" max="99999999999" step="any" class="form-control" placeholder="No. of FBs" name="x_no_fbs" id="x_no_fbs" maxlength="11" value="<?php echo set_value('x_no_fbs'); ?>" required>
                        </div>
                    </div> <!-- ./No. of FBs -->
                    <div class="form-group"> <!-- Area per title -->
                        <label for="input-text" class="col-sm-2 control-label">Area per title</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" max="99999999999" step="any" class="form-control"  placeholder="Area per title" name="x_area_per_title" id="x_area_per_title" maxlength="11" value="<?php echo set_value('x_area_per_title'); ?>" required>
                        </div>
                    </div> <!-- ./Area per title -->
                    <div class="form-group"> <!-- Area acquired -->
                        <label for="input-text" class="col-sm-2 control-label">Area acquired</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" max="99999999999" step="any" class="form-control"  placeholder="Area acquired" name="x_area_acqrd" id="x_area_acqrd" maxlength="11" value="<?php echo set_value('x_area_acqrd'); ?>" required>
                        </div>
                    </div> <!-- ./Area acquired -->
                    <div class="form-group"> <!-- Title number -->
                        <label for="input-text" class="col-sm-2 control-label">Title number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Title number" name="x_title_no" id="x_title_no" maxlength="50" value="<?php echo set_value('x_title_no'); ?>" required>
                        </div>
                    </div> <!-- ./Title number -->
                    <div class="form-group"> <!-- Area approved -->
                        <label for="input-text" class="col-sm-2 control-label">Area approved</label>
                        <div class="col-sm-10">
                            <input type="number" step="any" class="form-control"  placeholder="Area approved" name="x_area_aprvd" id="x_area_aprvd" maxlength="11" value="<?php echo set_value('x_area_aprvd'); ?>" required>
                        </div>
                    </div> <!-- ./Area approved -->
                    <div class="form-group"> <!-- Easement -->
                        <label for="input-text" class="col-sm-2 control-label">Easement</label>
                        <div class="col-sm-10">
                            <input type="number" step="any" class="form-control"  placeholder="Easement" name="x_easement" id="x_easement" maxlength="11" value="<?php echo set_value('x_easement'); ?>" required>
                        </div>
                    </div> <!-- ./Easement -->
                    <div class="form-group"> <!-- Lot number -->
                        <label for="input-text" class="col-sm-2 control-label">Lot number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Lot number" name="x_lot_no" id="x_lot_no" maxlength="50" value="<?php echo set_value('x_lot_no'); ?>" required>
                        </div>
                    </div> <!-- ./Lot number -->
                    <div class="form-group"> <!-- Land use -->
                        <label for="input-text" class="col-sm-2 control-label">Land use</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Land use" name="x_land_use" id="x_land_use" maxlength="50" value="<?php echo set_value('x_land_use'); ?>" required>
                        </div>
                    </div> <!-- ./Land use -->
                    <div class="form-group"> <!-- Regions -->
                        <label for="input-text" class="col-sm-2 control-label">Region</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="x_region_id" id="x_region_id" onchange="getProvince()" required>
                                <option value="">Please select</option>
                                <?php foreach($lib_regions as $regionlist): ?>
                                    <option value="<?php echo $regionlist->region_id ?>"><?php echo $regionlist->region_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div> <!-- ./Regions -->
                    <div class="form-group"> <!-- Province -->
                        <label for="input-text" class="col-sm-2 control-label">Province</label>
                        <div class="col-sm-10" id="prov_div">
                            <select class="form-control" name="x_prov_id" id="x_prov_id"  >
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Province -->
                    <div class="form-group"> <!-- Municipality/City -->
                        <label for="input-text" class="col-sm-2 control-label">Municipality/City</label>
                        <div class="col-sm-10" id="city_div">
                            <select class="form-control" name="x_muni_city_id" id="x_muni_city_id" >
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Municipality/City -->
                    <div class="form-group"> <!-- Barangay -->
                        <label for="input-text" class="col-sm-2 control-label">Barangay</label>
                        <div class="col-sm-10" id="brgy_div">
                            <select class="form-control" name="x_brgy_id" id="x_brgy_id" >
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Barangay -->
                    <div class="form-group"> <!-- Status -->
                        <label for="input-text" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="x_status_id" id="x_status_id" >
                                <option value="">Please select</option>
                                <?php foreach($lib_status as $statusList): ?>
                                    <option value="<?php echo $statusList->status_id ?>"><?php echo $statusList->status_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div> <!-- ./Bond (Land valuation) -->
                    <div class="form-group"> <!-- Land Classification -->
                        <label for="input-text" class="col-sm-2 control-label">Land Classification</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="x_land_class_id" id="x_land_class_id" >
                                <option value="">Please select</option>
                                <?php foreach($landclass as $landclassData): ?>
                                    <option value="<?php echo $landclassData->land_class_id ?>"><?php echo $landclassData->land_class_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div> <!-- ./Land Classification -->
                    <button class="btn btn-sm btn-success" type="submit">Save</button>
                </form>
            </div> <!-- ./widget-header transparent -->
        </div> <!-- ./widget -->

        <script>
            function getProvince() {
                var xhttp = new XMLHttpRequest();
                var region_id = document.getElementById('x_region_id').value;
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("prov_div").innerHTML =
                            this.responseText;
                        document.getElementById("x_muni_city_id").value = "";
                        document.getElementById("x_brgy_id").value = "";
                    }
                };
                xhttp.open("GET", "<?php echo base_url('landregistration/ajaxProvOpt/?region_id=') ?>" + region_id, true);
                xhttp.send();
            }

            function getCities() {
                var xhttp = new XMLHttpRequest();
                var prov_id = document.getElementById('x_prov_id').value;
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("city_div").innerHTML =
                            this.responseText;
                        document.getElementById("x_brgy_id").value = "";
                    }
                };
                xhttp.open("GET", "<?php echo base_url('landregistration/ajaxCitiesOpt/?prov_id=') ?>" + prov_id, true);
                xhttp.send();
            }

            function getBrgy() {
                var xhttp = new XMLHttpRequest();
                var muni_city_id = document.getElementById('x_muni_city_id').value;
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("brgy_div").innerHTML =
                            this.responseText;
                    }
                };
                xhttp.open("GET", "<?php echo base_url('landregistration/ajaxBrgyOpt/?muni_city_id=') ?>" + muni_city_id, true);
                xhttp.send();
            }

            function auto_x_land_val_total_land_value() {
                var cash_land_val = parseFloat(document.getElementById('x_land_val_cash').value);
                var bond_land_val = parseFloat(document.getElementById('x_land_val_bond').value);
                var total_land_val_js = cash_land_val + bond_land_val;
                var roundOffTotal = Math.round(total_land_val_js * 100) / 100;
                document.getElementById('js_total_landval_ajax').value = roundOffTotal;
                document.getElementById('x_land_val_total_land_value').value = roundOffTotal;

                // alert('cash_land_val ' + cash_land_val + ' and bond_land_val ' + bond_land_val + ' is equals to ' + roundOffTotal);
            }

            function auto_x_total_less_release() {
                var js_less_rel_cash = parseFloat(document.getElementById('x_less_rel_cash').value);
                var js_less_rel_bond = parseFloat(document.getElementById('x_less_rel_bond').value);
                var js_less_rel_bond_ao2 = parseFloat(document.getElementById('x_less_rel_bond_ao2').value);
                var js_total_less_rel = js_less_rel_cash + js_less_rel_bond + js_less_rel_bond_ao2;
                var roundOffTotal = Math.round(js_total_less_rel * 100) / 100;
                document.getElementById('js_total_less_rel').value = roundOffTotal;
                document.getElementById('x_less_rel_total').value = roundOffTotal;

                // alert('cash_land_val ' + cash_land_val + ' and bond_land_val ' + bond_land_val + ' is equals to ' + roundOffTotal);
            }

            function auto_x_total_ending_balances() {
                var js_end_bal_cash = parseFloat(document.getElementById('x_end_bal_cash').value);
                var js_end_bal_bond = parseFloat(document.getElementById('x_end_bal_bond').value);
                var total_land_val_js = js_end_bal_cash + js_end_bal_bond;
                var roundOffTotal = Math.round(total_land_val_js * 100) / 100;
                document.getElementById('js_total_ending_balances').value = roundOffTotal;
                document.getElementById('x_end_bal_total').value = roundOffTotal;

                // alert('cash_land_val ' + cash_land_val + ' and bond_land_val ' + bond_land_val + ' is equals to ' + roundOffTotal);
            }
        </script>