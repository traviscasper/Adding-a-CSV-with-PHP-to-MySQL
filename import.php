<?php
if(!empty($_FILES["employee_file"]["name"])){
	 $connect = mysqli_connect('localhost', 'root', '', 'test');
	 $allowed_ext = array("csv");
	 $extension = end(explode(".",$_FILES["employee_file"]["name"]));
	 if(in_array($extension,$allowed_ext)){
	 	$file_data = fopen($_FILES["employee_file"]["tmp_name"],'r');
	 	fgetcsv($file_data);
	 	while($row = fgetcsv($file_data)){
	 		$Name=mysqli_real_escape_string($connect,$row[0]);
	 		$X=mysqli_real_escape_string($connect,$row[1]);
	 		$Y=mysqli_real_escape_string($connect,$row[2]);
	 		$Z=mysqli_real_escape_string($connect,$row[3]);
	 		$query = "INSERT INTO data (Name,X,Y,Z) VALUES ('$Name','$X','$Y','$Z') "
			;
	 		mysqli_query($connect,$query);
	 	}
	 }
}else{
	echo "Error";
}
?>
