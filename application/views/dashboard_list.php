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
                    <!--<a href="<?php echo base_url('landclass/landclassnadd') ?>" class="btn btn-sm btn-success"><i class="icon-doc-new"></i> Add New Record</a>
                     <a href="<?php echo base_url('Reports/generateMasterlist') ?>" class="btn btn-sm btn-info"><i class="icon-record"></i> Download Excel</a> -->
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
                            <?php foreach($landclass as $landclassData){ ?>
                                <h2><strong>Approved claims - <?php echo $landclassData->land_class_code ?></strong></h2>
                                <?php foreach($apprv_claims as $i => $claimsData) { ?>
                                    <div class="table-responsive chart-container">
                                        <canvas id="myChart<?php echo $landclassData->land_class_code ?><?php echo $i ?>"></canvas>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn btn-group">
                    <!--<a href="<?php echo base_url('landclass/landclassnadd') ?>" class="btn btn-sm btn-success"><i class="icon-doc-new"></i> Add New Record</a>
                    <a href="<?php echo base_url('Reports/generateMasterlist') ?>" class="btn btn-sm btn-info"><i class="icon-record"></i> Download Excel</a> -->
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
                            labels: ['FB','Area','Amount','Cash','Bond'],
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
