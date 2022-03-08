<?php

session_start();

$data=$_SESSION['data'];
?>


<!DOCTYPE html>
<html>
<head>
    <title>Online Polling System - Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
   
</head>
<body>
    <h1>Polling system</h1>

    
    <a href="login.php"><button>Logout</button></a>
    <h2>Welcome</h2>
    <img src="./upload/<?php echo $data['photo']?>" width="200px" alt="User image"><br><br>
    Name:<?php echo $data['uname'];?><br><br>
    Role: <?php echo $data['role'];?><br><br>
    <!--------------------------------------------------------------->
    <a href="createpoll.php"><button>Create a poll</button><br><br>
    <a href="viewuser.php"><button>View all user</button><br><br>
    <a href="viewanswer.php"><button>View all polling question</button>
        
</body>
</html>