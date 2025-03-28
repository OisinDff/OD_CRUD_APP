<?php

/**
 * List all users with a link to edit
 */
try {
    require "./common.php";
    require_once './src/DBconnect.php';

    $sql = "SELECT * FROM users";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

require "templates/header.php";
?>

<h2>Update users</h2>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email Address</th>
            <th>Age</th>
            <th>Location</th>
            <th>Date</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row) : ?>
            <tr>
                <td><?php echo htmlspecialchars($row["id"]); ?></td>
                <td><?php echo htmlspecialchars($row["firstname"]); ?></td>
                <td><?php echo htmlspecialchars($row["lastname"]); ?></td>
                <td><?php echo htmlspecialchars($row["email"]); ?></td>
                <td><?php echo htmlspecialchars($row["age"]); ?></td>
                <td><?php echo htmlspecialchars($row["location"]); ?></td>
                <td><?php echo htmlspecialchars($row["date"]); ?></td>
                <td><a href="update-single.php?id=<?php echo escape($row["id"]);
                                                    ?>">Edit</a></td>
                <td><a href="delete.php?id=<?php echo escape($row["id"]); ?> "> Delete </a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>