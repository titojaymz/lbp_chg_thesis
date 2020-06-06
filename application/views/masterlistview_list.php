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
        <li><strong><?php echo $page_title?></strong></li>
    </ul>
    <div class="content">
        <div class="page-heading">
            <h1><i class='icon-address-book-alt'></i><?php echo $page_title?></h1>
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
                    <a href="<?php echo base_url('reports/generatemasterlist') ?>" class="btn btn-sm btn-success"><i class="icon-download"></i> Download report</a>
                    <!-- <a href="<?php echo base_url('Reports/generateMasterlist') ?>" class="btn btn-sm btn-info"><i class="icon-record"></i> Download Excel</a> -->
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
                        <h2><strong><?php echo $page_title?></strong></h2>
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
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Claim folder no</th>
                                    <th>Land owner</th>
                                    <th>No of FBs</th>
                                    <th>Area per title</th>
                                    <th>Area acquired</th>
                                    <th>Title no</th>
                                    <th>Area approved</th>
                                    <th>Easement</th>
                                    <th>Lot no</th>
                                    <th>Land use</th>
                                    <th>Region</th>
                                    <th>Province</th>
                                    <th>Municipality/City</th>
                                    <th>Barangay</th>
                                    <th>Total land value</th>
                                    <th>Land value cash</th>
                                    <th>Land value bond</th>
                                    <th>Status</th>
                                    <th>Pending division</th>
                                    <th>Date MOV CVPF</th>
                                    <th>Date COD</th>
                                    <th>Date last ammended</th>
                                    <th>Date COD 2</th>
                                    <th>Date returned</th>
                                    <th>Bond serial no</th>
                                    <th>Status 2</th>
                                    <th>Rel Total</th>
                                    <th>Rel cash</th>
                                    <th>Rel bond</th>
                                    <th>Rel bond ao 2</th>
                                    <th>End bal total</th>
                                    <th>End bal cash</th>
                                    <th>End bal bond</th>
                                    <th>Land class</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <?php foreach($masterlist as $masterdata) { ?>
                                    <tr>
                                        <td><?php echo $masterdata['claim_fld_no'] ?></td>
                                        <td><?php echo $masterdata['land_owner_id'] ?></td>
                                        <td><?php echo $masterdata['no_fbs'] ?></td>
                                        <td><?php echo $masterdata['area_per_title'] ?></td>
                                        <td><?php echo $masterdata['area_acqrd'] ?></td>
                                        <td><?php echo $masterdata['title_no'] ?></td>
                                        <td><?php echo $masterdata['area_aprvd'] ?></td>
                                        <td><?php echo $masterdata['easementt'] ?></td>
                                        <td><?php echo $masterdata['lot_no'] ?></td>
                                        <td><?php echo $masterdata['land_use'] ?></td>
                                        <td><?php echo $masterdata['region_id'] ?></td>
                                        <td><?php echo $masterdata['prov_id'] ?></td>
                                        <td><?php echo $masterdata['muni_city_id'] ?></td>
                                        <td><?php echo $masterdata['brgy_id'] ?></td>
                                        <td><?php echo $masterdata['land_val_total_land_value'] ?></td>
                                        <td><?php echo $masterdata['land_val_cash'] ?></td>
                                        <td><?php echo $masterdata['land_val_bond'] ?></td>
                                        <td><?php echo $masterdata['status_id'] ?></td>
                                        <td><?php echo $masterdata['pending_division'] ?></td>
                                        <td><?php echo $masterdata['date_mov_cvpf'] ?></td>
                                        <td><?php echo $masterdata['date_cod'] ?></td>
                                        <td><?php echo $masterdata['date_last_ammended'] ?></td>
                                        <td><?php echo $masterdata['date_cod2'] ?></td>
                                        <td><?php echo $masterdata['date_returned'] ?></td>
                                        <td><?php echo $masterdata['bond_serial_no'] ?></td>
                                        <td><?php echo $masterdata['status2'] ?></td>
                                        <td><?php echo $masterdata['less_rel_total'] ?></td>
                                        <td><?php echo $masterdata['less_rel_cash'] ?></td>
                                        <td><?php echo $masterdata['less_rel_bond'] ?></td>
                                        <td><?php echo $masterdata['less_rel_bond_ao2'] ?></td>
                                        <td><?php echo $masterdata['end_bal_total'] ?></td>
                                        <td><?php echo $masterdata['end_bal_cash'] ?></td>
                                        <td><?php echo $masterdata['end_bal_bond'] ?></td>
                                        <td><?php echo $masterdata['land_class_id'] ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn btn-group">
                    <a href="<?php echo base_url('reports/generatemasterlist') ?>" class="btn btn-sm btn-success"><i class="icon-download"></i> Download report</a>
                    <!-- <a href="<?php echo base_url('Reports/generateMasterlist') ?>" class="btn btn-sm btn-info"><i class="icon-record"></i> Download Excel</a> -->
                </div>
            </div>
        </div>

        <script>
            gridSettings =
            {
                ajax: true,
                caseSensitive: false,
                rowCount: [5, 10, 100],
                rowSelect: true,
                selection: false,
                sorting: true,
                url: "<?php echo base_url('landclass/renderlandclasslist'); ?>",
                requestHandler: function (request) {
                    return request;
                },
                formatters: {
                    "linkedit" : function(column, row) {
                        //return "<a class='btn btn-outline-info btn-sm' href='#'><span> EDIT </span></a>";
                        return "<a class='btn btn-info btn-sm' href='<?php echo base_url('landclass/landclassedit/'); ?>/" + row.land_class_id + "'><span> EDIT </span></a>";
                    }
                    // "linksub" : function(column, row) {
                    // return "<a class='btn btn-outline-success btn-sm' href='<?php echo base_url(''); ?>/" + row.allotment_class_id + "'><span> PRODUCTION PLAN </span></a>";
                    // }
                }
            };

            $("#grid-data").bootgrid(gridSettings);
        </script>

        <?php foreach($landclass as $landclassData){ ?>
            <?php foreach($apprv_claims as $i => $claimsData) { ?>
                <script>
                    var ctx = document.getElementById('myChart<?php echo $landclassData->land_class_code ?><?php echo $i ?>');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [ 'Area/Title','Area Acqrd','Area Apprvd','Easement','No. of FBs','No. of CFs','Amount','Cash','Bond','Total (Less: Releases)','Cash(Less: Releases)','Bond(Less: Releases)','Bond AO2','Total (Ending Balance)','Cash(Ending Balance)','Bond(Ending Balance)'],
                            datasets: [{
                                label: '<?php echo $claimsData->status_name ?>',
                                data: ['<?php echo $claimsData->total_fbs ?>','<?php echo $claimsData->AREA ?>','<?php echo $claimsData->amount ?>','<?php echo $claimsData->CASH ?>','<?php echo $claimsData->BOND ?>'],
                                backgroundColor: [
                                    'rgba(101, 189, 183, 1)',
                                    'rgba(101, 160, 189, 1)',
                                    'rgba(101, 129, 189, 1)',
                                    'rgba(61, 168, 52, 1)',
                                    'rgba(79, 46, 107, 1)',
                                    'rgba(52, 83, 168, 1)',
                                    'rgba(168, 52, 52, 1)',
                                    'rgba(168, 123, 52, 1)',
                                    'rgba(71, 52, 168, 1)',
                                    'rgba(135, 52, 168, 1)',
                                    'rgba(168, 52, 121, 1)',
                                    'rgba(52, 129, 168, 1)',
                                    'rgba(168, 67, 52, 1)',
                                    'rgba(168, 52, 79, 1)',
                                    'rgba(168, 52, 168, 1)',
                                    'rgba(168, 158, 52, 1)'
                                ],
                                borderColor: [
                                    'rgba(101, 189, 183, 1)',
                                    'rgba(101, 160, 189, 1)',
                                    'rgba(101, 129, 189, 1)',
                                    'rgba(61, 168, 52, 1)',
                                    'rgba(79, 46, 107, 1)',
                                    'rgba(52, 83, 168, 1)',
                                    'rgba(168, 52, 52, 1)',
                                    'rgba(168, 123, 52, 1)',
                                    'rgba(71, 52, 168, 1)',
                                    'rgba(135, 52, 168, 1)',
                                    'rgba(168, 52, 121, 1)',
                                    'rgba(52, 129, 168, 1)',
                                    'rgba(168, 67, 52, 1)',
                                    'rgba(168, 52, 79, 1)',
                                    'rgba(168, 52, 168, 1)',
                                    'rgba(168, 158, 52, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                </script>
            <?php } ?>
        <?php } ?>
