<?php
$conn = new mysqli("localhost", "root", "", "banking");

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$email = $data->email;
$password = password_hash($data->password, PASSWORD_DEFAULT);

$query = "INSERT INTO useme (username, email, password) VALUES ('$username', '$email', '$password')";

if ($conn->query($query)) {
    echo json_encode(["message" => "User registered successfully"]);
} else {
    echo json_encode(["message" => "Error: " . $conn->error]);
}
?>
