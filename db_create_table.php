<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to create a user table
$sql = "CREATE TABLE IF NOT EXISTS user (
    email VARCHAR(30) PRIMARY KEY,
    pw VARCHAR(20) NOT NULL,
    nick_name VARCHAR(20),
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    address VARCHAR(45),
    confirm INT
)";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "User table created successfully<br>";
} else {
    echo "Error creating user table: " . $conn->error;
}

// SQL query to create an article table
$sql = "CREATE TABLE IF NOT EXISTS article (
    idx INT AUTO_INCREMENT PRIMARY KEY,
    board VARCHAR(20),
    title VARCHAR(45),
    content VARCHAR(45),
    file VARCHAR(255),
    article_pw VARCHAR(20),
    hit INT,
    likes INT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(30)
)";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Article table created successfully<br>";
} else {
    echo "Error creating article table: " . $conn->error;
}

// SQL query to create a comments table
$sql = "CREATE TABLE IF NOT EXISTS comments (
    comment_idx INT AUTO_INCREMENT PRIMARY KEY,
    comment VARCHAR(100),
    post_id INT,
    email VARCHAR(30),
    FOREIGN KEY (post_id) REFERENCES article(idx),
    FOREIGN KEY (email) REFERENCES user(email),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Comments table created successfully<br>";
} else {
    echo "Error creating comments table: " . $conn->error;
}

// SQL query to create a recommend table
$sql = "CREATE TABLE IF NOT EXISTS recommend (
    idx INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    email VARCHAR(30),
    likes INT,
    FOREIGN KEY (post_id) REFERENCES article(idx),
    FOREIGN KEY (email) REFERENCES user(email)
)";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Recommend table created successfully<br>";
} else {
    echo "Error creating recommend table: " . $conn->error;
}

// SQL query to create a confirmation_code table
$sql = "CREATE TABLE IF NOT EXISTS confirmation_code (
    idx INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(45),
    email VARCHAR(45),
    FOREIGN KEY (email) REFERENCES user(email)
)";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Confirmation_code table created successfully<br>";
} else {
    echo "Error creating confirmation_code table: " . $conn->error;
}

// SQL query to create a views table
$sql = "CREATE TABLE IF NOT EXISTS views (
    idx INT AUTO_INCREMENT PRIMARY KEY,
    ip VARCHAR(45),
#    watch_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    watch_time VARCHAR(45),
    post_id INT,
    FOREIGN KEY (post_id) REFERENCES article(idx)
)";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "Views table created successfully<br>";
} else {
    echo "Error creating views table: " . $conn->error;
}

$conn->close();
?>
