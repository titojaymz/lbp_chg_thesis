<?php
if (!$this->session->userdata('user_data'))
{
/*if (isset($username) && isset($password))
{
    $array = array(
        $username,
        $password
    );

    echo '<pre>';
    print_r($userData['count']);
    echo '</pre>';
}*/
?>
<!-- Begin page -->
<?php echo validation_errors() ?>
    <?php if($system_message <> ''){  ?>
    <div class="col-md-3"></div>
    <div class="col-md-6 portlets ui-sortable">
        <div class="widget">
            <div class="widget-header ">
                <h2>Alert</h2>
                <div class="additional-btn">
                    <a href="#" class="widget-close"><i class="icon-cancel-3"></i></a>
                </div>
            </div>
            <div class="widget-content padding">
                <div class="alert alert-success">
                    <?php echo $system_message ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
<?php } ?>
<div class="container">
    <div class="full-content-center">
        <h2 class="text-center"><img src="<?php echo base_url('images/logo_large.png') ?>"><br><a href="#" style="color:ghostwhite">Landowners Compensation Monitoring System<br>
                LandBank of the Philippines<br>
                Agrarian Operations Center</a></h2>
        <div class="login-wrap animated flipInX">
            <div class="login-block">
                <form role="form" method="post">
                    <div class="form-group login-input">
                        <i class="fa fa-user overlay"></i>
                        <input type="text" class="form-control text-input" placeholder="Username" name="username" id="username">
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-key overlay"></i>
                        <input type="password" class="form-control text-input" placeholder="********" name="password" id="password">
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo base_url('user/register') ?>" class="btn btn-default btn-block">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php } else { ?>
    <?php redirect('public_access','location') ?>
<?php } ?>