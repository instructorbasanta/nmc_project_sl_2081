<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_nmc_2081_project';

try {
    $connection = new mysqli($host, $user, $password);
    if ($connection->connect_error) {
        throw new Exception('Connection failed: ' . $connection->connect_error);
    }   
    if($connection->query("CREATE DATABASE IF NOT EXISTS $database")){
        echo "Database '$database' created successfully .<br>";
    } else{
        throw new Exception('Error creating database: ' . $connection->error);
    }
    if (!$connection->select_db($database)) {
        throw new Exception('Error selecting database: ' . $connection->error);
    }
    //query to create admin table with admins(id,name,email,password,status,last_login,role)
    $adminTableQuery = "CREATE TABLE IF NOT EXISTS $database.admins (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        status boolean NOT NULL DEFAULT 0,
        last_login TIMESTAMP NULL DEFAULT NULL,
        role ENUM('admin', 'editor') NOT NULL DEFAULT 'editor'
    )";
    if ($connection->query($adminTableQuery) === TRUE) {
        echo "Table 'admins' created successfully.<br>";
    } else {
        throw new Exception('Error creating table: ' . $connection->error);
    }
    $categoryTableQuery = "CREATE TABLE IF NOT EXISTS $database.categories (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100) NOT NULL,
        rank INT(11) NOT NULL,
        status boolean NOT NULL DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
        created_by INT(11) NOT NULL,
        updated_by INT(11) DEFAULT NULL,
        foreign key (created_by) references admins(id) on delete restrict on update cascade,
        foreign key (updated_by) references admins(id) on delete restrict on update cascade
    )";
    if ($connection->query($categoryTableQuery) === TRUE) {
        echo "Table 'categories' created successfully.<br>";
    } else {
        throw new Exception('Error creating table: ' . $connection->error);
    }
    $postTableQuery = "CREATE TABLE IF NOT EXISTS $database.posts (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        category_id INT(11) NOT NULL,
        title VARCHAR(100) NOT NULL,
        description TEXT NOT NULL,
        feature_image VARCHAR(255) DEFAULT NULL,
        feature_key VARCHAR(255) DEFAULT NULL,
        status boolean NOT NULL DEFAULT 0,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
        created_by INT(11) NOT NULL,
        updated_by INT(11) DEFAULT NULL,
        foreign key (category_id) references categories(id) on delete restrict on update cascade,
        foreign key (created_by) references admins(id) on delete restrict on update cascade,
        foreign key (updated_by) references admins(id) on delete restrict on update cascade
    )";
    if ($connection->query($postTableQuery) === TRUE) {
        echo "Table 'posts' created successfully.<br>";
    } else {
        throw new Exception('Error creating table: ' . $connection->error);
    }
    $commentTableQuery = "CREATE TABLE IF NOT EXISTS $database.comments (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        post_id INT(11) NOT NULL,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        comment TEXT NOT NULL,
        commented_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        status boolean NOT NULL DEFAULT 0,
        foreign key (post_id) references posts(id) on delete cascade on update cascade
    )";
    if ($connection->query($commentTableQuery) === TRUE) {
        echo "Table 'comments' created successfully.<br>";
    } else {
        throw new Exception('Error creating table: ' . $connection->error);
    }
    //check if admin data already exists, if not insert default admin data
    $checkAdminQuery = "SELECT * FROM $database.admins WHERE email='admin@gmail.com'";
    $result = $connection->query($checkAdminQuery);
    if ($result->num_rows > 0) {
        echo "Admin data already exists.<br>";
    } else {    
        $adminDataQuery = "INSERT INTO $database.admins (id,name, email, password, status, role) VALUES (1,'Admin Kumar', 'admin@gmail.com', '" . password_hash('admin123', PASSWORD_DEFAULT) . "', 1, 'admin')";
        if ($connection->query($adminDataQuery) === TRUE) {
            echo "Admin data inserted successfully.<br>";
        } else {
            throw new Exception('Error inserting admin data: ' . $connection->error);
        }
    }
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
} finally {
    $connection->close();
}   
?>