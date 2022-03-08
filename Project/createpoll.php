<!DOCTYPE html>
<html>
<head>
    <title>Online Polling System - Create poll</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Create a Poll</h1>

    <form action="pollingdb.php" method="POST">
        Question: <input type="text" placeholder="Question" required="required" name="question"><br><br>
        Option1: <input type="text" placeholder="Option1" required="required" name="option1"><br><br>
        Option2: <input type="text" placeholder="Option2" required="required" name="option2"><br><br>
        Option3: <input type="text" placeholder="Option3" required="required" name="option3"><br><br>
        Option4: <input type="text" placeholder="Option4" required="required" name="option4"><br><br>
        <button type="submit">Confirm</button><br><br>
    </form>
    <button type="button" onclick="history.back();">Back</button><br><br>
<a href="login.php"><button>Logout</button></a>
</body>
</html>