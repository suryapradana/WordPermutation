<?php
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$base_url .= rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']),'/');
?>
<html>
<?php
  include_once('template/header.php');
?>
  <body>
    <div class="container">
      <div class="menu"><center>
        <br>
        TUGAS KALKULUS 2
        <?php
          if(!empty($_GET['app'])){
            if($_GET['app']=='input'){
              echo "(Permutasi Kata)";
            }
          }
        ?>
        <br><br>
        <button><a href='index.php?app=input'>Proses Hitung</a></button>
        &nbsp &nbsp
        <button><a href='index.php?app=soal'>Contoh Soal</a></button>
      </center></div>

    </div>

    <div class="container">
      <div class="wrap"><center>
        <?php
          if(!empty($_GET['app'])){
            if($_GET['app']=='input'){
              include 'module/app-input.php';
            }
          }
          if(!empty($_GET['app'])){
            if($_GET['app']=='soal'){
              include 'template/contohsoal.php';
            }
          }
          ?>
      </center></div>
    </div>




  </body>
</html>
