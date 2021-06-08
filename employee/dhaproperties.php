<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_dhaproperty.php'); ?>
                <!--/span-->
             
			<div class="span6" style="margin-left: 0px">
			     <?php include('dhaproperty_table.php'); ?>
			</div>
            <div class="span3" style="margin-left: 12px">
			     <?php include('add_dhaproperty.php'); ?>
			</div>
			</div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>