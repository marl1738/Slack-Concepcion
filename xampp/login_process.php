<?php
 session_start();
 include 'config.php';

 $email = $_POST['email'];
 $password = $_POST['password'];    

 $sql = "SELECT * FROM users WHERE email = '$email'"; 
 $stmt = $conn->prepare($sql);    
 $stmt->bind_param("s", $email);
 $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("Location: dashboard.php");
           
        } else {
            echo "Invalid password. <a href='login.php'>Try again</a>";
        }
    } else {
        echo "No user found with that email. <a href='login.php'>Try again</a>";
    }

    $stmt->close();
    $conn->close(); 
    ?>