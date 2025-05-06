# Web-Project
This is Assignment Project Just to Learn How Git and Github Work

# 📘 User Manager Web App (PHP + MySQL + PDO)

This is a simple PHP-based CRUD (Create, Read, Delete) application using **PDO for secure database interaction**, styled with pure CSS for clean UI.

---

## 🛠 Requirements

- PHP 7.x or later
- MySQL or MariaDB
- XAMPP, WAMP, or any local server
- A web browser (Chrome, Firefox, etc.)

---

## 📁 Setup Instructions

### 1. Create Database and Table

- Open **phpMyAdmin** or use MySQL CLI.
- Create a database named: `my_app`.

```sql
CREATE DATABASE my_app;
```

- The `users` table will be created automatically when the app runs for the first time.

### 2. Project Folder Setup

- Place your PHP file (e.g., `index.php`) inside:

```
xampp/htdocs/my_app/
```

- Start **Apache** and **MySQL** from the XAMPP Control Panel.

### 3. Edit Database Credentials in Code

In your PHP file:

```php
$servername = "localhost";
$db_name = "my_app";
$db_username = "root";
$password = "";
```

Update these if your credentials differ.

---

## ✅ Features

- Add User (username and email)
- Delete User by ID
- Display all users
- Stylish UI with CSS
- PDO used to prevent SQL injection
- Success/error messages

---

## ⚙️ How It Works

| Feature            | Description                                                                 |
|--------------------|-----------------------------------------------------------------------------|
| **Add User**        | Form submits name/email → INSERT using PDO                                 |
| **Delete User**     | Form submits ID → DELETE using PDO                                         |
| **Show Users**      | SELECT * FROM users → Display with styling                                 |
| **Auto Table**      | Table auto-created if not exists                                           |
| **Error Handling**  | Try/catch block for DB connection and query                                |

---

## 💅 Styling Highlights

- Clean layout with box shadows and spacing
- Colorful success/error boxes
- Stylish inputs and buttons
- Responsive layout

---

## 🚀 To Run the App

1. Go to your browser.
2. Visit:  
   ```
   http://localhost/my_app/
   ```
3. Interact with the app: Add, View, and Delete users.

---

## 🔒 Security Tips

- Always sanitize inputs (`htmlspecialchars`)
- Use prepared statements (done)
- Don't use root in production

---

## 📌 Future Suggestions

- Add Edit (Update) functionality
- Add pagination for large user lists
- Add login/authentication
- Use Bootstrap or Tailwind CSS

---

### 📝 Optional Screenshot

You can include a screenshot here:

```
![Preview](screenshot.png)
```

---

**Created by Sohaib** ✨
