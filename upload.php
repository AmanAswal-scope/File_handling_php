<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $targetDir = "C:\Users\Aman.Aswal\Desktop\php\proj2\stored_files\\"; // Specify the directory to store the uploaded file
  $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);

  // $_FILES["fileToUpload"]["name"] - This is an array element that represents the original name of the uploaded file. fileToUpload is the name of the file input field in the HTML form. name is the attribute of the $_FILES array that holds the original name of the uploaded file.

  // basename($_FILES["fileToUpload"]["name"]) - The basename() function extracts the file name from the provided path. In this case, it takes the original file name and returns just the name without any directory information or slashes.




  // Check if file already exists
  if (file_exists($targetFile))
   {
    echo "File already exists.";
  }

  else
  {
    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
      echo "File uploaded successfully.";
    }
     else
     {
      echo "Error uploading file.";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<style>
  .form-group {
    margin-right: 10px;
  }
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/custom.css">
</head>
<div class="form-box">
  <form action="upload.php" method="POST" enctype="multipart/form-data" class="form-inline">
    <div class="form-group">
      <input type="file" name="fileToUpload" class="form-control-file">
    </div>
    <div class="form-group">
      <input type="submit" value="Upload" class="btn btn-primary">
    </div>

    <!-- <div class="form-group">
    <a href="C:\Users\Aman.Aswal\Desktop\php\proj2\stored_files\download.jpg\\" download>Download File</a>
    <a href="stored_files/download.jpg" download>Download File</a>
 
  </div> -->



  <div class="form-group">
  <label for="fileToDownload">Select File to Download:</label>
  <input type="file" name="fileToDownload" id="fileToDownload" class="form-control-file">
  <button id="downloadButton" class="btn btn-primary">Download</button>
</div>
  </form>
</div>







<script>
  document.getElementById("downloadButton").addEventListener("click", function() {
    var fileInput = document.getElementById("fileToDownload");
    var selectedFile = fileInput.files[0];
    if (selectedFile) {
      var downloadLink = URL.createObjectURL(selectedFile);
      var fileName = selectedFile.name;
      var link = document.createElement("a");
      link.href = downloadLink;
      link.download = fileName;
      link.click();
      URL.revokeObjectURL(downloadLink);
    } else {
      alert("Please select a file to download.");
    }
  });
</script>

</body>
</html>