<form enctype="multipart/form-data" action="index.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="30000">
    Выберете файл для отправки: <input name="userfile" type="file"><br>
    <button type="submit" style="margin-top: 20px">Отправить файл</button>
</form>

<?php
    $uploadsDir = '/uploads_images';
    if ($_FILES['userfile']['error'] === 0) {
        if ($_FILES['userfile']['type'] != 'php' && ($_FILES['userfile']['type'] === 'jpeg' || $_FILES['userfile']['type'] === 'png' || $_FILES['userfile']['type'] === 'gif' || $_FILES['userfile']['type'] === 'jpg')) {
            $file = $_FILES['userfile']['tmp_name'];
            if (is_uploated_file($file)) {
                $infoAboutFile = pathinfo($_FILES['userfile']['name']);
            move_uploaded_file($file, $uploadsDir."/");
            };
        };
    };
    
    $scannedDirectory = scandir(__DIR__.$uploadsDir);

    var_dump($scannedDirectory);

    foreach ($scannedDirectory as $image) {
      if ($image === '.' || $image === '..') {
        continue;
      };
      if (substr($image, -4) === '.jpg' || substr($image, -5) === '.jpeg' || substr($image, -4) === '.png' || substr($image, -4) === '.gif') {
          echo "<img src='/uploads_images/$image'<br>";
      };
    };
?>


