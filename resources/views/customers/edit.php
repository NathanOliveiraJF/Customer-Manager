<?php
$user = $_REQUEST["user"];
?>

<!DOCTYPE html>
<html lang="en-Us">
<head>
    <title>Edit User</title>
</head>
<body>

<form action="/customers" method="post">
    <input name="username" placeholder="<?= $user->username ?>" required/>
    <input name="lastname" placeholder="<?= $user->lastname ?>" required/>
    <input type="date" name="birth" placeholder="<?= $user->birth ?>" required/>
    <input type="submit" value="edit customer">
</form>
</body>
</html>