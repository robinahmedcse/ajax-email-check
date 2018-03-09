<?php
$email=$_GET['email'];
//echo $email;
include './class-file/registration.php';
$object_apllication= new registration();

$run_query=$object_apllication ->user_email_check($email);

 $user_info = mysqli_fetch_assoc($run_query);
  // var_dump($user_info);
  ?>
 <html>
     <body>
         <?php   if($user_info){  ?>
         <b><?php  echo"Email-Already-Registrated";?></b>
         <?php  }else{  ?>
          <><?php echo"Email Available"; ?></b>
         <?php }?>
     </body>
 </html>