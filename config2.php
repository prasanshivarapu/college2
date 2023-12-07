<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $dbname = 'jeevasbiotechcontactus';
    $username = 'admin';
    $password = '1234';

    $maxFileSize = 2048576;  

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $department = $_POST['department'];
        $message = $_POST['message'];
        $uploadedFile = $_FILES['resume'];
        $fileSize = $_FILES['resume']['size'];
        //  echo $_FILES['resume']['size']  ;
        //  echo $maxFileSize;
        // echo $uploadedFile['name'];
        // Check file size
        if ( $_FILES['resume']['size'] <= $maxFileSize) {
            // Get the file extension
            $fileExtension = strtolower(pathinfo($uploadedFile['name'], PATHINFO_EXTENSION));

            if ($fileExtension === 'pdf') {
                // Generate a new filename with timestamp
                $newFilename = 'resume_' . time() . '.pdf';

                $targetDir = "uploads/";

                // Check if the file with the same name already exists
                $targetFile = $targetDir . $newFilename;
                if (file_exists($targetFile)) {
                    $response = array('message' => '', 'error' => 'File with the same name already exists.');
                } else {
                    // Move the uploaded file to the directory
                    move_uploaded_file($uploadedFile['tmp_name'], $targetFile);

                    $sql = "INSERT INTO career (fullname, email, mobile, department, file, message) VALUES (:name, :email, :phone, :department, :resume, :message)";
                    $stmt = $pdo->prepare($sql);

                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':department', $department);
                    $stmt->bindParam(':message', $message);
                    $stmt->bindParam(':resume', $newFilename);

                    $stmt->execute();

                    // Send an email with the uploaded file
                    $to = "abc@gmail.com";
                    $subject = "File Upload";
                    $message = "A new file has been uploaded.\nName: $name\nEmail: $email\nPhone: $phone\nDepartment: $department\nMessage: $message";
                    $headers = "From: webmaster@example.com";

                    mail($to, $subject, $message, $headers);

                    $response = array('message' => 'Data saved successfully.', 'error' => '');
                }
            } else {
                $response = array('message' => '', 'error' => 'Only PDF files are accepted.');
            }
        } else {
            $response = array('message' => '', 'error' => 'File size exceeds the maximum allowed size (2MB).');
        }
    } catch (PDOException $e) {
        $response = array('message' => '', 'error' => 'Error: ' . $e->getMessage());
    }

    echo json_encode($response);
} else {
    echo 'Invalid request';
}
?>

