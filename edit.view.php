<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    require_once 'functions.php';

    ?>
    <form action="edit_user.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    
        <label for="firstName">First Name</label>
            <input type="text" name="firstName" id="firstName" value="<?php echo $user['first_name'] ?? ''; ?>" required>
        <br><br>

        <label for="lastName">Last Name</label>
            <input type="text" name="lastName" id="lastName" value="<?php echo $user['last_name'] ?? ''; ?>" required>
        <br><br>

        <label for="phone">Phone</label>
            <input type="tel" name="phone" id="phone" value="<?php echo $user['phone'] ?? ''; ?>" required>
        <br><br>

        <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email'] ?? ''; ?>" required>
        <br><br>

        <button type="submit">Update User</button>

    </form>
</body>
</html>