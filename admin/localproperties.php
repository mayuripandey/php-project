<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_localproperty.php'); ?>
                <!--/span-->
				
				<div class="span6" style="margin-left: 0px">
					<?php include 'admin_cases.php'; ?>
				</div>				
			</div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script2.php'); ?>
    </body>

</html>