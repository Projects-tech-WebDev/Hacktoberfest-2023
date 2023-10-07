<?php
include '_dbconnect.php';
?>
<?php
   if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username']; 
    $password=$_POST['SignUpPassword']; 
    $cpassword=$_POST['SignUpcPassword']; 
    if($password==$cpassword){
        $sql="Select *from user where username='$username'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==0){
            $hash=password_hash($password,PASSWORD_DEFAULT);
            $sql="INSERT INTO `user` (`id`, `username`, `password`, `time`) VALUES (NULL, '$username', '$hash', current_timestamp());";
            $result=mysqli_query($conn,$sql);
            if($result){
                header("location:../index.php?signup=true");
            }
        }
        else{
            $error="Username Already in use!!";
            header("location:../signup.php?error=$error");
        }
    }
    else{
        $error="Passwords do not match!!";
        header("location:../signup.php?error=$error");
    }
    
   }
?>