<!DOCTYPE html>
<html>
  <head>
    <?php include "head.html" ?>
  </head>

  <body>
    <?php include "header.html" ?>

    <div class="container">
      <form name="unosVijesti" action="skripta.php" method="post" enctype="multipart/form-data">
        <div class="form-item">
           <label for="title">Naslov vijesti</label>
           <div class="form-field">
            <input type="text" name="title" class="form-field-textual">
           </div>
           <span id="titlePoruka"></span>
        </div>

        <div class="form-item">
          <label for="about">Kratki sadržaj vijesti (do 50 znakova)</label>
            <div class="form-field">
              <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
            </div>
            <span id="aboutPoruka"></span>
          </div>

          <div class="form-item">
            <label for="content">Sadržaj vijesti</label>
            <div class="form-field">
              <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
            </div>
            <span id="contentPoruka"></span>
          </div>

          <div class="form-item">
            <label for="pphoto">Slika: </label>
            <div class="form-field">
              <input type="file" accept="image/jpg,image/gif" name="pphoto"/>
            </div>
            <span id="pphotoPoruka"></span>
          </div>

          <div class="form-item">
            <label for="category">Kategorija vijesti</label>
            <div class="form-field">
              <select name="category" id="" class="form-field-textual">
                <option value="SPORT">Sport</option>
                <option value="NEWS">News</option>
              </select>
            </div>
          </div>

          <div class="form-item">
            <label>Spremiti u arhivu:
              <div class="form-field">
                <input type="checkbox" value="true" name="archive"/>
              </div>
            </label>
          </div>

          <div class="form-item">
            <button type="submit" onclick="return checkForm()" value="Prihvati">Prihvati</button>
            <button type="reset" value="Poništi">Poništi</button>
          </div>

      </form>
    </div>

    <?php include "footer.html" ?>

    <script type="text/javascript" src="src/unos_forma_checker.js"></script>
  </body>
</html>
