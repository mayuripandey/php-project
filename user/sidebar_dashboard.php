<div class="span3" id="sidebar">
<?php
$sql=mysql_query("select picture from client where clientcode='".$_SESSION['code']."';") or die(mysql_error());
$res=mysql_fetch_array($sql);
?>
					<img id="avatar" class="img-polaroid" src="../admin/<?php echo $res['picture']; ?>">
		<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
			<li class="active">
				<a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Properties</a>
			</li>
			<li class="">
				<a href="case.php"><i class="icon-chevron-right"></i><i class="icon-folder-open"></i>&nbsp;Case</a>
			</li>
			<li class="">
				<a href="user_message.php"><i class="icon-chevron-right"></i><i class="icon-envelope-alt"></i>&nbsp;Messages</a>
			</li>
		</ul>	
</div>