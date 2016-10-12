<!DOCTYPE html>
	<html>	
		<head>
			<style>
				body 
				{
					background-color: #E7CE7E;
					text-align: center;
				}
				p{					
					color: #000000;
					background-color:#E7877E;
					font-size: 300%;
					display: block;
					margin-top: 1em;
					margin-bottom: 1em;
					margin-left: 0;
					margin-right: 0;
					text-align: center;
				}
			
			</style>
		</head>
		
		
		<body>
		
			<?php
				if(isset($_POST['submit_pho']))
				{			
					$host = "database2.cs.tamu.edu";
					$username = "jiangbing";
					$password = "19891126jb";
					$dbname = "jiangbing-P1_image_gallary";
					$mysql = mysql_connect($host, $username, $password); 
					if(!$mysql)
					{
						die("Cannot connect: ".mysql_error());
					}
					mysql_select_db($dbname,$mysql);
					$sql = "INSERT INTO phogers (name,gender,phone,addr,city,state) VALUES('$_POST[phoger_name]','$_POST[phoger_gender]','$_POST[phoger_phone]','$_POST[phoger_addr]','$_POST[phoger_city]','$_POST[phoger_state]')";
					mysql_query($sql, $mysql) or die('Invalid query: ' . mysql_error());		
					mysql_close($mysql);
					?>					
					<p><b><font><?php echo "Add Photographer success! "; ?></font></b><br><p>
					<?php	
					
				}
				
				
				else if(isset($_POST['submit_log']))
				{
					$host = "database2.cs.tamu.edu";
					$username = "jiangbing";
					$password = "19891126jb";
					$dbname = "jiangbing-P1_image_gallary";
					$mysql = mysql_connect($host, $username, $password); 
					if(!$mysql)
					{
						die("Cannot connect: ".mysql_error());
					}
					mysql_select_db($dbname,$mysql);
					$sql = "INSERT INTO logs (date,loca,weather,iso,st_t,end_t,id_camera) VALUES('$_POST[logs_date]','$_POST[logs_loca]','$_POST[logs_weat]','$_POST[logs_iso]','$_POST[logs_st]','$_POST[logs_et]','$_POST[logs_cam]')";					
					mysql_query($sql, $mysql) or die('Invalid query: ' . mysql_error());
					mysql_close($mysql);
					?>					
					<p><b><font><?php echo "Add Log success! "; ?></font></b><br><p>
					<?php					
				}
				
				else if(isset($_POST['submit_cam']))
				{
					$host = "database2.cs.tamu.edu";
					$username = "jiangbing";
					$password = "19891126jb";
					$dbname = "jiangbing-P1_image_gallary";
					$mysql = mysql_connect($host, $username, $password); 
					if(!$mysql)
					{
						die("Cannot connect: ".mysql_error());
					}
					mysql_select_db($dbname,$mysql);
					$sql = "INSERT INTO cameras (brand,seris,price,comments,ext_front,ext_back,a_f_tech,color,comp_mount,iso_range,dimen,fil_fom,weight,model_y,vd_fom,vd_rsln) VALUES('$_POST[camera_brand]','$_POST[camera_seris]','$_POST[camera_price]','$_POST[camera_comments]','$_POST[camera_f]','$_POST[camera_b]','$_POST[camera_af]','$_POST[camera_color]','$_POST[camera_lenmt]','$_POST[camera_iso]','$_POST[camera_dimen]','$_POST[camera_fifom]','$_POST[camera_we]','$_POST[camera_year]','$_POST[camera_vdf]','$_POST[camera_vdrsln]')";					
					mysql_query($sql, $mysql) or die('Invalid query: ' . mysql_error());
					mysql_close($mysql);
					?>					
					<p><b><font><?php echo "Add Camera success! "; ?></font></b><br><p>
					<?php
				}
				
				else if(isset($_POST['submit_image']))
				{
					$host = "database2.cs.tamu.edu";
					$username = "jiangbing";
					$password = "19891126jb";
					$dbname = "jiangbing-P1_image_gallary";
					$mysql = mysql_connect($host, $username, $password); 
					if(!$mysql)
					{
						die("Cannot connect: ".mysql_error());
					}
					mysql_select_db($dbname,$mysql);
					$var1=$_POST['image_r_w'];
					$var2=$_POST['image_r_h'];
					$var3=$_POST['image_dpi'];
					$sizew=$var1/$var3;
					$sizeh=$var2/$var3;
					$add_url=$_POST['image_file'];
					$sql = "INSERT INTO images (size_w_in,size_h_in,rsln_w,rsln_h,dpi,ctgy,format,file,id_phoger,id_log) VALUES('$sizew','$sizeh','$_POST[image_r_w]','$_POST[image_r_h]','$_POST[image_dpi]','$_POST[image_ctgy]','$_POST[image_form]','$_POST[image_file]','$_POST[image_idphoger]','$_POST[image_idlog]')";					
					mysql_query($sql, $mysql) or die('Invalid query: ' . mysql_error());
					mysql_close($mysql);	
					?>					
					<p><b><font><?php echo "Add image success! ";?></font></b><br></p>					
					<?php
					echo "<p><img src=$add_url></p>";					
					?>					
					<?php	
				}	
				echo "<a href='../add_new.php'>Return to previous page</a>";
			?>
		</body>
	</html>