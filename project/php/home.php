<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../login.html");
    exit;
}

require_once "config.php";
$user_id = $_SESSION["id"];
$sql = "SELECT username, email FROM users WHERE id = ?";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($username, $email);
            $stmt->fetch();
        }
    }
    $stmt->close();
}
$mysqli->close();

$username = htmlspecialchars($username);
include '../home.html';
?>
