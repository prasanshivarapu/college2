<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $host = 'localhost';
    $dbname = 'jeevasbiotechcontactus';
    $username = 'admin';
    $password = '1234';

    try {
     
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

      
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $department = $_POST['department'];
        $message = $_POST['message'];
        $resume = $_FILES['resume']['name']; 

      
        $sql = "INSERT INTO career (fullname, email, mobile, department,file, message) VALUES (:name, :email, :phone, :department,:resume, :message )";

       
        $stmt = $pdo->prepare($sql);

        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':resume', $resume);

       
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['resume']['name']);
        move_uploaded_file($_FILES['resume']['tmp_name'], $targetFile);

       
        $stmt->execute();

       
        $response = array('message' => 'Data saved successfully.', 'error' => '');

    } catch (PDOException $e) {
       
        $response = array('message' => '', 'error' => 'Error: ' . $e->getMessage());
    }

    
    echo json_encode($response);
} else {
    echo 'Invalid request';
}
?>







<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $dbname = 'jeevasbiotechcontactus';
    $username = 'admin';
    $password = '1234';
    
    
    $maxFileSize = 2 * 1024 * 1024;  

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $department = $_POST['department'];
        $message = $_POST['message'];
        $resume = $_FILES['resume']['name'];

        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['resume']['name']);

        // Check if the file with the same name already exists
        if (file_exists($targetFile)) {
            $response = array('message' => '', 'error' => 'File with the same name already exists.');
        } else {
            // Check the file size
            if ($_FILES['resume']['size'] <= $maxFileSize) {
                $sql = "INSERT INTO career (fullname, email, mobile, department, file, message) VALUES (:name, :email, :phone, :department, :resume, :message)";
                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':department', $department);
                $stmt->bindParam(':message', $message);
                $stmt->bindParam(':resume', $resume);

                // Move the uploaded file to the directory
                move_uploaded_file($_FILES['resume']['tmp_name'], $targetFile);

                $stmt->execute();

                $response = array('message' => 'Data saved successfully.', 'error' => '');
            } else {
                $response = array('message' => '', 'error' => 'File size exceeds the maximum allowed size (2MB).');
            }
        }
    } catch (PDOException $e) {
        $response = array('message' => '', 'error' => 'Error: ' . $e->getMessage());
    }

    echo json_encode($response);
} else {
    echo 'Invalid request';
}
