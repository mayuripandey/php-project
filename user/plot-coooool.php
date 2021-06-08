<?php
				 $id=$_GET['id'];
				 $sql=mysql_query("
				 SELECT `case`.casecode,`case`.status,`case`.plotid,opendate,closedate,`client`.fname as cfn,
					`client`.lname as cln,`employee`.fname as efn,`employee`.lname as eln,
					plot.plotcode,plottype.typename,plot.price,plot.location,plot.features,plot.kanal,plot.marla,
					plot.kewat,plot.mouza,plot.khatooni,plot.khasra,plot.entrydate
				 FROM `case`
				 Left JOIN plot on `case`.plotid=`plot`.plotid
				 LEFT JOIN plottype on plot.plottype=plottype.typeid
				 Left JOIN `client` on `case`.clientid=client.clientid
				 LEFT JOIN `employee` on `case`.employeeid=employee.empid
				 where `case`.caseid='$id'") or die(mysql_error());
				 ?>
<table>
<thead>
<th></th>
<th></th>
</thead>
<tbody>
<tr>
										<td>Plot Code</td>
										<td><?php echo $row['plotcode']; ?></td>
										</tr>
										<tr>
										<td>Plot Type</td>
										<td><?php echo ucfirst($row['typename']); ?></td>
										</tr>
										<tr>
										<td>Price</td>
										<td><?php echo $row['price']; ?></td>
										</tr>
										<tr>
										<td>Location</td>
										<td><?php echo $row['location']; ?></td>
										</tr>
										<tr>
										<td>Features</td>
										<td><?php echo $row['features']; ?></td>
										</tr>
										<tr>
										<td>Area: </td>
										<td><?php echo $row['kanal']." Kanal(s) and ".$row['marla']." Marlas"; ?></td>
										</tr>
										<td>Mouza: </td>
										<td><?php echo $row['mouza']; ?></td>
										</tr>
										<td>Khatooni: </td>
										<td><?php echo $row['khatooni']; ?></td>
										</tr>
										<td>Khasra: </td>
										<td><?php echo $row['khasra']; ?></td>
										</tr>
	</tbody>	
</table>	