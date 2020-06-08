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
        <li><strong>Landowners' Claim Folders update record</strong></li>
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
                <h2><strong>Update</strong> record</h2>
                <div class="additional-btn">
                    <?php /*
        <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
        <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
        <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
        */ ?>
                </div>
            </div>
            <body</body>
            <div class="widget-content padding">
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group"> <!-- Last name -->
                        <label for="input-text" class="col-sm-2 control-label">Last name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="x_lastname" id="x_lastname" value="<?php echo $landregistrationdata['lastname'] ?>">
                        </div>
                    </div> <!-- ./Last name -->
                    <div class="form-group"> <!-- First name -->
                        <label for="input-text" class="col-sm-2 control-label">First name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="x_firstname" id="x_firstname" value="<?php echo $landregistrationdata['firstname'] ?>">
                        </div>
                    </div> <!-- ./First name -->
                    <div class="form-group"> <!-- Middle name -->
                        <label for="input-text" class="col-sm-2 control-label">Middle name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="x_middlename" id="x_middlename" value="<?php echo $landregistrationdata['middlename'] ?>">
                        </div>
                    </div> <!-- ./Middle name -->
                    <div class="form-group"> <!-- Extension name -->
                        <label for="input-text" class="col-sm-2 control-label">Extension name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="x_extname" id="x_extname" value="<?php echo $landregistrationdata['extname'] ?>">
                        </div>
                    </div> <!-- ./Extension name -->
                    <div class="form-group"> <!-- Regions -->
                        <label for="input-text" class="col-sm-2 control-label">Region</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="x_region_id" id="x_region_id" onchange="getProvince()" required>
                                <option value="">Please select</option>
                                <?php foreach($lib_regions as $regionlist): ?>
                                    <option <?php echo ($regionlist->region_id == $landregistrationdata['region_id'])? 'selected' : '' ?> value="<?php echo $regionlist->region_id ?>"><?php echo $regionlist->region_name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div> <!-- ./Regions -->
                    <div class="form-group"> <!-- Province -->
                        <label for="input-text" class="col-sm-2 control-label">Province</label>
                        <div class="col-sm-10" id="prov_div">
                            <select class="form-control" name="x_prov_id" id="x_prov_id" required>
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Province -->
                    <div class="form-group"> <!-- Municipality/City -->
                        <label for="input-text" class="col-sm-2 control-label">Municipality/City</label>
                        <div class="col-sm-10" id="city_div">
                            <select class="form-control" name="x_muni_city_id" id="x_muni_city_id" required>
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Municipality/City -->
                    <div class="form-group"> <!-- Barangay -->
                        <label for="input-text" class="col-sm-2 control-label">Barangay</label>
                        <div class="col-sm-10" id="brgy_div">
                            <select class="form-control" name="x_brgy_id" id="x_brgy_id" required>
                                <option value="">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Barangay -->
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

            function getbodyProv() {
                var xhttp = new XMLHttpRequest();
                var region_id = document.getElementById('x_region_id').value;
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("prov_div").innerHTML =
                            this.responseText;
                    }
                };
                xhttp.open("GET", "<?php echo base_url('landregistration/ajaxbodyProvOpt/?region_id=') ?>" + "<?php echo $landregistrationdata['region_id'] ?>" + "&prov_id=<?php echo $landregistrationdata['prov_id'] ?>", true);
                xhttp.send();
            }

            function getbodyCities() {
                var xhttp = new XMLHttpRequest();
                var prov_id = document.getElementById('x_prov_id').value;
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("city_div").innerHTML =
                            this.responseText;
                    }
                };
                xhttp.open("GET", "<?php echo base_url('landregistration/ajaxbodyCitiesOpt/?prov_id=') ?>" + "<?php echo $landregistrationdata['prov_id'] ?>" + "&muni_city_id=<?php echo $landregistrationdata['muni_city_id'] ?>", true);
                xhttp.send();
            }

            function getbodyBrgy() {
                var xhttp = new XMLHttpRequest();
                var muni_city_id = document.getElementById('x_muni_city_id').value;
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("brgy_div").innerHTML =
                            this.responseText;
                    }
                };
                xhttp.open("GET", "<?php echo base_url('landregistration/ajaxbodyBrgyOpt/?muni_city_id=') ?>" + "<?php echo $landregistrationdata['muni_city_id'] ?>" + "&brgy_id=<?php echo $landregistrationdata['barangay_id'] ?>", true);
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

            $(document).ready(function(){
                getbodyProv();
                getbodyCities();
                getbodyBrgy();
                var land_owner_id = 'x_name_land_owner';
                $.ajax({
                    url: "<?php echo base_url('landregistration/landownerjson'); ?>",
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        $('#' + land_owner_id +'').html('');
                        $('#' + land_owner_id +'').append( '<option value="">Please Select</option>' );
                        for (var i = 0 ; i < data.length;i++) {
                            $('#' + land_owner_id +'').append( '<option value="'+ data[i].land_owner_id+'">'+ data[i].fullname +'</option>' );
                        }
                    }
                });
                $('#x_name_land_owner').val('<?php echo $landregistrationdata['land_owner_id'] ?>').trigger('change');
            });
        </script>