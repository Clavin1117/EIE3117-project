<!DOCTYPE html>
<html>
<head>
    <title>Online Polling System</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>   

</style>
<body>
    <form action="login.php" method="POST">
        <h1>Online Polling System</h1>
        <?php if (isset($_GET['error'])){ ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name: </label>
        <input type="text" name="uname" placeholder="Enter your username" required="required"><br><br>
        <label>Password: </label>
        <input type="password" name="password" placeholder="Enter your password" required="required"><br><br>
        Select your role: <select name="role">
            <option value="voter">Voter</option>
            <option value="admin">Admin</option>
        </select><br><br> 
         
        <button type="submit">Login</button><br><br>
        
        New User? <a href="register.php">Register Here</a>
    </form>
</body>

</html>
<?php

?>
<?php

?>