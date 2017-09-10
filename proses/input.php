<?php
error_reporting(0);

  $kata=strtoupper($kata2=$_POST['kata']);
  $kataHimpit=strtoupper($_POST['katahimpit']);

  function cekTotHuruf($kata){
    $bantu1=1;
    $jml_huruf = strlen($kata);
    while($jml_huruf>0){
      $bantu1=$bantu1*$jml_huruf;
      $jml_huruf--;
    }
    return $bantu1;
  }

  function hitung($kata){
    $split_kata=str_split($kata);
    $jml_huruf = strlen($kata);
    echo $jml_huruf. '!';
    echo '<div style="margin-left:-20px;">= &nbsp ----------------------</div>';
    $split_kata2=$split_kata;
    $jml=0; $j=0; $i=0; $y=0; $x=0; $temp=array(); $check=0;
    while($jml<=$jml_huruf){
      if($split_kata[$i]==$split_kata[$j]){
        $y=$y+1;
      }
      else if($jml==$jml_huruf){
        $split_kata=array_merge(array_diff($split_kata, array($split_kata[$i])));
        $i=0;
        $temp[$x]=$y;
        $x=$x+1;
        $jml=0;
        $j=-1;
        $y=0;
        $check=$check+1;
      }
      $j++;
      $jml++;
    }
    for($i=0;$i<$check;$i++){
      echo $temp[$i];echo '!';
      if($i<$check-1){echo '.';}
    }
    echo '<br>';
    $i=0; $bantu2=1;
    ulang:
    $bantu=$temp[$i];
    while($check>=$i){
      if($bantu>0){
        $bantu2=$bantu2*$bantu;
        $bantu--;
      }
      else{
        $i=$i+1;
        goto ulang;
      }
    }
    return $bantu2;
  }

  function checkHurufAwal($kata, $berhimpit){
    $split_kata=str_split($kata);
    $jml_huruf = strlen($kata);
    $i=0; $y=0;
    while($jml_huruf>$i){
      if($split_kata[$i]==$berhimpit){
        $y=$y+1;
      }
      $i++;
    }
    if($y>2){
      return 3;
    }
    else if($y==0){
      return 0;
    }
    else if($y==1){
      return 1;
    }
    else{
      return -1;
    }
  }

  function checkHuruf($kata, $berhimpit){
    $split_kata=str_split($kata);
    $jml_huruf = strlen($kata);
    $i=0; $y=0;
    while($jml_huruf>$i){
      if($split_kata[$i]==$berhimpit){
        $y=$y+1;
      }
      $i++;
    }
      $i=$jml_huruf;
      while($split_kata[$i]!=$berhimpit){
        $i=$i-1;
      }
      unset($split_kata[$i]);
      $join_kata=implode($split_kata);
      return $join_kata;
  }

  echo '<br>';
  echo '<p>Banyaknya cara menyusun huruf-huruf ';
  echo $kata;
  echo ' adalah : </P>';
  $jumHuruf = hitung($kata);
  echo '<br><br>';
  $totHuruf = cekTotHuruf($kata);
  echo $totHuruf;
  echo '<div style="margin-left:50px;">= &nbsp ---------------------- &nbsp => <b>'; echo $hasil=$totHuruf/$jumHuruf; echo '</b></div>';
  echo $jumHuruf;
  echo'<br>';
  $dihimpitAwal = checkHurufAwal($kata, $kataHimpit);
  if($dihimpitAwal==0){
    echo "huruf $berhimpit tidak ditemukan";
  }
  else if($dihimpitAwal>2){
    echo "huruf $berhimpit tidak boleh lebih dari 2";
  }
  else if($dihimpitAwal==1){
    echo "huruf $berhimpit hanya 1";
  }
  else if($dihimpitAwal==-1){
  echo '<p>Banyaknya cara menyusun huruf-huruf '; echo $kata; echo ' dengan syarat kedua '; echo $kataHimpit; echo ' berdekatan adalah sama dengan banyaknya cara menyusun huruf-huruf ';
  $dihimpitAwal = checkHurufAwal($kata, $kataHimpit);
  echo'<br>';
  $dihimpit = checkHuruf($kata, $kataHimpit);
  echo $dihimpit;
  echo', yaitu : </p>';
  $jumHuruf2 = hitung($dihimpit);
  $totHuruf2 = cekTotHuruf($dihimpit);
  echo '<br><br>';
  echo $totHuruf2;
  echo '<div style="margin-left:50px;">= &nbsp ---------------------- &nbsp => <b>'; echo $hasil2=$totHuruf2/$jumHuruf2; echo '</b></div>';
  echo $jumHuruf2;
  echo'<br>';
  $hasilTot=$hasil-$hasil2;
  echo '<p>Banyaknya cara menyusun huruf-huruf '; echo $kata; echo ' dengan kedua '; echo $kataHimpit; echo ' tidak berdekatan adalah = ';
  echo $hasil.' - '.$hasil2.' => <b>'.$hasilTot.'</b></p>';
}


?>
