<?php

  function generateRandomString($length = 10) {
    return substr(
            str_shuffle(
              str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
                , ceil($length/strlen($x)) )),1,$length);
  }

  $nazivVijesti = $_POST['title'];
  $kratkiOpis = $_POST['about'];
  $sazetakVijesti = $_POST['content'];
  $kategorijaVijesti = $_POST['category'];
  $slikaVijesti = generateRandomString();
  $extension = pathinfo($_FILES['pphoto']['name'], PATHINFO_EXTENSION);
  $arhivirajVijest = $_POST['archive'];

  if($arhivirajVijest == on){
    $arhivirajVijest = 1;
  }else{$arhivirajVijest=0;}

  $target = 'imgs/' . $slikaVijesti . "." . $extension;
  move_uploaded_file($_FILES['pphoto']['tmp_name'], $target);

  include "connect.php";

  if($dbc){
    $stmt = $dbc->prepare("INSERT INTO vijesti(datum, naslov, sazetak, clanak, slika, kategorija, arhiva) VALUES (CURDATE(), ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param('sssssi',$nazivVijesti, $kratkiOpis, $sazetakVijesti, $target, $kategorijaVijesti, $arhivirajVijest);
    $stmt->execute();
    mysqli_close($dbc);
  }


 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <?php include "head.html" ?>
   </head>

   <body>
     <?php include "header.html" ?>
     <section id="news-section-header" class="clearfix">
       <div class="container">
         <h2> <?php echo $kategorijaVijesti; ?> </h2>
       </div>
     </section>

     <article class="container clearfix" id="clanak">
       <h2><?php echo $nazivVijesti ?></h2>
       <img src="<?php echo $target ?>" alt="slika"/>

       <h3><?php echo $kratkiOpis ?></h3>
       <p> <?php echo $sazetakVijesti ?> </p>
     </article>

     <?php include "footer.html" ?>
   </body>
 </html>
