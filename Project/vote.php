<?php
include('connect.php');
include('connectpoll.php');


session_start();
$data=$_SESSION['data'];
$uname=$data['uname'];
$question=(int)$_GET['poll'];
$option=$_GET['option'];


$result=$connect->query("INSERT INTO `answer`(uname,question,option)
SELECT '$uname','$question','$option' FROM `polling_q` 
WHERE EXISTS ( SELECT uname FROM `user` WHERE uname = '$uname') 
AND EXISTS ( SELECT id FROM `polling_q` WHERE id = '$question')
AND NOT EXISTS ( SELECT id FROM `answer` WHERE uname = '$uname' and question = '$question') LIMIT 1 ");

header('Location: Question.php');

?>