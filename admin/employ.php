<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_employ.php'); ?>
                <!--/span-->
				
				<div class="span6" style="margin-left: 0px">
					<?php include 'emp_table.php'; ?>
				</div>				
				
				<div class="span3"  style="margin-left: 13px">
					<?php include 'add_emp.php'; ?>
				</div>
			</div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
	<?php include ('user_validation_script.php'); ?>
    </body>

</html>