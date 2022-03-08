<!DOCTYPE html>
<html>
<head>
    <title>Online Polling System - Registation</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Online Polling System - Registation</h1>
    <h2>Register an account</h2>
    <form action="db.php" method="POST" enctype="multipart/form-data">
        Create an user name: <input type="text" placeholder="Username" required="required" name="uname"><br><br>
        Enter your email: <input type="email" placeholder="Email" required="required" name="email"><br><br>
        Password: <input type="password" placeholder="Password" required="required" name="password"><br><br>
        Confirm your password:  <input type="password" placeholder="Confirm password" required="required" name="cpassword"><br><br>
        Upload a profile image: <input type="file" required="required" name="photo"><br><br>
        Choose your role: <select name="role">
            <option value="1">Voter</option>
            <option value="2">Admin</option>
        </select><br><br>
        <button type="submit">Register</button><br><br>
        Already have an account? <a href="index.php">Login Here</a>
    </form>
</body>
</html>