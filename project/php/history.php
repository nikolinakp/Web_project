<?php

session_start();
header('Content-Type: application/json');

 // Проверка на логнат потребител
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    die(json_encode(["error" => "You are not logged in."]));
}

// Проверка за наличие на потребителски идентификатор в сесията
if (!isset($_SESSION["id"])) {
    die(json_encode(["error" => "User ID is not set in session."]));
}

// Връзка с базата данни
$conn = new mysqli("localhost", "root", "", "web_app_db");
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// Проверка за наличие на таблица 'files'
$table_check = $conn->query("SHOW TABLES LIKE 'files'");
if ($table_check->num_rows == 0) {
    die(json_encode(["error" => "Table 'files' doesn't exist in the database."]));
}

// Заявка за извличане на данни
$stmt = $conn->prepare("SELECT filename, converted_at FROM files WHERE user_id = ? ORDER BY converted_at DESC");
if ($stmt === false) {
    die(json_encode(["error" => "Prepare failed: " . $conn->error]));
}

$user_id = $_SESSION["id"];
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Преобразуване на резултата в масив и връщане като JSON
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

$stmt->close();
$conn->close();

?>