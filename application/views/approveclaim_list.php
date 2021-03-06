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
            <div class="col-md-4">
                <div class="btn btn-group">
                    <a href="<?php echo base_url('reports/approvedClaims') ?>" class="btn btn-sm btn-success"><i class="icon-download"></i> Download report</a>
                    <!-- <a href="<?php echo base_url('Reports/generateMasterlist') ?>" class="btn btn-sm btn-info"><i class="icon-record"></i> Download Excel</a> -->
                </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group"> <!-- Date Received from DAR -->
                        <label for="input-text" class="col-sm-2 control-label">Year</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="year" id="year">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div> <!-- ./Date Received from DAR -->
                    <div class="form-group"> <!-- Date Received from DAR -->
                        <label for="input-text" class="col-sm-2 control-label">Month</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="month" id="month">
                                <option value="">Please Select</option>
                            </select>
                        </div>
                    </div> <!-- ./Date Received from DAR -->
                    <button type="submit" class="btn btn-sm btn-success">Filter</button>
                </form>
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
                            <?php foreach($landclass as $landclassData){ ?>
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <td><?php echo $landclassData->land_class_code ?></td>
                                        <td>FB</td>
                                        <td>Area</td>
                                        <td>Amount</td>
                                        <td>Cash</td>
                                        <td>Bond</td>
                                    </tr>
                                    <?php foreach($apprv_claims as $claimsData) { ?>
                                        <tr>
                                            <td><?php echo $claimsData->status_name ?></td>
                                            <td><?php echo $claimsData->total_fbs ?></td>
                                            <td><?php echo $claimsData->AREA ?></td>
                                            <td><?php echo $claimsData->amount ?></td>
                                            <td><?php echo $claimsData->CASH ?></td>
                                            <td><?php echo $claimsData->BOND ?></td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn btn-group">
                    <a href="<?php echo base_url('reports/approvedClaims') ?>" class="btn btn-sm btn-success"><i class="icon-download"></i> Download report</a>
                    <!-- <a href="<?php echo base_url('Reports/generateMasterlist') ?>" class="btn btn-sm btn-info"><i class="icon-record"></i> Download Excel</a> -->
                </div>
            </div>
        </div>

        <script>

            $(document).ready(function(){

                var yearID = 'year';
                var monthID = 'month';
                var monthz = [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'
                ];

                $.ajax({
                    success: function(data) {
                        $('#' + yearID +'').html('');
                        $('#' + yearID +'').append( '<option value="">Please Select</option>' );
                        for (var i = 2018 ; i <= <?php echo date("Y") ?>;i++) {
                            $('#' + yearID +'').append( '<option value="'+ i +'">'+ i +'</option>' );
                        }
                    }
                });

                $.ajax({
                    success: function(data) {
                        $('#' + monthID +'').html('');
                        $('#' + monthID +'').append( '<option value="">Please Select</option>' );
                        for (var i = 0 ; i < monthz.length;i++) {
                            var ctr = i + 1;
                            $('#' + monthID +'').append( '<option value="'+ ctr +'">'+ monthz[i] +'</option>' );
                        }
                    }
                });

            });

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
