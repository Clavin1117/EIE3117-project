<?php
include('connectpoll.php');

$question=$_POST['question'];
$option1=$_POST['option1'];
$option2=$_POST['option2'];
$option3=$_POST['option3'];
$option4=$_POST['option4'];



{
    $sql="insert into `polling_q`(question,option1,option2,option3,option4) values ('$question', '$option1', '$option2', '$option3', '$option4')";
    $result=mysqli_query($connect,$sql);
    if($result)
    {
        echo
        '
        <script>
        alert("Polling has been created!");
        window.location="adminhome.php";
        </script>
        ';
    }
}
?>