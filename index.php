<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD UI - Animated</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <!-- Navigation Menu -->
    <nav>
        <ul>
            <li><a href="#" id="createUserBtn">Create User</a></li>
            <li><a href="#" id="readUserBtn">Read User</a></li>
        </ul>
    </nav>

    <!-- Create User Form -->
    <section id="createUserSection">
        <h2>Create User</h2>
        <form id="userForm" >
            <div class="input-group">
                <input type="text" id="firstName"  name="firstName" required>
                <label for="firstName">First Name</label>
            </div>

            <div class="input-group">
                <input type="text" id="lastName" name="lastName" required>
                <label for="lastName">Last Name</label>
            </div>

            <div class="input-group">
                <input type="tel" id="phone" name="phone" required>
                <label for="phone">Phone Number</label>
            </div>

            <div class="input-group">
                <input type="email" id="email" name="email" required>
                <label for="email">Email</label>
            </div>

            <div class="input-group">
                <input type="password" id="password" name="password" required>
                <label for="password">Password</label>
            </div>

            <button type="submit" class="wave-button">Create Account</button>
        </form>
    </section>

    <!-- Read User Section (Placeholder) -->
    <section id="readUserSection" style="display: none;">
        <h2>Read Users</h2>
        <p>Coming soon...</p>
    </section>

    <script src="script.js"></script>
</body>
</html>
