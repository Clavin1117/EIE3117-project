<!DOCTYPE html>
<html>
<head>
<title>Online Polling System - User information</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>

<?php
include('connect.php');

$sql = "Select * from `user`";
$result = mysqli_query($conn, $sql);

while($row=$result->fetch_Object())
{
    $users[]=$row;
}


if (!empty($users)): 
    echo "<table>
        <thead>
            <th>User id</th>
            <th>User Name</th>
            <th>User email</th>
            <th>User Role</th>
        </thead>
        <tbody>";
        
    foreach($users as $user):?>
    <?php echo "<tr><td>".$user->id."</td><td>".$user->uname."</td><td>".$user->email."</td><td>".$user->role; "</tbody></table>";?><br><br><?php
    endforeach; 
else:
    echo "No user is registered.";
endif;

?>
<br><br>

<caption style="caption-side:bottom"><button type="button" onclick="history.back();">Back</button>
<a href="login.php"><button>Logout</button></a></caption>
</body>
</html>