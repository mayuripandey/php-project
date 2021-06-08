<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_client.php'); ?>
                <!--/span-->
				
				<div class="span6" style="margin-left: 0px">
					<?php include 'client_table.php'; ?>
				</div>				
				
				<div class="span3"  style="margin-left: 13px">
					<?php include 'add_client.php'; ?>
				</div>
			</div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>