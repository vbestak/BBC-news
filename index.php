<?php include "connect.php" ?>


<!DOCTYPE html>
<html>
  <head>
    <?php include "head.html" ?>
  </head>

  <body>
    <?php include "header.html" ?>

    <div class="container clearfix" id="main-container">
        <h1>
          <span>Welcome to BBC.com</span>  <?php echo date('l, j F'); ?>
        </h1>

        <div id="news-container" class="clearfix">

          <section id="news">
            <h2>News</h2>

            <?php
              $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='news' LIMIT 3";
              $result = mysqli_query($dbc, $query);

              while($row = mysqli_fetch_array($result)) {
                echo '<article class="singleArticle">';;
                echo "<img src=$row[slika]>" ;
                echo "<h3>";
                echo '<a href="clanak.php?id='.$row['id'].'">';
                echo $row['naslov'];
                echo '</a></h3>';
                echo "<p>$row[sazetak]</p>";
                echo '</article>';
              }
            ?>

          </section>

          <section id="sport">
            <h2>Sport</h2>

            <?php
              $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport' LIMIT 3";
              $result = mysqli_query($dbc, $query);
              mysqli_close($dbc);

              while($row = mysqli_fetch_array($result)) {
                echo '<article class="singleArticle">';;
                echo "<img src=$row[slika]>" ;
                echo "<h3>";
                echo '<a href="clanak.php?id='.$row['id'].'">';
                echo $row['naslov'];
                echo '</a></h3>';
                echo "<p>$row[sazetak]</p>";
                echo '</article>';
              }
            ?>
          </section>

        </div>
    </div>

    <?php include "footer.html" ?>
  </body>
</html>
