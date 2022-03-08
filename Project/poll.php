<!DOCTYPE html>
<html>
<title>Online Polling System - Voting Question</title>
    <head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include('connectpoll.php');

$sql = "Select id, question from `polling_q`";
$result = mysqli_query($connect, $sql);

while($row=$result->fetch_Object())
{
    $polls[]=$row;
}


if (!empty($polls)): 
{
    foreach($polls as $pol):
    echo "Question". $pol->id. ":". $pol->question; ?><br><br>
    <a href="Question.php?qid=<?php echo $pol->id; ?>"><button>Go to poll</button><a><br><br>
    <?php endforeach;
} 
else:
    echo "You have no question to poll.";
endif;

?>
<br><br>
<button type="button" onclick="history.back();">Back</button><br><br>
<a href="login.php"><button>Logout</button></a>
</body>
</html>