<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Josef Friedrich Baldo.
 * Date: 13 Oct 2017
 * Time: 14:48
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
                                    <th>uid</th>
                                    <th>full_name</th>
                                    <th>username</th>
                                    <th>email</th>
                                    <th>activated</th>
                                    <th>access_level</th>
                                    <th>locked_status</th>
                                    <th>logged_in</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php foreach($userlist as $row): ?>
                                <tr>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="#" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a href="#" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                        </div>
                                    </td>
                                    <td><?php echo $row->uid ?></td>
                                    <td><strong><?php echo $row->full_name ?></strong></td>
                                    <td><?php echo $row->username ?></td>
                                    <td><?php echo $row->email ?></td>
                                    <td><?php echo $row->activated ?></td>
                                    <td><?php echo $row->access_level ?></td>
                                    <td><?php echo $row->locked_status ?></td>
                                    <td><?php echo $row->logged_in ?></td>
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