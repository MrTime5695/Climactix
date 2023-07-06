<?php

  //header("content-type: image/png");


//  $Image = imagecreate(640, 480);
  $Image = imagecreatefrompng("mall.png");
  $Black = imagecolorallocate($Image, 0, 0, 0);
  $Size  = 12;


  imagettftext($Image, $Size, 21, 10, 10, $Black, "DejaVuSans", "popiPOP");

  header("content-type: image/png");

  imagepng($Image);
//  imagedestroy($Image);

//phpinfo();
?>


