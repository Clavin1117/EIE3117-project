<!DOCTYPE html>
<html>
<head>
<title>Online Polling System - Voting</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
include('connect.php');
include('connectpoll.php');

session_start();
$data=$_SESSION['data'];
$uname=$data['uname'];
$count=0;


if(!isset($_GET['qid']))
{
    header('Location: poll.php');
}
else 
{
    $questionid = (int)$_GET['qid'];

    $result=$connect->query("SELECT *  FROM `polling_q` WHERE id = $questionid");
    $result->data_seek($questionid);
    $pol=$result->fetch_Object();

    $aquery=$connect->query("SELECT answer.question AS qqq, answer.uname AS aname FROM `answer` JOIN `polling_q` 
    ON polling_q.id=answer.question WHERE answer.uname='$uname' AND answer.question=$questionid");

    $rowCount = $aquery->num_rows;
    $completed = boolval( $rowCount )? true : false;
  

    if($completed)
    {
        $aquery=$connect->query("SELECT answer.option, COUNT(answer.option)*100/
        (SELECT COUNT(*) FROM `answer` WHERE answer.question =$questionid) AS percentage FROM `polling_q` LEFT JOIN `answer` ON answer.option=polling_q.option1  WHERE polling_q.id=$questionid GROUP BY answer.option
        UNION ALL
        SELECT answer.option, COUNT(answer.option)*100/
        (SELECT COUNT(*) FROM `answer` WHERE answer.question =$questionid) AS percentage FROM `polling_q` LEFT JOIN `answer` ON answer.option=polling_q.option2  WHERE polling_q.id=$questionid GROUP BY answer.option
        UNION ALL
        SELECT answer.option, COUNT(answer.option)*100/
        (SELECT COUNT(*) FROM `answer` WHERE answer.question =$questionid) AS percentage FROM `polling_q` LEFT JOIN `answer` ON answer.option=polling_q.option3  WHERE polling_q.id=$questionid GROUP BY answer.option
        UNION ALL
        SELECT answer.option, COUNT(answer.option)*100/
        (SELECT COUNT(*) FROM `answer` WHERE answer.question =$questionid) AS percentage FROM `polling_q` LEFT JOIN `answer` ON answer.option=polling_q.option4  WHERE polling_q.id=$questionid GROUP BY answer.option;
            ");

            while($row = $aquery->fetch_Object())
            {
                $answers[]=$row;
            }
;
        $bquery=$connect->query("SELECT option1,option2,option3,option4  FROM `polling_q` WHERE id = $questionid");
        while($row = $bquery->fetch_Object())
            {
                $choices[]=$row;
            }
          
           
    }
    
}

    
if(mysqli_num_rows($result)>0)
    {
    ?><form action="vote.php" method="get">
    <?php 
    echo"<td>Question".$pol->id.":".$pol->question."</td>";?> <br><br>
    
    <?php if($completed)
    {
        echo "You have finished the poll, thanks.";?> <br><br>
        
        
            <?php
            foreach($answers as $answer):
                foreach($choices as $choice):
                    if ($answer->option="null")
                    { $count++;};
                    switch ($count)
                    {
                        case "1":
                            echo $choice->option1;
                            break;
                        case "2":
                            echo $choice->option2;
                            break;
                        case "3":
                            echo $choice->option3;
                            break;
                        case "4":
                            echo $choice->option4;
                            break;
                    }
            
            echo "(".$answer->percentage. "%)";?> <br><br><?php
            
                
        endforeach;
    endforeach;
    
        

    }
    else
    {
    echo"<td><input type='radio' id='option1' name='option' class='radoptions' value='$pol->option1'/>".$pol->option1."";?><br><br>
    <?php echo"<input type='radio' id='option2' name='option' class='radoptions' value='$pol->option2'/>".$pol->option2."";?><br><br>
    <?php echo"<input type='radio' id='option3' name='option' class='radoptions' value='$pol->option3'/>".$pol->option3."";?><br><br>
    <?php echo"<input type='radio' id='option4' name='option' class='radoptions' value='$pol->option4'/>".$pol->option4."";?><br><br>
    <?php echo"</td>";?><br><br>
    <?php echo"<td>";?>
    <input type="submit" value="Submit">
    <input type="hidden" name="poll" value='<?php echo $pol->id; ?>'>
    <?php echo"</td>";
    echo"</tr>";}
    ?></form>
    <?php
    }
?>
<br><br>
<button type="button" onclick="history.back();">Back</button>
<a href="login.php"><button>Logout</button></a>
</body>
</html>