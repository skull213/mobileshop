// <?php 
session_start();

session_unset($_SESSION["CustomerID"]);

header("Location:login.php");

 ?>