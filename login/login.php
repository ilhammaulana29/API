<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include 'config.php';

$email = $_POST['email'];
$password = $_POST['password'];

// Menggunakan prepared statement untuk mencegah SQL injection.
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Fetch data as associative array
$data = $result->fetch_assoc();

echo json_encode($data);

// Close statement and connection
$stmt->close();
$conn->close();
?>
