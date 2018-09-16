<!-- borrar cookies -->
<?php
if($_POST['borrar']){
setcookie("mail","",time()-1000,"/");
};

//echo "se borro la cookie";

header('location:index.php');
?>