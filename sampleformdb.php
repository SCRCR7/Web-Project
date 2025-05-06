<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App - User Manager</title>
    <!-- Beautified CSS styling -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f7fa;
            padding: 40px;
            color: #333;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            max-width: 400px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        input[type="submit"] {
            background: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        .message {
            padding: 12px;
            margin: 15px 0;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }

        .user-list {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            max-width: 600px;
        }

        .user-item {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .user-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>

    <h2>Add New User</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Enter username" required /><br>
        <input type="email" name="email" placeholder="Enter email" required /><br>
        <input type="submit" name="submit" value="Save User" /><br>
    </form>

    <h2>Delete User</h2>
    <form method="post">
        <input type="number" name="id" placeholder="Enter ID to delete" required />
        <input type="submit" name="delete" value="Delete User" /><br>
    </form>

<?php 
$servername = "localhost";
$db_name = "my_app";
$db_username = "root";
$password = "";
$dsn = "mysql:host=$servername;dbname=$db_name";

try {
    $conn = new PDO($dsn, $db_username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<div class='message success'>Connected to database successfully</div>";

    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS users(
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL
    )";
    $conn->exec($sql);

    // Insert new user
    if(isset($_POST['submit'])){
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);

        $sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['username' => $username, 'email' => $email]);

        if($stmt->rowCount() > 0){
            echo "<div class='message success'>User inserted successfully</div>";
        } else {
            echo "<div class='message error'>User insertion failed</div>";
        }
    }

    // Delete user by ID
    if (isset($_POST['delete'])) {
        $id = htmlspecialchars($_POST['id']);
        $sql = $conn->prepare("DELETE FROM users WHERE id = :id");
        $delete_result = $sql->execute(['id' => $id]);

        if ($delete_result && $sql->rowCount() > 0) {
            echo "<div class='message success'>User deleted successfully</div>";
        } else {
            echo "<div class='message error'>User not found or deletion failed</div>";
        }
    }

    // Display all users
    $result = $conn->query("SELECT * FROM users");
    $users = $result->fetchAll();

    if ($users) {
        echo "<div class='user-list'><h2>All Users</h2>";
        foreach($users as $user){
            echo "<div class='user-item'>ID: {$user['id']} | Name: {$user['username']} | Email: {$user['email']}</div>";
        }
        echo "</div>";
    }

    $conn = null;

} catch(PDOException $e){
    echo "<div class='message error'>Connection failed: " . $e->getMessage() . "</div>";
}
?>

</body>
</html>
