<?php

//  extracting the name of the fle
$filename = $_FILES['file']['name'];

// path of where file is uploaded
$location = "Images/".$filename;

//  saving the uplaoded file to filesystem and echoing back the name of the file
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { 
  echo $filename; 
} else { 
  echo 'Failure'; 
}
?>