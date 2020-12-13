<!DOCTYPE html>
<html>
<body>
<button onclick="window.location.href='/Page/about.php'">About</button>
<form id="imagePreview" action="/Page/upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload" onchange="return fileValidation()" multiple>
  <input type="submit" value="Upload Image" name="submit">
</form>
<script>
  function fileValidation() { 
    let fileInput = document.getElementById("fileToUpload");
    let filePath = fileInput.value;
    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
      alert('Invalid file type');
      fileInput.value = '';
      return false;
    }
    else 
    {
      if (fileInput.files && fileInput.files[0]) { 
        let reader = new FileReader(); 
        reader.onload = function(e) { 
          document.getElementById( 
            'imagePreview').innerHTML = 
            '<img src="' + e.target.result 
            + '"/>';
        };
        reader.readAsDataURL(fileInput.files[0]); 
      }
    }
  }
</script>
</html>
</body>
</html>