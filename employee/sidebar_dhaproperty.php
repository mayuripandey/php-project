<div class="span3" id="sidebar">
<?php
$sql=mysql_query("select picture from employee where empcode='".$_SESSION['code']."';") or die(mysql_error());
$res=mysql_fetch_array($sql);
?>
					<img id="avatar" class="img-polaroid" src="../admin/<?php echo $res['picture']; ?>">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li >
				<a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Dashboard</a>
			</li>
			<li class="active">
				<a href="dhaproperties.php"><i class="icon-chevron-right"></i><i class="icon-folder-open"></i>&nbsp;DHA Properties</a>
			</li>
			<li class="">
				<a href="dhafile.php"><i class="icon-chevron-right"></i><i class="icon-folder-open"></i>&nbsp;DHA Files</a>
			</li>
		</ul>	
</div>