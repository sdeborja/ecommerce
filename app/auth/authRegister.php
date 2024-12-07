<?php
session_start();

    $fullname= $_POST["fullName"];
    $username= $_POST["username"];
    $password= $_POST["password"];
    $confirmPassword= $_POST["confirmPassword"];

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // verify password and confirmPass to be match
        if(trim($password) == trim($confirmPassword)){
          

            $host = "localhost";
            $database = "ecommerce_sdeborja";
            $dbusername = "sdeborja";
            $dbpassword = "Sd3b0rja_2024";
            
            $dsn = "mysql: host=$host;dbname=$database;";
            try {
                $conn = new PDO($dsn, $dbusername, $dbpassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
                //p_fullname,$fullname
                $stmt = $conn->prepare("INSERT INTO users (fullname,username,password,created_at,updated_at) VALUES (:p_fullname,:p_username,:p_password,NOW(),NOW())");
                $stmt->bindParam(':p_fullname', $fullname);
                $stmt->bindParam(':p_username', $username);
                $stmt->bindParam(':p_password', $password);

                $password = password_hash(trim($password),PASSWORD_BCRYPT);
    

                // Execute the statement and check if it was successful
            if ($stmt->execute()) {
                $_SESSION["success"] = "Registration Successful";  // Store success message in session
                header("Location: /registration.php");  // Redirect back to the registration page
                exit;
            } else {
                $_SESSION["error"] = "Insert Error";  // Store error message in session
                header("Location: /registration.php");  // Redirect back to the registration page
                exit;
            }

        } catch (Exception $e) {
            echo "Connection Failed: " . $e->getMessage();
        }

    } else {
        $_SESSION["error"] = "Password Mismatch";  // Store mismatch error message
        header("Location: /registration.php");  // Redirect back to the registration page
        exit;
                    
        }

    
    }

?>