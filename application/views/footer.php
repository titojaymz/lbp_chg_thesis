
<!-- Footer Start -->
<footer>
	CarmeloHGriarte &copy; 2020
<!--	<div class="footer-links pull-right">-->
<!--		<a href="#">About</a><a href="#">Support</a><a href="#">Terms of Service</a><a href="#">Legal</a><a href="#">Help</a><a href="#">Contact Us</a>-->
<!--	</div>-->
</footer>
<!-- Footer End -->
</div>
<!-- ============================================================== -->
<!-- End content here -->
<!-- ============================================================== -->

</div>
<!-- End right content -->

</div>
<!-- the overlay modal element -->
<div class="md-overlay"></div>
<!-- End of eoverlay modal -->
<div id="contextMenu" class="dropdown clearfix">
	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu" style="display:block;position:static;margin-bottom:5px;">
		<li><a tabindex="-1" href="javascript:;" data-priority="high"><i class="fa fa-circle-o text-red-1"></i> High Priority</a></li>
		<li><a tabindex="-1" href="javascript:;" data-priority="medium"><i class="fa fa-circle-o text-orange-3"></i> Medium Priority</a></li>
		<li><a tabindex="-1" href="javascript:;" data-priority="low"><i class="fa fa-circle-o text-yellow-1"></i> Low Priority</a></li>
		<li><a tabindex="-1" href="javascript:;" data-priority="none"><i class="fa fa-circle-o text-lightblue-1"></i> None</a></li>
	</ul>
</div>
<!-- End of page -->

<script>
	var resizefunc = [];
</script>
<!-- HIGH CHARTS-->

<!--<script type="text/javascript" src="--><?php //echo base_url('assets/js/highcharts.js'); ?><!--"></script>-->
<!--<script type="text/javascript" src="--><?php //echo base_url('assets/js/modules/exporting.js'); ?><!--"></script>-->
<!--<script type="text/javascript" src="--><?php //echo base_url('assets/js/modules/export-csv.js'); ?><!--"></script>-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="--><?php //echo base_url('assets/jquery-1.12.2.min.js'); ?><!--"></script>-->

<!---->

<?php $access = $this->session->userdata('gset_access') ?>
<?php
if($access == 0){
?>
<script>
		$( function() {
			$( ".datepicker-input" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});

			var dateFormat = "yy-mm-dd",
					from = $( "#dateFrom" )
							.datepicker({
								dateFormat: 'yy-mm-dd',
								changeMonth: true,
								minDate: 3
							})
							.on( "change", function() {
								to.datepicker( "option", "minDate", getDate( this ) );
							}),
					to = $( "#dateTo" ).datepicker({
						dateFormat: 'yy-mm-dd',
						defaultDate: "+1w",
						changeMonth: true,
						minDate: 3
					});

			var dateFormats = "yy-mm-dd",
					checkIn = $( "#dateCheckIn" )
							.datepicker({
								dateFormat: 'yy-mm-dd',
								changeMonth: true,
								minDate: 3
							})
							.on( "change", function() {
								checkOut.datepicker( "option", "minDate", getDate( this ) );
							}),
					checkOut = $( "#dateCheckOut" ).datepicker({
						dateFormat: 'yy-mm-dd',
						defaultDate: "+1w",
						changeMonth: true,
						minDate: 3
					});

			function getDate( element ) {
				var date;
				try {
					date = $.datepicker.parseDate( dateFormat, element.value );
				} catch( error ) {
					date = null;
				}

				return date;
			}
		} );




	</script>

<?php
} else {
?>

	<script>
		$( function() {
			$(".datepicker-input").datepicker({
				dateFormat: 'yy-mm-dd'
			});
			$( "#dateTo" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});

			$( "#dateFrom" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});

			$( "#dateCheckIn" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});
			$( "#dateCheckOut" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});
		});
	</script>
<?php
}
?>
<script src="<?php echo base_url('assets/libs/jquery/jquery-1.11.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-detectmobile/detect.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-animate-numbers/jquery.animateNumbers.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/ios7-switch/ios7.switch.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/fastclick/fastclick.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-blockui/jquery.blockUI.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-bootbox/bootbox.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-sparkline/jquery-sparkline.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/nifty-modal/js/classie.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/nifty-modal/js/modalEffects.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/sortable/sortable.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-fileinput/bootstrap.file-input.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-select2/select2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/magnific-popup/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/pace/pace.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js'); ?>"></script>
<!--<script src="--><?php //echo base_url('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js'); ?><!--"></script>-->
<!--<script src="--><?php //echo base_url('assets/libs/jquery-icheck/icheck.min.js'); ?><!--"></script>-->

<!-- Demo Specific JS Libraries -->
<script src="<?php echo base_url('assets/libs/prettify/prettify.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-datatables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-datatables/js/dataTables.bootstrap.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-datatables/extensions/TableTools/js/dataTables.tableTools.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pages/datatables.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/init.js'); ?>"></script>
<!-- Page Specific JS Libraries -->
<script src="<?php echo base_url('assets/libs/d3/d3.v3.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/rickshaw/rickshaw.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/raphael/raphael-min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/morrischart/morris.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-knob/jquery.knob.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-jvectormap/js/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-jvectormap/js/jquery-jvectormap-us-aea-en.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-clock/clock.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-easypiechart/jquery.easypiechart.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/jquery-weather/jquery.simpleWeather-2.6.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-xeditable/js/bootstrap-editable.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-calendar/js/bic_calendar.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/apps/calculator.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/apps/todo.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/apps/notes.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pages/index.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-inputmask/inputmask.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/summernote/summernote.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pages/forms.js'); ?>"></script>
<script src="<?php echo base_url('assets/libs/bootstrap-validator/js/bootstrapValidator.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/pages/form-validation.js'); ?>"></script>


<script src="<?php echo base_url('assets/libs/prettify/prettify.js'); ?>"></script>

	<script src="<?php echo base_url('assets/libs/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/bootstrap-inputmask/inputmask.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/bootstrap-xeditable/js/bootstrap-editable.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/bootstrap-xeditable/demo/jquery.mockjax.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/bootstrap-xeditable/demo/demo-mock.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/bootstrap-select2/select2.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/jquery-clndr/moment-2.5.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/bootstrap-typeahead/bootstrap3-typeahead.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/ckeditor/ckeditor.js'); ?>"></script>
	<script src="<?php echo base_url('assets/libs/ckeditor/adapters/jquery.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/pages/advanced-forms.js'); ?>"></script>









</body>
</html>