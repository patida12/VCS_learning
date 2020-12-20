<?php
$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {

  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $xml = $_FILES["fileToUpload"]["name"];
    echo "The file ". htmlspecialchars( basename( $xml)). " has been uploaded.";
    echo '<br><a href="/parseXML.php?file=' . $xml . '">Parse XML</a>' ;
    echo '<br><a href="/xxeparser_fixed.php?file=' . $xml . '">Parse XML (fixed)</a>' ;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>