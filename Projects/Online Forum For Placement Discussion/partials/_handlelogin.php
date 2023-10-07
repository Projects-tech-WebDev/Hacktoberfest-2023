<?php
include '_dbconnect.php';
?>
<?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
     $username=$_POST['username'];
     $password=$_POST['password'];
     $sql="Select *from user where username='$username'";
     $result=mysqli_query($conn,$sql);
     $num=mysqli_num_rows($result);
     if($num==1){
        while($row=mysqli_fetch_assoc($result)){
        if(password_verify($password,$row['password']));
         $result=mysqli_query($conn,$sql);
         if($result){
            session_start();
            $_SESSION['loggin']=true;
            $_SESSION['username']=$username;
            header("location:../index.php?login=true");
         }
         else{
            $error="Invalid Credentials!!";
            header("location:../LoginPage.php?error=$error");
         }
        }
     }
     else{
         $error="Invalid Credentials!!";
         header("location:../LoginPage.php?error=$error");
     } 
    
   }




?>