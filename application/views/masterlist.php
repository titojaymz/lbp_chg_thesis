<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 11/08/2018
 * Time: 08:50
 */
?>
<div class="content-page">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('landregistration/index'); ?>"><i class="glyphicon glyphicon-home"></i></a></li>
        <li><strong>Claim Folders list</strong></li>
    </ul>
    <div class="content">
        <div class="page-heading">
            <h1><i class='icon-address-book-alt'></i>Land Registration</h1>
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
                                    <th data-column-id="title_no">Title no</th>
                                    <th data-column-id="name_land_owner">Name of land owner</th>
                                    <th data-column-id="no_fbs">No. of FBs</th>
                                    <th data-column-id="land_use">Land use</th>
                                    <th data-column-id="prov_name">Province</th>
                                    <th data-column-id="muni_city_name">City/Municipality</th>
                                    <th data-column-id="brgy_name">Barangay</th>
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
                </div>
            </div>
        </div>