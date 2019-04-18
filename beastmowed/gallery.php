<?php

require_once __DIR__ . '/functions.php';

$photos = pdo_select( 'SELECT * FROM gallery ORDER BY orderGallery DESC' );
disconnect_pdo();

?>

<?php include("includes/a_config.php");?>

<!DOCTYPE html>
<html>
  <head>
      <?php include("includes/head-tag-contents.php");?>
      <meta charset="utf-8">
    <title>My Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./gallery.css" />

  </head>
  <body>
    <header>
        <?php include("includes/navigation.php");?>
    </header>
    <main>

      <section class="gallery-links">
        <div class="wrapper">

          <section class="gallery-block compact-gallery">
            <div class="container">
                <div class="heading">
                    <h2>Gallery</h2>
                </div>
                <div class="row no-gutters">
                    <?php if ( $photos ) : ?>
                      <?php foreach ($photos as $row) : ?>
                        <div class="col-md-12 col-lg-6 item zoom-on-hover">
                            <a class="lightbox" href="./img/gallery/<?php echo escape($row['imgFullNameGallery']); ?>">
                                <img class="pr-2 pl-2 img-fluid image" src="./img/gallery/<?php echo escape($row['imgFullNameGallery']); ?>">
                                <span class="description">
                                    <span class="description-heading"><?php echo escape($row['titleGallery']); ?></span>
                                    <span class="description-body"><?php echo escape($row['descGallery']); ?></span>
                                </span>
                            </a>
                        </div>
                      <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>

          <?php
          if ( current_user() ) {
            echo '<div class="gallery-upload">
              <h2>Upload</h2>
              <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                <input type="text" name="filename" placeholder="File name...">
                <input type="text" name="filetitle" placeholder="Image title...">
                <input type="text" name="filedesc" placeholder="Image description...">
                <input type="file" name="file">
                <button type="submit" name="submit">UPLOAD</button>
              </form>
            </div>';
          }
          ?>

        </div>
      </section>

    </main>
