<!DOCTYPE html>
<!--https://www.youtube.com/watch?v=Zr0ktM3fjaI&list=PL6627A6DA3C3A772E&index=38-->
	<html>
		<?php include("includes/head.html");?>
		<head>
			<style>
			
			table{
				table-layout: auto;
				background-color: #F9E79F;
				width: 100%;
				text-align: center;
			}
			h1
			{
				color: #F9E79F;
				background-color: #000000;
				text-align:left;
			}
				

			</style>
		</head>
		<body>
		<?php include("includes/header.html");?>
		<div class="row">
		<div class="twelve columns">
			<ul class="nav-bar">
				<li><a href="index.php">Home</a></li>
				<li><a href="add_new.php">Add photos</a></li>
				<li><a href="search.php">Search photos</a></li>
				<li class="active"><a href="javascript:;">View all the Photographers</a></li>
			</ul>
		</div>
		</div>
		
		
		
		<?php
			include("php/db_conn.php");		
			
			if(isset($_POST['update']))
			{
				//$upsql = "UPDATE phogers SET name='Doe' WHERE id_phoger=1";
				$UpdateQuery = "UPDATE phogers SET name = '$_POST[name]', gender = '$_POST[gen]', phone ='$_POST[phone]',addr = '$_POST[addr]', city = '$_POST[city]',state = '$_POST[state]' WHERE id_phoger = $_POST[hidden]";
				if (mysql_query($UpdateQuery, $mysql)) 
				{
					$message = "Success!";
					echo "<script type='text/javascript'>alert('$message');</script>";
				} else 
				{
					echo "Error updating record: " . mysql_error($conn);
				}
			}
			
			
			
			if(isset($_POST['delete']))
			{
				//$upsql = "UPDATE phogers SET name='Doe' WHERE id_phoger=1";
				$DeleteQuery = "Delete from phogers WHERE id_phoger = $_POST[hidden]";
				if (mysql_query($DeleteQuery, $mysql)) 
				{
					$message = "Success!";
					echo "<script type='text/javascript'>alert('$message');</script>";
				} else 
				{
					echo "Error updating record: " . mysql_error($conn);
				}
			}
			
			
			
			$sql = "SELECT * FROM phogers";
			$mydata = mysql_query($sql, $mysql);
			
			
			echo "<div class=\"row\"><h1>Photographer List</h1><table border = 1>
			<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			</tr>";
			While($record = mysql_fetch_array($mydata))
			{
				echo "<form action = select.php method = post>";
				echo "<tr>";
				//echo "<td>" ."<input type='text' name='phog' value ='". $record['id_phoger'] . "' </td>" ;
				echo "<td>" . $record['id_phoger'] . " </td>";
				echo "<td>" ."<input type='text' name='name' value ='".  $record['name'] . "' </td>";
				echo "<td>" ."<input type='text' name='gen' value ='".  $record['gender'] . "' </td>";
				echo "<td>" ."<input type='text' name='phone' value ='".  $record['phone'] . "' </td>";
				echo "<td>" ."<input type='text' name='addr' value ='".  $record['addr'] . "' </td>";
				echo "<td>" ."<input type='text' name='city' value ='".  $record['city'] . "' </td>";
				echo "<td>" ."<input type='text' name='state' value ='".  $record['state'] . "' </td>" ;
				
				echo "<td>"."<input type='hidden' name='hidden' value ='". $record['id_phoger'] . "' </td>" ;
				echo "<td>"."<input type='submit' name='update' value = 'update'" . " </td>" ;
				echo "<td>"."<input type='submit' name='delete' value = 'delete'" . " </td>" ;
				echo "</tr>";								
				echo "</form>";		
			}
			echo "</table></div>";
		
			
			mysql_close($mysql);
						
		?>
		</body>
		
	</html>