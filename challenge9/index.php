
<!DOCTYPE html>
<html>
<body>
<a href='/Page/about.php'>About</a>
<form id="imagePreview" action="/Page/upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload" onchange="return review()" multiple>
  <input type="submit" value="Upload Image" name="submit">
</form>
<script>
  function review() { 
    var reader = new FileReader(); 
    reader.onload = function(e) {
      console.log(e)
      document.getElementById( 'imagePreview').innerHTML = '<img src="' + e.target.result + '"/>'; 
    };
  }
</script>
</body>
</html>