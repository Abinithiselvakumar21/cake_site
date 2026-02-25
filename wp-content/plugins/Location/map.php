<?php
/*
Plugin Name: Map Location
Description: Map Location wordpress functionality
Author: Map Location
Version: 0.1
*/


add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
    add_menu_page( 'Map Location Page', 'Map Location', 'manage_options', 'map-location', 'map_init' );
}
 
function map_init()
{
	if(isset($_GET['del']))
	{
		$con = mysqli_connect("localhost","adminbc","*&*jgNJH&687hi&Y","client_bc");
		$id=$_GET['del'];
		$sql = "DELETE FROM location WHERE id=$id";
		mysqli_query($con,$sql);
		$mess='Record Deleted Successfully';
	}
	if(isset($_GET['edit']))
	{
		$con = mysqli_connect("localhost","adminbc","*&*jgNJH&687hi&Y","client_bc");
		
		if(isset($_POST['id']))
		{
			@extract($_POST);
			$id=$_POST['id'];
			
			 $sql = "UPDATE `location` SET `id`='$id',`name`='$name',`address1`='$address1',`address2`='$address2',`number`='$number',`email`='$email',`bcc`='$bcc',`latitude`='$latitude',`longitude`='$longitude',`links`='$links',`fax`='$fax' WHERE `location`.`id` = $id;;";
			
			mysqli_query($con,$sql);
			echo "<script>window.location='';</script>" ;
		}
	
		$id=$_GET['edit'];
		$result = mysqli_query($con,"SELECT * from  location WHERE id='$id'");
		$row = mysqli_fetch_row($result);
		echo "<h1>Edit Map Locations!</h1>";?>
		<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .form-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="email"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <form action="" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value='<?php echo $row[1]; ?>' 
		required>
		<input type="hidden" id="id" name="id" value='<?php echo $row[0]; ?>' 
		>
      </div>

      <div class="form-group">
        <label for="address1">Address 1:</label>
        <input type="text" id="address1" name="address1" value='<?php echo $row[2]; ?>' required>
      </div>

      <div class="form-group">
        <label for="address2">Address 2:</label>
        <input type="text" id="address2" name="address2" value='<?php echo $row[3]; ?>'>
      </div>

	  <div class="form-group">
        <label for="Number">Number:</label>
        <input type="text" id="number" name="number" value='<?php echo $row[4]; ?>' required>
      </div>
	  <div class="form-group">
        <label for="fax">Fax</label>
        <input type="text" id="fax" name="fax" value='<?php echo $row[10]; ?>' required>
      </div>
  
	  
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value='<?php echo $row[5]; ?>' required>
      </div>
	  
	  <div class="form-group">
        <label for="bcc">BCC:</label>
        <input type="text" id="bcc" name="bcc" value='<?php echo $row[6]; ?>' required>
      </div>

      <div class="form-group">
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" value='<?php echo $row[7]; ?>' required>
      </div>

      <div class="form-group">
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" value='<?php echo $row[8]; ?>' required>
      </div>

      <div class="form-group">
        <label for="links">Link:</label>
        <input type="text" id="links" name="links" value='<?php echo $row[9]; ?>'>
      </div>

      <div class="form-group">
        <input type="submit" name='submit' value="Submit">
      </div>
    </form>
  </div>
</body>
</html>
		<?php
	}
	
	if(isset($_GET['add']))
	{
		@extract($_POST);
		if(isset($submit))
		{
			$conn = mysqli_connect("localhost","adminbc","*&*jgNJH&687hi&Y","client_bc");
			$sql ="INSERT INTO `location`(`name`, `address1`, `address2`, `number`, `email`,`bcc`, `latitude`, `longitude`, `links`,`fax`) VALUES ('$name','$address1','$address2','$number','$email','$bcc','$latitude','$longitude','$links','$fax')";
			mysqli_query($conn,$sql);
			echo "<script>window.location='';</script>" ;
		}
		echo "<h1>Add Map Location!</h1>";
		?>
		<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .form-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="email"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <form action="" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="address1">Address 1:</label>
        <input type="text" id="address1" name="address1" required>
      </div>

      <div class="form-group">
        <label for="address2">Address 2:</label>
        <input type="text" id="address2" name="address2">
      </div>

	  <div class="form-group">
        <label for="Number">Number:</label>
        <input type="text" id="number" name="number" required>
      </div>
	  <div class="form-group">
        <label for="fax">Fax</label>
        <input type="text" id="fax" name="fax"  required>
      </div>
  
	  
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
	  
	  <div class="form-group">
        <label for="bcc">BCC:</label>
        <input type="text" id="bcc" name="bcc" required>
      </div>

      <div class="form-group">
        <label for="latitude">Latitude:</label>
        <input type="text" id="latitude" name="latitude" required>
      </div>

      <div class="form-group">
        <label for="longitude">Longitude:</label>
        <input type="text" id="longitude" name="longitude" required>
      </div>

      <div class="form-group">
        <label for="links">Link:</label>
        <input type="text" id="links" name="links">
      </div>

      <div class="form-group">
        <input type="submit" name='submit' value="Submit">
      </div>
    </form>
  </div>
</body>
</html>

		<?php
	}
else if(!isset($_GET['edit']))
{	
		
		
		

    echo "<h1>Map Locations!</h1>";

 $i=1;
 $con = mysqli_connect("localhost","adminbc","*&*jgNJH&687hi&Y","client_bc");
 ?>
 <style>
 table{width: 80%;
    margin: 0 auto;
    margin-top: 50px;
    border: 2px solid #2271B1;}
 .appmapbut{background-color: #2271B1;
    color: #fff;
    padding: 10px 15px;
    font-size: 15px;}
	 .appmapbut:hover{background-color: #000;color: #fff;}
	 tr{height: 30px;font-size: 14px;}
	 tr:nth-child(even) {
  background-color: #E8F0FE;
}
a{font-weight:600;}
 </style>
 <div style='color:red;text-align:center;'><?php echo $mess; ?></div>
 <div style='margin: 50px 0px;'><a class='appmapbut' href=''>Add Location</a></div>
 <table>
 <!--<tr><td colspan='6' align='center'><font color='red'><?php //echo $mess; ?></font></td></tr>-->
 
<tr style='background-color:#2271B1;color:#fff;height: 25px;font-size: 16px;'>
										    <th>id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
											<th>Fax</th>
                                            <th>Email</th>
											<th>BCC</th>
                                            <th colspan='2'>Action</th>
											
                                            
                                        </tr>
                                    
                                    
       
	   <tbody>
	   
<?php

$sty='<style>
.threeboxheading{text-align: center;color: #0074b6;font-size: 25px;font-weight: 700;padding: 0px 0 15px;}
.threeboxadd{font-weight: 400;text-align: center;padding: 0px 0 15px;}
.threeboxphone{text-align: center;padding: 0px 0 15px;}
.threeboxemail{text-align: center;padding: 0px 0 15px;}
.threeboxphone a{color:#333;font-weight: 400;}
.threeboxemail a{color:#333;font-weight: 400;}
.backcolorinner{border-top-width: 1px !important;
    border-right-width: 1px !important;
    border-bottom-width: 1px !important;
    border-left-width: 1px !important;
    padding-top: 15px !important;
    padding-right: 15px !important;
    padding-bottom: 15px !important;
    padding-left: 15px !important;
    background-color: #e5fbe4 !important;
    border-left-color: #59c852 !important;
    border-left-style: solid !important;
    border-right-color: #59c852 !important;
    border-right-style: solid !important;
    border-top-color: #59c852 !important;
    border-top-style: solid !important;
    border-bottom-color: #59c852 !important;
    border-bottom-style: solid !important;
    border-radius: 1px !important;}
</style>';

$query="SELECT * from location";
$result = mysqli_query($con,$query);
 while($row=mysqli_fetch_array($result))
 {                           
           $sty.='<div class="wpb_column vc_column_container vc_col-sm-4 apress_col_id_421016856649fdd141419b hover_style_none responsive_block_default"><div class="layer vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  backcolorinner ">
		<div class="wpb_wrapper">
			<p class="threeboxheading">'.$row[1].'</p>
<p class="threeboxadd">'.$row[2].'<br>
'.$row[3].'</p>

<p class="threeboxphone">Office Number: <a href="'.$row[4].'">'.$row[4].'</a></p>
<p class="threeboxphone">Fax Number: <a href="'.$row[9].'">'.$row[10].'</a></p>
<p class="threeboxemail"><a href="mailto:'.$row[5].'">'.$row[5].'</a></p>
<p class="threeboxemail"><a href="mailto:'.$row[6].'">'.$row[6].'</a></p>
<ul style="list-style: none; text-align: center; padding: 0px;">
<li style="display: inline-block;"><a class="clickhere" href="'.$row[9].'&&D1">Click Here</a></li>
<li style="display: inline-block;"><a class="applynow" href="https://hometownfinllc.com/my-loan/&&D1&id='.$row[0].'">Apply Now</a> </li>


</ul>

		</div>
	</div>
</div></div></div>';
//echo $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 }

$myfile = fopen("../maplocation.txt", "w") or die("Unable to open file!");
fwrite($myfile, $sty);
fclose($myfile);	


   
 $query="SELECT * from location ORDER BY id DESC";
 $result = mysqli_query($con,$query);
 
 while($row=mysqli_fetch_array($result))
 {
        
         
         
echo"<tr>";

 echo"<td> ".$i."</td>";
 echo"<td> ".$row[1]."</td>";
 echo"<td> ".$row[2].", ".$row[3]."</td>";
 
 echo"<td> ".$row[4]."</td>";
  echo"<td> ".$row[10]."</td>";
   echo"<td> ".$row[5]."</td>"; 
   echo"<td> ".$row[6]."</td>"; 
 

 
echo"<td> <a href='https://hometownfinllc.com/wp-admin/admin.php?page=map-location&edit=".$row[0]."'>EDIT</a></td>";
echo"<td> <a href='https://hometownfinllc.com/wp-admin/admin.php?page=map-location&del=".$row[0]."'>DELETE</a></td>";
 
 
          echo"</tr>";
		  $i++;
 }	  
 
?> 
 </table>


 
 <?php
}
}

?> 
 
 
 
 
 
