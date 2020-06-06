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
        <li><a href="<?php echo base_url('landregistration/index'); ?>"><?php echo $page_title?> list</a></li>
        <li><strong><?php echo $page_title?> new record</strong></li>
    </ul>
    <div class="content">
        <div class="page-heading">
            <h1><i class='icon-cogs'></i>Create <?php echo $page_title?></h1>
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
                    <div class="form-group"> <!-- Position name -->
                        <label for="input-text" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="x_status_name" id="x_status_name" maxlength="50" value="<?php echo set_value('x_status_name'); ?>">
                        </div>
                    </div> <!-- ./Position name -->
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