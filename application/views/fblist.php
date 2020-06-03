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
        <li><strong>Farmer beneficiary list</strong></li>
    </ul>
    <div class="content">
        <div class="page-heading">
            <h1><i class='icon-address-book-alt'></i>Farmer beneficairies</h1>
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
                    <a href="<?php echo base_url('fbs/fbadd/' . $id) ?>" class="btn btn-sm btn-success"><i class="icon-doc-new"></i> Add New Record</a>
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
									<th data-column-id="fullname">Name</th>
                                    <th data-column-id="region">region</th>
                                    <th data-column-id="province">province</th>
                                    <th data-column-id="city">city</th>
                                    <th data-column-id="brgy">brgy</th>
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
                    <a href="<?php echo base_url('fbs/fbadd/' . $id) ?>" class="btn btn-sm btn-success"><i class="icon-doc-new"></i> Add New Record</a>
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
                url: "<?php echo base_url('fbs/renderfbs/' . $id); ?>",
                requestHandler: function (request) {
                    return request;
                },
                formatters: {
                    "linkedit" : function(column, row) {
                        //return "<a class='btn btn-outline-info btn-sm' href='#'><span> EDIT </span></a>";
                        return "<a class='btn btn-info btn-sm' href='<?php echo base_url('fbs/fbedit/'); ?>/" + row.fb_id + "/" + row.land_reg_id + "'><span> EDIT </span></a>";
                    }
                    // "linksub" : function(column, row) {
                    // return "<a class='btn btn-outline-success btn-sm' href='<?php echo base_url(''); ?>/" + row.allotment_class_id + "'><span> PRODUCTION PLAN </span></a>";
                    // }
                }
            };

            $("#grid-data").bootgrid(gridSettings);
        </script>