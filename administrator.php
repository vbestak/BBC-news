<?php session_start() ?>

<!DOCTYPE html>
<html>
  <head>
    <?php include "head.html"; ?>
  </head>

  <body>
    <?php include "header.html" ?>

    <div class="container clearfix" id="main-container">
      <?php

      include "connect.php";

      if(isset($_POST["prijava"])){
        echo"sad";
        $stmt = $dbc->prepare("SELECT username, password,razina FROM users WHERE username = ?");
        $stmt->bind_param("s", $_POST["username"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($username, $password, $razina );
        $stmt->fetch();

        if(password_verify($_POST["password"], $password) && $stmt->num_rows() > 0 ){
            $_SESSION["username"] = $username;
            $_SESSION["razina"] = $razina;
        }else {
          echo "<p> Jeste li se <a href='registracija.php'> registrirali </a> </p>";
        }
      }

      if(isset($_SESSION["razina"]) && $_SESSION["razina"] == 1){


      $query = "SELECT * FROM vijesti"; $result = mysqli_query($dbc, $query);
       while($row = mysqli_fetch_array($result)) {
          echo '<form class="admin-tab-form" enctype="multipart/form-data" action="" method="POST">
            <div class="form-item">
              <label for="title">Naslov</label>
                <div class="form-field">
                  <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                </div>
            </div>

            <div class="form-item">
              <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                 <div class="form-field">
                    <textarea name="about" id="" cols="30" rows="5" class="formfield-textual">'.$row['sazetak'].'</textarea>
                  </div>
            </div>

            <div class="form-item">
              <label for="content">Sadržaj vijesti:</label>
              <div class="form-field">
                <textarea name="content" id="" cols="30" rows="14" class="formfield-textual">'.$row['clanak'].'</textarea>
              </div>
            </div>

            <div class="form-item">
              <label for="pphoto">Slika:</label>
                <br><img src="'  . $row['slika'] . '">
                 <div class="form-field">
                   <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/>
                  </div>
            </div>

            <div class="form-item">
               <label for="category">Kategorija vijesti:</label>
                  <div class="form-field">
                    <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                      <option value="sport">Sport</option>
                      <option value="kultura">Kultura</option>
                    </select>
                  </div>
            </div>

            <div class="form-item">
              <label>Spremiti u arhivu:
                <div class="form-field">';

                  if($row['arhiva'] == 0){
                    echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?';
                  } else {
                    echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?';

                    }

             echo '</div>                 </label>             </div>

              <div class="form-item">
                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                  <button type="reset" value="Poništi">Poništi</button>
                    <button type="submit" name="update" value="Prihvati"> Izmjeni</button>
                      <button type="submit" name="delete" value="Izbriši"> Izbriši</button>
              </div>
          </form>';
      }

    } else if(isset($_SESSION["razina"]) && $_SESSION["razina"] ==  0) {
      echo "<img src='nedovoljnaRazina.png'>";
    }else{
      echo '
      <section  role="login">
        <form  enctype="multipart/form-data"  action=""  method="POST">

          <div  class="form-item">
            <span  id="porukaUsername"  class="bojaPoruke"></span>
            <label  for="content">Korisničko  ime:</label>

            <div  class="form-field">
              <input  type="text"  name="username"  id="username"  class="form-field-textual" autocomplete="off">
            </div>
          </div>

          <div  class="form-item">
            <span  id="porukaPass"  class="bojaPoruke"></span>
            <label  for="pphoto">Lozinka:  </label>
            <div  class="form-field">
              <input  type="password"  name="password"  id="password"  class="form-field-textual" autocomplete="off">
            </div>
          </div>

          <div class="form-item">
           <button type="submit" name="prijava" value="prijava" id="slanje">Prijava</button>
          </div>

        </form>
      </section> ';
    }

      if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query = "DELETE FROM vijesti WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
      }

      if(isset($_POST['update'])){

        function generateRandomString($length = 10) {
          return substr(
                  str_shuffle(
                    str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
                      , ceil($length/strlen($x)) )),1,$length);
        }


        $id=$_POST['id'];
        $extension = pathinfo($_FILES['pphoto']['name'], PATHINFO_EXTENSION);
        $picture = generateRandomString() ."." . $extension;
        $title=$_POST['title'];
        $about=$_POST['about'];
        $content=$_POST['content'];
        $category=$_POST['category'];

        if(isset($_POST['archive'])){
         $archive=1;
        }else{
         $archive=0;
        }

        if($extension){
          $target_dir = 'imgs/'. $picture;
          move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

          $query = " UPDATE vijesti SET slika='$target_dir' WHERE id=$id ";
          mysqli_query($dbc, $query);
        }

        $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', clanak='$content', kategorija='$category', arhiva='$archive' WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
      }

      mysqli_close($dbc);
      ?>

    </div>

    <?php include "footer.html" ?>
  </body>
</html>
