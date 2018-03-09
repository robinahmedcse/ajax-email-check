 <?php 
 session_start();
 include './class-file/registration.php.';
 $object_of_app=new registration();

 
 if(isset($_POST['btn'])){
     $message=$object_of_app ->save_user_info($_POST);
 }
 
 
 ?>


<html>
    <head>
        <style>
            *{
                margin: 0px;
                padding: 0px;
            }
            #one-block{
                float: left;
                width: 50%;
                height: 500px;
                background-color: burlywood;
            }
            #two-block{
                float: right;
                width: 50%;
                height: 500px;
                background-color: darkgray;
            }
        </style>
            
      <script>
  
    var xmlHttp=new XMLHttpRequest();
     function ajax_email_check(given_email,objectId){
        var sarverPage='ajax_email_check.php?email='+given_email; 
           xmlHttp.open('$_GET',sarverPage);
           
           xmlHttp.onreadystatechange = function(){
               if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
                  document.getElementById(objectId).innerHTML=xmlHttp.responseText;
                  
                  if(xmlHttp.responseText =="Email-Already-Registrated")
                  {
                      document.getElementById('XX').disabled=true;
                  }else{
                      document.getElementById('XX').disabled=false;
                  }  
             }
               
           }//onreadystatechange
        xmlHttp.send(null);
     }//end of function ajax_email_check

</script>
     
        </script>
    </head>
    <body>
        
         
          <div id="one-block">
             <table width="100%">
                <tr>
                    <td>
                        <?php if(isset($message)){ ?>
                        <h3><?php  echo $message; }?></h3>
                        <?php  unset($message); ?> 
                    </td>
                </tr>
        </table> 
             <form action="" method="POST" >                

                 <table width="75%" style="margin-top: 25%; margin-left:20%;">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" onblur="ajax_email_check(this.value,'res');" id="email">
                        <span id="res"></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td> </td>
                    <td><input type="submit" id='xx' name='btn' value="Submit"></td>
                </tr>
            </table> 


        </form>
        </div>
        
          <div id="two-block">
         <?php 
            $run_query=$object_of_app ->view_all_user_info();     
         ?> 
             <form action="" method="POST" >                

                 <table width="100%" border="1px">
                <tr>
                    <td>#</td>
                    <td>User Name</td>
                    <td>User Email</td>
                    <td>Password</td>
         
                </tr>
                <?php while ($all_user_info = mysqli_fetch_assoc($run_query)) { ?>
                 <tr>
                     <td><?php echo $all_user_info['user_id'];?></td>
                    <td><?php echo $all_user_info['user_name'];?></td>
                    <td><?php echo $all_user_info['user_email'];?></td>
                    <td><?php echo $all_user_info['user_pass'];?></td>
                  
                </tr>
                <?php } ?>
            </table> 


        </form>
        </div>
        
    </body>
</html>

