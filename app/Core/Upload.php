<?php

class Upload
{
  public static function uploadImage($path)
  {
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // Default image
    if ($error === 4) {
      $fileName = 'default.jpg';
      return $fileName;
    }

    // Valid image
    $imageValid = ['jpg', 'jpeg', 'png'];
    $imageFormat = explode('.', $fileName);
    $imageFormat = strtolower(end($imageFormat));

    if (!in_array($imageFormat, $imageValid)) {
      Flasher::setFlash('Only <b>JPG, JPEG, and PNG</b> are allowed', 'danger');
      header('Location:' . BASEURL . $path);
      return false;
    } else if ($fileSize > 1024000) {
      Flasher::setFlash('Max uploaded file is <b>1024 Kilobytes</b>', 'danger');
      header('Location:' . BASEURL . $path);
      return false;
    } else {
      $newFileName = uniqid() . '' . $imageFormat;
      move_uploaded_file($tmpName, 'public/img/' . $newFileName);
      return $newFileName;
    }
  }
}
