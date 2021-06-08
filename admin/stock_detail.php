<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_report.php'); ?>
                <!--/span-->
				
				<div class="span9" style="margin-left: 0px">
					<?php include 'report_table.php'; ?>
				</div>				
				
			</div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
	<?php include ('user_validation_script.php'); ?>
    </body>

</html>