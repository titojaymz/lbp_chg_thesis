<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 24/02/2018
 * Time: 5:37 PM
 */
?>
<div class="content-page">
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard/index'); ?>"><i class="glyphicon glyphicon-home"></i></a></li>
        <li>Status</li>
    </ul>
    <div class="content">
        <div class="page-heading">
            <h1><i class='icon-flow-tree'></i>User list</h1>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="btn btn-group">
                    <a href="<?php echo base_url('user/adduser') ?>" class="btn btn-sm btn-success"><i class="icon-user-add"></i> Add user</a>
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
                        <h2><strong>User list</strong></h2>
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
                            <table data-sortable class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>land_reg_id</th>
                                    <th>date_recvd_dar</th>
                                    <th>claim_fld_no</th>
                                    <th>name_land_owner</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach($landRegList as $row): ?>
                                    <tr>
                                        <td>
                                            <div class="btn btn-group">
                                                <a href="#" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                            </div>
                                        </td>
                                        <td><?php echo $row->land_reg_id ?></td>
                                        <td><?php echo $row->date_recvd_dar ?></td>
                                        <td><?php echo $row->claim_fld_no ?></td>
                                        <td><?php echo $row->name_land_owner ?></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn btn-group">
                    <a href="<?php echo base_url('user/adduser') ?>" class="btn btn-sm btn-success"><i class="icon-user-add"></i> Add user</a>
                </div>
            </div>
        </div>