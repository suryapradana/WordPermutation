<html>
  <body>
    <?php
      if(isset($_POST['input'])){
        include 'proses/input.php';
      }
      else{
        echo '<br><br>';
        echo "<input value='input' name='app' style='display:none'/>";
        echo '<form action="index.php?app=input" method="post">';
        echo '<label>Masukan Kata &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: </label><input type="text" name="kata" value="MATEMATIKA" required/>';
        echo '<br><br>';
        echo '<label style="margin-left:-105px;">Masukan Kata Himpit &nbsp &nbsp &nbsp: </label><input type="text" size="5" maxlength="1" name="katahimpit" value="T" required/>';
        echo '<br><br><br>';
        echo '<button type="submit" name="input"&nbsp &nbsp &nbsp>Cetak Hasil</button>';
      }
    ?>
  </body>
</html>
