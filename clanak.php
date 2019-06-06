<?php include "connect.php";

$query = "SELECT * FROM vijesti WHERE id= $_GET[id]";
$result = mysqli_query($dbc, $query);
$result = mysqli_fetch_array($result);

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
        <h2> <?php echo $result["kategorija"] ?> </h2>
      </div>
    </section>

    <article class="container clearfix" id="clanak">
      <h2> <?php echo $result["naslov"] ?> </h2>
      <img src="<?php echo $result["slika"] ?>" alt="slika"/>

      <h3> <?php echo $result["sazetak"] ?> </h3>
      <p> <?php echo $result["clanak"] ?> </p>
    </article>

    <?php include "footer.html" ?>
  </body>
</html>
