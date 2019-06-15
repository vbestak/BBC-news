<?php session_start(); ?>


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

        <section  role="register">
          <form  enctype="multipart/form-data"  action=""  method="POST">

            <div class="form-item">
              <span  id="porukaIme"  class="bojaPoruke"></span>
                <label  for="title">Ime:  </label>
                <div  class="form-field">
                  <input  type="text"  name="ime"  id="ime"  class="form-field-textual" autocomplete="off">
                </div>
              </div>

            <div  class="form-item">
              <span  id="porukaPrezime"  class="bojaPoruke"></span>
              <label  for="about">Prezime:  </label>
              <div  class="form-field">
                <input  type="text"  name="prezime"  id="prezime"  class="form-field-textual" autocomplete="off">
              </div>
            </div>

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
              <span id="porukaPassRep" class="bojaPoruke"></span>
              <label for="pphoto">Ponovite lozinku: </label>
              <div class="form-field">
                <input type="password" name="passRep" id="passRep" class="form-field-textual" autocomplete="off">
              </div>
            </div>

            <div class="form-item">
             <button type="submit" value="Prijava" name="slanje" id="slanje">Registracija</button>
            </div>

          </form>
        </section>

        <?php
        if(isset($_POST["slanje"])){
         include "src/registracija.php";
        }
        ?>

    </div>

  <script type="text/javascript" src="src/registracija.js"></script>

   <?php include "footer.html" ?>
  </body>
</html>
