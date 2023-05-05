<?php
    $failureMessage= $_REQUEST['failureMessage'];
?>

<html lang="en-Us">
    <head>
        <title>Form</title>
    </head>
    <body>
        <?php if (isset($failureMessage)):?>
        <span><?= $failureMessage ?></span>
        <?php endif;?>
        <form action="/login" method="post">
            <input name="username" placeholder="username" required/>
            <input type="password" name="password" placeholder="password"  required/>
            <input type="submit" value="Log in">
        </form>
    </body>
</html>