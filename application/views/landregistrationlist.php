<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 24/02/2018
 * Time: 5:37 PM
 */
?>
<div class="content-page">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('landregistration/index'); ?>"><i class="glyphicon glyphicon-home"></i></a></li>
        <li><strong>Claim Folders list</strong></li>
    </ul>
    <div class="content">
        <div class="page-heading">
            <h1><i class='icon-address-book-alt'></i>Landowners Compensation Masterlist</h1>
        </div>

        <?php if ($system_message <> ''){ ?>
            <div class="alert alert-info">
                <strong><?php echo $system_message ?></strong>
            </div>
        <?php } ?>
        <?php if(ENVIRONMENT == 'development') { ?>
            <pre>
                <?php print_r($access_level) ?>
            </pre>
        <?php } ?>

        <div class="row">
            <div class="col-md-12">
                <div class="btn btn-group">
                    <a href="<?php echo base_url('landregistration/landregistrationadd') ?>" class="btn btn-sm btn-success"><i class="icon-doc-new"></i> Add New Record</a>
                    <a href="<?php echo base_url('Reports/generateMasterlist') ?>" class="btn btn-sm btn-info"><i class="icon-record"></i> Download Excel</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php /*if (ENVIRONMENT == 'development') { */?><!--
                    <pre>
                        <?php /*print_r($landRegList) */?>
                    </pre>
                --><?php /*} */?>
                <div class="widget">
                    <div class="widget-header transparent">
                        <h2><strong>Claim Folders list</strong></h2>
                        <div class="additional-btn">
                            <?php /*
                            <a href="#" class="hidden reload"><i class="icon-ccw-1"></i></a>
                            <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                            */ ?>
                            <a href="#" class="widget-toggle"><i class="icon-down-open-2"></i></a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table id="grid-data" class="table table-hover table-striped" data-toggle="bootgrid" data-ajax="true" data-url="/users/server">
                                <thead>
                                <tr>
                                    <th data-column-id="##" data-title="commands" data-formatter="linkedit"></th>
									<th data-column-id="date_recvd_dar">Date Recieved from DAR</th>
									<th data-column-id="claim_fld_no">CF's No.</th>
									<?php /* <th data-column-id="name_land_owner">Name of land owner</th> */ ?>
									<th data-column-id="no_fbs">No. of FBs</th>
                                    <th data-column-id="title_no">Title no</th>
									 <th data-column-id="area_acqrd">Area Acquired</th>
									<th data-column-id="area_aprvd">Area Approved</th>
									<th data-column-id="easement">Easement</th>
									 <th data-column-id="lot_no">Lot Number</th>
                                    <th data-column-id="land_use">Land use</th>
                                    <th data-column-id="land_class_name">Land classification</th>
                                    <th data-column-id="region_name">Region</th>
                                    <th data-column-id="prov_name">Province</th>
                                    <th data-column-id="muni_city_name">City/Municipality</th>
                                    <th data-column-id="brgy_name">Barangay</th>
									 <th data-column-id="land_val_total_land_value">Total Land Value (Land Valuation)</th>
									 <th data-column-id="land_val_cash">Cash (Land Valuation)</th>
									 <th data-column-id="land_val_bond">Bond (Land Valuation)</th>
									 <th data-column-id="pending_division">CF's Pending Division</th>
									 <th data-column-id="date_mov_cvpf">Date of MOV/CVPF</th>
									 <th data-column-id="date_cod">Date of COD</th>
									 <th data-column-id="date_last_ammended">Date Last Amended</th>
									 <th data-column-id="date_returned">Date Ret. to DAR</th>
									 <th data-column-id="bond_serial_no">Bond Serial No.</th>
									 <th data-column-id="status2">Status/ Remarks</th>
									 <th data-column-id="less_rel_total">Total (Less: Releases)</th>
									  <th data-column-id="less_rel_cash">Cash (Less: Releases)</th>
									  <th data-column-id="less_rel_bond">Bond (Less: Releases)</th>
									  <th data-column-id="less_rel_bond_ao2">Bond AO2 (Less: Releases)</th>
									  <th data-column-id="end_bal_total">Total (Ending Balance)</th>
									  <th data-column-id="end_bal_cash">Cash (Ending Blanace)</th>
									  <th data-column-id="end_bal_bond">Bond (Ending Blanace)</th>
									  <th data-column-id="Processor_name">Processor's Name</th>
									   <th data-column-id="date_created">Date Created</th>
									   <th data-column-id="date_modified">Date Modified</th>
									   <th data-column-id="modified_by">Modified by</th>
									   <th data-column-id="status_name">Claim Folder STATUS</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn btn-group">
                    <a href="<?php echo base_url('landregistration/landregistrationadd') ?>" class="btn btn-sm btn-success"><i class="icon-doc-new"></i> Add New Record</a>
                    <a href="<?php echo base_url('Reports/generateMasterlist') ?>" class="btn btn-sm btn-info"><i class="icon-record"></i> Download Excel</a>
                </div>
            </div>
        </div>

        <script>
            gridSettings =
            {
                ajax: true,
                caseSensitive: false,
                rowCount: [5, 50, 100],
                rowSelect: true,
                selection: false,
                sorting: true,
                url: "<?php echo base_url('landregistration/renderLandRegistration/' . $user_region); ?>",
                requestHandler: function (request) {
                    return request;
                },
                formatters: {
                    "linkedit" : function(column, row) {
                        //return "<a class='btn btn-outline-info btn-sm' href='#'><span> EDIT </span></a>";
                        return "<a class='btn btn-info btn-sm' href='<?php echo base_url('landregistration/landregistrationedit/'); ?>/" + row.land_reg_id + "'><span> EDIT </span></a>";
                    }
                    // "linksub" : function(column, row) {
                    // return "<a class='btn btn-outline-success btn-sm' href='<?php echo base_url(''); ?>/" + row.allotment_class_id + "'><span> PRODUCTION PLAN </span></a>";
                    // }
                }
            };

            $("#grid-data").bootgrid(gridSettings);
        </script>