<?php


class registration {
    
     private $link;
     public function __construct() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $db = 'ajax_email_check';

        $this->link = mysqli_connect($dbhost, $dbuser, $dbpass);

        if (!$this->link) {
            echo 'Database are not Connected ' . mysqli_error($this->link);
        } else {
            $select_db = mysqli_select_db($this->link, $db);
            if (!$select_db) {
                echo 'Database are not selected ' . mysqli_error($this->link);
            }
        }
    }// end of __construct class
  
    
    public function save_user_info($data) {
            // var_dump($data);
          $sql="INSERT into tbl_user(user_name,user_email,user_pass) VALUES('$data[name]','$data[email]','$data[password]')" ;
          if(mysqli_query($this->link, $sql)){
              $message="User Info Save Succesfully";
              return $message;
          }else{
               echo 'Insert Query problem ->' . mysqli_error($this->link);
            die();
          }
          
    }
    
         public function view_all_user_info() {
         $sql = "SELECT * FROM tbl_user ";

        if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
            return $run_query;
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }
    } 
    
       public function user_email_check($email) {
        //var_dump($email);
        
        $sql="SELECT * FROM tbl_user WHERE user_email='$email'";
                if (mysqli_query($this->link, $sql)) {
            $run_query = mysqli_query($this->link, $sql);
           
            return $run_query;
       
        } else {
            echo 'select Query problem ->' . mysqli_error($this->link);
            die();
        }       
     
    }//end of coustomer_email_check  
     
    
    
    
}////end registration class