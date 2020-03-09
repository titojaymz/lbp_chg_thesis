<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 12/9/2017
 * Time: 9:59 AM
 */
?>
<script>
    function validateConfirmPass()
    {
        var pass1 = document.getElementById("x_password").value;
        var pass2 = document.getElementById("x_passwordconfirm").value;
        if (pass1 != pass2)
        {
            alert("Please enter correct confirmation password!");
            return false;
        }
        else
        {
            return true;
        }
    }
</script>
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
    <div class="full-content-center animated fadeInDownBig">
        <h2 class="text-center"><img src="<?php echo base_url('images/logo_large.png') ?>"><br><a href="#" style="color:ghostwhite">Landowners Compensation Monitoring System<br>
                LandBank of the Philippines<br>
                Agrarian Operations Center</a></h2>
        <div class="login-wrap">
            <div class="login-block">
                <form role="form" method="post" name="x_register" id="x_register" > <?php // onsubmit="return validateConfirmPass()" ?>
                    <div class="form-group login-input">
                        <i class="fa fa-user overlay"></i>
                        <input type="text" class="form-control text-input" placeholder="Username" name="x_username" id="x_username" required>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-cogs overlay"></i>
                        <input type="text" class="form-control text-input" placeholder="First name" name="x_firstname" id="x_firstname" required>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-cogs overlay"></i>
                        <input type="text" class="form-control text-input" placeholder="Middle name" name="x_middlename" id="x_middlename" >
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-cogs overlay"></i>
                        <input type="text" class="form-control text-input" placeholder="Last name" name="x_lastname" id="x_lastname" required>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-cogs overlay"></i>
                        <input type="text" class="form-control text-input" placeholder="Extension name" name="x_extname" id="x_extname" >
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-key overlay"></i>
                        <input type="password" class="form-control text-input" placeholder="Password" name="x_password" id="x_password" required>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-key overlay"></i>
                        <input type="password" class="form-control text-input" placeholder="Retype password" name="x_passwordconfirm" id="x_passwordconfirm" required>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-cogs overlay"></i>
                        <input type="text" class="form-control text-input" placeholder="LBP ID No." name="x_lbp_no" id="x_lbp_no" required>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-cogs overlay"></i>
                        <select class="form-control" name="x_region_id" id="x_region_id" required>
                            <option value="">Select region</option>
                            <?php foreach($psgc_region as $region_data){ ?>
                                <option value="<?php echo $region_data->region_id ?>"><?php echo $region_data->region_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-cogs overlay"></i>
                        <select class="form-control" name="x_position" id="x_position" required>
                            <option value="">Select position</option>
                            <?php foreach($positions as $positiondata){ ?>
                                <option value="<?php echo $positiondata->position_id ?>"><?php echo $positiondata->position_name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group login-input">
                        <i class="fa fa-envelope overlay"></i>
                        <input type="email" class="form-control text-input" placeholder="E-mail" name="x_email" id="x_email" required>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success btn-block">Register</button>
                            <a class="btn btn-danger btn-block" href="<?php echo base_url('user/index') ?>">Back to login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>