<!DOCTYPE html>
<head></head>

<body>

<form class="form1" name="form1" method="post">

  <?php
  include 'database.php';
  $i=0;
    while ($i<5) {
      echo '<input type="text" name="mark[]" />';
	  $i++;
    }
  ?>

  <input type="submit" name="correction" value="Submit" />
</form>


<?php

if (isset($_POST['correction'])) {
  $grade = 0;   
  $mark  = $_POST['mark'];
  
  $obj=new database();
  
  
  foreach ($mark as $key => $value) {
	  $res=$obj->addmenuItem(NULL,14,$value,45);
   // $grade += $value;
  }

  echo $grade;
}

?>


</body>

</html>