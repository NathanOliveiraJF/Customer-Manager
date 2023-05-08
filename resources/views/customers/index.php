<?php
    $customers = $_REQUEST['customers'];
?>
<!DOCTYPE html>
<html lang="en-Us">
<head>
    <title>Customers</title>
</head>
<body>
    <h1>Customers</h1>
    <a href="/customers/create">Create new Customer</a>
    <table>
        <tr>
            <th>name</th>
            <th>lastname</th>
            <th>data de nascimento</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?=$customer->getName()?></td>
                <td><?=$customer->getLastName()?></td>
                <td><?=$customer->getBirth()?></td>
                <td><a href="/customers/<?=$customer->getId()?>">Edit</a></td>
                <td>
                    <form method="post" action="/customers/<?=$customer->getId()?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>