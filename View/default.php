<?php
include_once "header.php" ?>
 <section id="main-section">
 <?php
 if(isset($page)) {
 if($page == 'home')
 require("home.php");
 else
 require($page.".php");
 }
 ?>
 </section>
<?php include_once "footer.php" ?>