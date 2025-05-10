<?php
$conn = new mysqli("localhost", "root", "", "banking");

$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$password = $data->password;

$query = "SELECT * FROM useme WHERE username='$username'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        echo json_encode(["message" => "Login successful"]);
    } else {
        echo json_encode(["message" => "Invalid password"]);
    }
} else {
    echo json_encode(["message" => "User not found"]);
}
?>
