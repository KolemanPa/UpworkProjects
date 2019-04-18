<?php

require_once __DIR__ . '/../functions.php';

if ( ! current_user() ) {
  # anonymous
  header("Location: ../gallery.php");
  exit();
}

if (isset($_POST['submit'])) {

  $newFileName = $_POST['filename'];
  if (empty($newFileName)) {
    $newFileName = "gallery";
  } else {
    $newFileName = strtolower(str_replace(" ", "-", $newFileName));
  }
  $imageTitle = $_POST['filetitle'];
  $imageDesc = $_POST['filedesc'];

  $file = $_FILES['file'];

  $fileName = $file["name"];
  $fileType = $file["type"];
  $fileTempName = $file["tmp_name"];
  $fileError = $file["error"];
  $fileSize = $file["size"];

  $fileExt = explode(".", $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array("jpg", "jpeg", "png");
  $allowed_types = array('image/png', 'image/jpg', 'image/jpeg');

  // you were checking the filename extension before
  // totally unsafe, as the user can set whatever extension they want in the filename
  // so I've made it work with mime content type against tmp file

  if ($file['tmp_name'] && in_array(mime_content_type($file['tmp_name']), $allowed_types)) {
    if ($fileError === 0) {
      if ($fileSize < 2000000) {
        // note: to be safe, set newFileName to a random string instead of user input
        // currently using regex to prevent LFI
        $newFileName = preg_replace( '/[^a-zA-Z0-9]/si', '_', $newFileName );

        $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
        $fileDestination = "./../img/gallery/" . $imageFullName;

        if (empty($imageTitle) || empty($imageDesc)) {
          header("Location: ../gallery.php?upload=empty");
          exit();
        } else {

          $rowCount = pdo_select_one( 'select count(*) as c from gallery' );
          $rowCount = (int) array_shift($rowCount);
          $setImageOrder = $rowCount + 1;
          $insert = pdo_insert(
            'INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?)',
            array( $imageTitle, $imageDesc, $imageFullName, $setImageOrder )
          );
          move_uploaded_file($fileTempName, $fileDestination);
          disconnect_pdo();
          header("Location: ../gallery.php?upload=success");
          exit;
        }
      } else {
        echo "File size is too big!";
        exit();
      }
    } else {
      echo "You had an error!";
      exit();
    }
  } else {
    echo "You need to upload a proper file type!";
    exit();
  }

}
