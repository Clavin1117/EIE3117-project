<?php
include('connect.php');

$uname=$_POST['uname'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$image=$_FILES['photo']['name'];
$tmp_name=$_FILES['photo']['tmp_name'];
$role=$_POST['role'];


if($password!=$cpassword)
{
    echo
    '
    <script>
    alert("Password and Confirm Password do not match!");
    window.location="register.php";
    </script>
    ';
}
else
{
    move_uploaded_file($tmp_name, "upload/".$_FILES['photo']['name']);
    $sql="insert into `user`(uname,email,password,photo,role) values ('$uname', '$email', '$password', '$image', '$role')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo
        '
        <script>
        alert("Registration successful!");
        window.location="index.php";
        </script>
        ';
    }
}
?>