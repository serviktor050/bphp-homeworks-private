<form enctype="multipart/form-data" action="index.php" method="POST">
    Выберете файл для отправки: <input name="userfile" type="file"><br>
    <button type="submit" style="margin-top: 20px">Отправить файл</button>
</form>

<?php
    $uploadsDir = '/uploads_images';
    if ($_FILES['userfile']['error'] === 0) {
        if (exif_imagetype($_FILES['userfile']['tmp_name']) != false) {
            $file = $_FILES['userfile']['tmp_name'];
            $fileName = $_FILES['userfile']['name'];
            move_uploaded_file($file, __DIR__."/uploads_images/$fileName");
        };
    };
    
    $scannedDirectory = scandir(__DIR__.$uploadsDir);

    foreach ($scannedDirectory as $image) {
      if ($image === '.' || $image === '..') {
        continue;
      };
      if (substr($image, -4) === '.jpg' || substr($image, -5) === '.jpeg' || substr($image, -4) === '.png' || substr($image, -4) === '.gif') {
          echo "<img src='/uploads_images/$image' style='width: 100px'><br>";
      };
    };
?>