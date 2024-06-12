<?php

/*require_once("db.php");

session_start();

function isFileDataValid($fileData) {
    if (!isset($fileData["document"]) && !isset($fileData["extension"])) {
        return ["isValid" => false, "message" => "Некоректни данни!"];
    }

    return ["isValid" => true, "message" => "Данните са валидни!"];
}

if (!isset($_SESSION["user"])) {
    http_response_code(401);
    exit(json_encode(["status" => "ERROR", "message" => "Потребителят не е оторизиран"]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);
    $data['user_id'] = $_SESSION["user"]["id"];

    $valid = isFileDataValid($data);

    if (!$valid["isValid"]) {
        http_response_code(400);
        exit(json_encode(["status" => "ERROR", "message" => $valid["message"]]));
    }

    $userId = $data["user_id"];
    $document = $data["document"];
    $extension = $data["extension"];

    try {
        $db = new DB();
        $connection = $db->getConnection();

        $sql = "INSERT INTO files (user_id, document, extension, filename, created_at) VALUES (:user_id, :document, :extension, :filename, NOW())";
        $stmt = $connection->prepare($sql);
        $stmt->execute(["user_id" => $userId, "document" => $document, "extension" => $extension, "filename" => $_FILES['filename']['name']]);

        echo json_encode(["status" => "SUCCESS", "message" => "Файлът е записан"]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "ERROR", "message" => "Грешка при запис на файл: " . $e->getMessage()]);
    }

} else {
    http_response_code(400);
    echo json_encode(["status" => "ERROR", "message" => "Некоректни данни!"]);
}*/

/*require_once("db.php");

session_start();

function isFileDataValid($fileData) {
    if (!isset($fileData["document"]) || !isset($fileData["extension"]) || !isset($fileData["filename"])) {
        return ["isValid" => false, "message" => "Некоректни данни!"];
    }

    return ["isValid" => true, "message" => "Данните са валидни!"];
}

if (!isset($_SESSION["user"])) {
    http_response_code(401);
    exit(json_encode(["status" => "ERROR", "message" => "Потребителят не е оторизиран"]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);
    $data['user_id'] = $_SESSION["user"]["id"];

    $valid = isFileDataValid($data);

    if (!$valid["isValid"]) {
        http_response_code(400);
        exit(json_encode(["status" => "ERROR", "message" => $valid["message"]]));
    }

    $userId = $data["user_id"];
    $document = $data["document"];
    $extension = $data["extension"];
    $filename = $data["filename"]; // Вземане на името на файла от данните

    try {
        $db = new DB();
        $connection = $db->getConnection();

        $sql = "INSERT INTO files (user_id, document, extension, filename, created_at) VALUES (:user_id, :document, :extension, :filename, NOW())";
        $stmt = $connection->prepare($sql);
        $stmt->execute(["user_id" => $userId, "document" => $document, "extension" => $extension, "filename" => $filename]);

        echo json_encode(["status" => "SUCCESS", "message" => "Файлът е записан"]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "ERROR", "message" => "Грешка при запис на файл: " . $e->getMessage()]);
    }

} else {
    http_response_code(400);
    echo json_encode(["status" => "ERROR", "message" => "Некоректни данни!"]);
}*/


require_once("db.php");

session_start();

function isFileDataValid($fileData) {
    if (!isset($fileData["document"]) || !isset($fileData["extension"]) || !isset($fileData["filename"])) {
        return ["isValid" => false, "message" => "Некоректни данни!"];
    }

    return ["isValid" => true, "message" => "Данните са валидни!"];
}

if (!isset($_SESSION["user"])) {
    http_response_code(401);
    exit(json_encode(["status" => "ERROR", "message" => "Потребителят не е оторизиран"]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);
    $data['user_id'] = $_SESSION["user"]["id"];

    $valid = isFileDataValid($data);

    if (!$valid["isValid"]) {
        http_response_code(400);
        exit(json_encode(["status" => "ERROR", "message" => $valid["message"]]));
    }

    $userId = $data["user_id"];
    $document = $data["document"];
    $extension = $data["extension"];
    $filename = $data["filename"]; // Вземане на името на файла от данните

    try {
        $db = new DB();
        $connection = $db->getConnection();

        $sql = "INSERT INTO files (user_id, document, extension, filename, created_at) VALUES (:user_id, :document, :extension, :filename, NOW())";
        $stmt = $connection->prepare($sql);
        $stmt->execute(["user_id" => $userId, "document" => $document, "extension" => $extension, "filename" => $filename]);

        echo json_encode(["status" => "SUCCESS", "message" => "Файлът е записан"]);

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["status" => "ERROR", "message" => "Грешка при запис на файл: " . $e->getMessage()]);
    }

} else {
    http_response_code(400);
    echo json_encode(["status" => "ERROR", "message" => "Некоректни данни!"]);
}




?>
