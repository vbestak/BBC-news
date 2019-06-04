<!DOCTYPE html>
<html>
  <head>
    <?php include "head.html"; ?>
  </head>

  <body>
    <?php include "header.html" ?>

    <div class="container clearfix" id="main-container">
      <?php include "connect.php";

      function generateRandomString($length = 10) {
        return substr(
                str_shuffle(
                  str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
                    , ceil($length/strlen($x)) )),1,$length);
      }

      $query = "SELECT * FROM vijesti"; $result = mysqli_query($dbc, $query);
       while($row = mysqli_fetch_array($result)) {
          echo '<form enctype="multipart/form-data" action="" method="POST">
            <div class="form-item">
              <label for="title">Naslov vjesti:</label>
                <div class="form-field">
                  <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                </div>
            </div>

            <div class="form-item">
              <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                 <div class="form-field">
                    <textarea name="about" id="" cols="30" rows="10" class="formfield-textual">'.$row['sazetak'].'</textarea>
                  </div>
            </div>

            <div class="form-item">
              <label for="content">Sadržaj vijesti:</label>
              <div class="form-field">
                <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['text'].'</textarea>
              </div>
            </div>

            <div class="form-item">
              <label for="pphoto">Slika:</label>
                 <div class="form-field">
                   <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="pphoto"/>
                    <br><img src="'  . $row['slika'] . '" width=100px> // pokraj gumba za odabir slike pojavljuje se umanjeni prikaz postojeće slike

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

      if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query = "DELETE FROM vijesti WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
      }

      if(isset($_POST['update'])){
        $extension = pathinfo($_FILES['pphoto']['name'], PATHINFO_EXTENSION);
        $picture = generateRandomString() . $extension;
        $title=$_POST['title'];
        $about=$_POST['about'];
        $content=$_POST['content'];
        $category=$_POST['category'];

        if(isset($_POST['archive'])){
         $archive=1;
        }else{
         $archive=0;
        }
        echo $_FILES['pphoto']['name'];

        $target_dir = 'imgs/'. $picture;

        move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);

        $id=$_POST['id'];
        $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', text='$content', slika='$target_dir', kategorija='$category', arhiva='$archive' WHERE id=$id ";
        $result = mysqli_query($dbc, $query);
      }
      ?>

    </div>

    <?php include "footer.html" ?>
  </body>
</html>
