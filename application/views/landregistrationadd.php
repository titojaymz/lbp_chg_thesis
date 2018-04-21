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
        <li><a href="<?php echo base_url('landregistration/index'); ?>">Land registration list</a></li>
        <li><strong>Land registration new record</strong></li>
    </ul>
    <div class="content">
        <div class="page-heading">
            <h1><i class='icon-cogs'></i>Land registration records</h1>
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
                            <input type="text" class="form-control datepicker-input" data-mask="9999-99-99" placeholder="yyyy-mm-dd" name="x_date_recvd_dar" id="x_date_recvd_dar" value="<?php echo set_value('x_date_recvd_dar'); ?>">
                        </div>
                    </div> <!-- ./Date Received from DAR -->
                    <div class="form-group"> <!-- Claim folder number -->
                        <label for="input-text" class="col-sm-2 control-label">Claim folder number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Claim folder number" name="x_claim_fld_no" id="x_claim_fld_no" maxlength="50" value="<?php echo set_value('x_claim_fld_no'); ?>">
                        </div>
                    </div> <!-- ./Claim folder number -->
                    <div class="form-group"> <!-- Name of land owner -->
                        <label for="input-text" class="col-sm-2 control-label">Name of land owner</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Name of land owner" name="x_name_land_owner" id="x_name_land_owner" maxlength="100" value="<?php echo set_value('x_name_land_owner'); ?>">
                        </div>
                    </div> <!-- ./Name of land owner -->
                    <div class="form-group"> <!-- No. of FBs -->
                        <label for="input-text" class="col-sm-2 control-label">No. of FBs</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" max="99999999999" class="form-control" placeholder="No. of FBs" name="x_no_fbs" id="x_no_fbs" maxlength="11" value="<?php echo set_value('x_no_fbs'); ?>">
                        </div>
                    </div> <!-- ./No. of FBs -->
                    <div class="form-group"> <!-- Area per title -->
                        <label for="input-text" class="col-sm-2 control-label">Area per title</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" max="99999999999" class="form-control"  placeholder="Area per title" name="x_area_per_title" id="x_area_per_title" maxlength="11" value="<?php echo set_value('x_area_per_title'); ?>">
                        </div>
                    </div> <!-- ./Area per title -->
                    <div class="form-group"> <!-- Area acquired -->
                        <label for="input-text" class="col-sm-2 control-label">Area acquired</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" max="99999999999" class="form-control"  placeholder="Area acquired" name="x_area_acqrd" id="x_area_acqrd" maxlength="11" value="<?php echo set_value('x_area_acqrd'); ?>">
                        </div>
                    </div> <!-- ./Area acquired -->
                    <div class="form-group"> <!-- Title number -->
                        <label for="input-text" class="col-sm-2 control-label">Title number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Title number" name="x_title_no" id="x_title_no" maxlength="50" value="<?php echo set_value('x_title_no'); ?>">
                        </div>
                    </div> <!-- ./Title number -->
                    <div class="form-group"> <!-- Area approved -->
                        <label for="input-text" class="col-sm-2 control-label">Area approved</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" max="99999999999" class="form-control"  placeholder="Area approved" name="x_area_aprvd" id="x_area_aprvd" maxlength="11" value="<?php echo set_value('x_area_aprvd'); ?>">
                        </div>
                    </div> <!-- ./Area approved -->
                    <div class="form-group"> <!-- Easement -->
                        <label for="input-text" class="col-sm-2 control-label">Easement</label>
                        <div class="col-sm-10">
                            <input type="number" min="1" max="99999999999" class="form-control"  placeholder="Easement" name="x_easement" id="x_easement" maxlength="11" value="<?php echo set_value('x_easement'); ?>">
                        </div>
                    </div> <!-- ./Easement -->
                    <div class="form-group"> <!-- Lot number -->
                        <label for="input-text" class="col-sm-2 control-label">Lot number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Lot number" name="x_lot_no" id="x_lot_no" maxlength="50" value="<?php echo set_value('x_lot_no'); ?>">
                        </div>
                    </div> <!-- ./Lot number -->
                    <div class="form-group"> <!-- Land use -->
                        <label for="input-text" class="col-sm-2 control-label">Land use</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Land use" name="x_land_use" id="x_land_use" maxlength="50" value="<?php echo set_value('x_land_use'); ?>">
                        </div>
                    </div> <!-- ./Land use -->
                    <div class="form-group"> <!-- Province -->
                        <label for="input-text" class="col-sm-2 control-label">Province</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="x_prov_id" id="x_prov_id">
                                <option value="0">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Province -->
                    <div class="form-group"> <!-- Municipality/City -->
                        <label for="input-text" class="col-sm-2 control-label">Municipality/City</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="x_muni_city_id" id="x_muni_city_id">
                                <option value="0">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Municipality/City -->
                    <div class="form-group"> <!-- Barangay -->
                        <label for="input-text" class="col-sm-2 control-label">Barangay</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="x_brgy_id" id="x_brgy_id">
                                <option value="0">Please select</option>
                            </select>
                        </div>
                    </div> <!-- ./Barangay -->
                    <button class="btn btn-sm btn-success" type="submit">Save</button>
                </form>
            </div> <!-- ./widget-header transparent -->
        </div> <!-- ./widget -->
