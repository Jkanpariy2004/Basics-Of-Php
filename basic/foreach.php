<?php
  $data=array('c','c++','HTML','CSS','Javascript','php');
  $no=1;
  foreach($data as $tra){
  ?>
  <h3>[<?php echo $no++ ?>]<?php echo $tra; ?></h3>
    <?php
  }
?>