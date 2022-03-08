<!DOCTYPE html>
<html>
<head>
<title>Online Polling System - Question information</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>

<?php
include('connectpoll.php');

$sql = "Select * from `polling_q`";
$result = mysqli_query($connect, $sql);

while($row=$result->fetch_Object())
{
    $questions[]=$row;
}


if (!empty($questions)): 
    echo "<table>
        <thead>
            <th>Question</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Option 4</th>
        </thead>
        <tbody>";
        
    foreach($questions as $questions):?>
    <?php echo "<tr><td>".$questions->question."</td><td>".$questions->option1."</td><td>".$questions->option2."</td><td>".$questions->option3."</td><td>".$questions->option4."</td>"; "</tbody></table>";?><br><br><?php
    endforeach; 
else:
    echo "No question is added.";
endif;

?>
<br><br>

<caption style="caption-side:bottom"><button type="button" onclick="history.back();">Back</button>
<a href="login.php"><button>Logout</button></a></caption>
</body>
</html>