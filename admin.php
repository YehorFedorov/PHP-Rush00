<?php
session_start();
if (TRUE) {
?>
<html>
<head>
    <title>Admin</title>
</head>
<style>
.button {
    width: 10%;
    height: 30%;
}
#bg {
    background-color: #aadd99; 
}
</style>
<body bgcolor="#3f3f3f">
    <form method="post" action="src.php">
    <div>
        <a style="color:white;" href="index.php">Back to the main menu</a>
        <input class="button" type="submit" name="items" value="Items">
        <input class="button" type="submit" name="users" value="Users">
    </div>
<br/>
    <div>
        <iframe id="bg" width="100%" height="100%" src="navigation.php"></iframe>
    </div>
    </form>
</body>
</html>
<?php
}
?>
