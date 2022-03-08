<?php

include('connect.php');
if(isset($_COOKIE["type"]))
{
    header("Location:home.php");
}else {
    header("Location:index.php");}
$uname=$_POST['uname'];
$password=$_POST['password'];
$role=$_POST['role'];
$message='';



$sql="SELECT * FROM `user` WHERE uname='$uname' and password='$password' and role='$role'";
$result=mysqli_query($conn,$sql);
$count=$result->num_rows;
if($count>0)
{
    session_start();
    if($role=='voter')
    {
        $sql="SELECT uname,photo,id from `user` where 'role'='voter'";
        $resultgroup=mysqli_query($conn,$sql);
        if(mysqli_num_rows($resultgroup)>0)
        {
            $voters=mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
            $_SESSION['role']=$voters;
        }
        $data=mysqli_fetch_array($result);
        $_SESSION['id']=$data['id'];
        $_SESSION['data']=$data;
        
        $rrr=mysqli_fetch_all($result);
        foreach($rrr as $row):
            setcookie("type",$row["user_type"],time()+3600);
        endforeach;
        
        
        header("Location: home.php");

        
    } 
        
    
    else
    {
    $sql="SELECT uname,photo,id from `user` where 'role'='admin'";
    $resultgroup=mysqli_query($conn,$sql);
    if(mysqli_num_rows($resultgroup)>0)
    {
        $admin=mysqli_fetch_all($resultgroup,MYSQLI_ASSOC);
        $_SESSION['role']=$admin;
    }
    
    $data=mysqli_fetch_array($result);
    $_SESSION['id']=$data['id'];
    
    $_SESSION['data']=$data;

    $rrr=mysqli_fetch_all($result);
    foreach($rrr as $row):
        setcookie("type",$row["user_type"],time()+3600);
    endforeach;
    
    
    header("Location: adminhome.php");
}
}
else
{
    $message="<div class='alert alert-danger'>Wrong user name or password</div>";
    echo $message;
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    </html>
