<?php
session_start();
require('connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";
require "PHPMailer/Exception.php";

// Function to send verification email
function sendMail($email, $v_code)
{
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hwkdhrup@gmail.com'; // Replace with your email
        $mail->Password   = 'jobq nwaf iyzv ivad'; // Use App Password from Google
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('hwkdhrup@gmail.com', 'MEDIGURU');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Email Verification';
        $mail->Body    = "Thanks for registering! Click the link below to verify your email: 
            <a href='http://localhost/m/verify.php?email=$email&v_code=$v_code'>VERIFY</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mail Error: " . $mail->ErrorInfo);
        return false;
    }
}

// LOGIN CODE
if (isset($_POST['login'])) {
    $email_username = mysqli_real_escape_string($conn, $_POST['email_username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM `registered_user` WHERE `email`='$email_username' OR `username`='$email_username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if ($user['is_verified'] == 1) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $user['email'];
                header("Location: home.php");
                exit();
            } else {
                echo "<script>alert('Incorrect Password'); window.location.href='home.php';</script>";
            }
        } else {
            echo "<script>alert('Email Not Verified'); window.location.href='home.php';</script>";
        }
    } else {
        echo "<script>alert('Email or Username Not Registered'); window.location.href='home.php';</script>";
    }
}

// REGISTRATION CODE
if (isset($_POST['register'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $v_code = bin2hex(random_bytes(20));
    $user_id = mt_rand(10000, 99999);

    // Check if user already exists
    $check_query = "SELECT * FROM `registered_user` WHERE `username`='$username' OR `email`='$email'";
    $check_result = mysqli_query($conn, $check_query);

    if ($check_result && mysqli_num_rows($check_result) > 0) {
        $existing_user = mysqli_fetch_assoc($check_result);
        if ($existing_user['username'] == $username) {
            echo "<script>alert('Username already exists!'); window.location.href='home.php';</script>";
        } else {
            echo "<script>alert('Email already registered!'); window.location.href='home.php';</script>";
        }
    } else {
        $insert_query = "INSERT INTO `registered_user`(`user_id`, `full_name`, `username`, `email`, `password`, `verification_code`, `is_verified`)
                         VALUES ('$user_id', '$fullname', '$username', '$email', '$password', '$v_code', '0')";

        if (mysqli_query($conn, $insert_query) && sendMail($email, $v_code)) {
            echo "<script>alert('Verification Link Sent to Email'); window.location.href='home.php';</script>";
        } else {
            error_log("DB Error: " . mysqli_error($conn));
            echo "<script>alert('Server Error, Try Again'); window.location.href='home.php';</script>";
        }
    }
}
?>
<?php
// session_start();
// require('connection.php');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require "PHPMailer/PHPMailer.php";
// require "PHPMailer/SMTP.php";
// require "PHPMailer/Exception.php";

// // Function to send verification email
// function sendMail($email, $v_code)
// {
//     $mail = new PHPMailer(true);
//     try {
//         $mail->isSMTP();
//         $mail->Host       = 'smtp.gmail.com';
//         $mail->SMTPAuth   = true;
//         $mail->Username   = 'amanshrivastav2010@gmail.com'; // Replace with your email
//         $mail->Password   = 'rtei njhz Ipsj qosa'; // Use App Password from Google
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
//         $mail->Port       = 465;

//         $mail->setFrom('amanshrivastav2010@gmail.com', 'MEDIGURU');
//         $mail->addAddress($email);

//         $mail->isHTML(true);
//         $mail->Subject = 'Email Verification';
//         $mail->Body    = "Thanks for registering! Click the link below to verify your email: 
//             <a href='http://localhost/m/verify.php?email=$email&v_code=$v_code'>VERIFY</a>";

//         if ($mail->send()) {
//             error_log("Email sent to $email");
//             return true;
//         } else {
//             error_log("Mail Error: " . $mail->ErrorInfo);
//             return false;
//         }
//     } catch (Exception $e) {
//         error_log("Mail Exception: " . $e->getMessage());
//         return false;
//     }
// }

// // LOGIN CODE
// if (isset($_POST['login'])) {
//     $email_username = mysqli_real_escape_string($conn, $_POST['email_username']);
//     $password = $_POST['password'];

//     $query = "SELECT * FROM `registered_user` WHERE `email`='$email_username' OR `username`='$email_username'";
//     $result = mysqli_query($conn, $query);

//     if ($result && mysqli_num_rows($result) == 1) {
//         $user = mysqli_fetch_assoc($result);
//         if ($user['is_verified'] == 1) {
//             if (password_verify($password, $user['password'])) {
//                 $_SESSION['logged_in'] = true;
//                 $_SESSION['username'] = $user['username'];
//                 $_SESSION['user_id'] = $user['user_id'];
//                 $_SESSION['email'] = $user['email'];
//                 header("Location: home.php");
//                 exit();
//             } else {
//                 echo "<script>alert('Incorrect Password'); window.location.href='home.php';</script>";
//             }
//         } else {
//             echo "<script>alert('Email Not Verified'); window.location.href='home.php';</script>";
//         }
//     } else {
//         echo "<script>alert('Email or Username Not Registered'); window.location.href='home.php';</script>";
//     }
// }

// // REGISTRATION CODE
// if (isset($_POST['register'])) {
//     $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
//     $v_code = bin2hex(random_bytes(20));
//     $user_id = mt_rand(10000, 99999);

//     // Check if user already exists
//     $check_query = "SELECT * FROM `registered_user` WHERE `username`='$username' OR `email`='$email'";
//     $check_result = mysqli_query($conn, $check_query);

//     if ($check_result && mysqli_num_rows($check_result) > 0) {
//         $existing_user = mysqli_fetch_assoc($check_result);
//         if ($existing_user['username'] == $username) {
//             echo "<script>alert('Username already exists!'); window.location.href='home.php';</script>";
//         } else {
//             echo "<script>alert('Email already registered!'); window.location.href='home.php';</script>";
//         }
//     } else {
//         $insert_query = "INSERT INTO `registered_user`(`user_id`, `full_name`, `username`, `email`, `password`, `verification_code`, `is_verified`)
//                          VALUES ('$user_id', '$fullname', '$username', '$email', '$password', '$v_code', '0')";

//         if (mysqli_query($conn, $insert_query)) {
//             if (sendMail($email, $v_code)) {
//                 echo "<script>alert('Verification Link Sent to Email'); window.location.href='home.php';</script>";
//             } else {
//                 error_log("Failed to send email to $email");
//                 echo "<script>alert('Failed to send verification email'); window.location.href='home.php';</script>";
//             }
//         } else {
//             error_log("DB Error: " . mysqli_error($conn));
//             echo "<script>alert('Server Error, Try Again'); window.location.href='home.php';</script>";
//         }
//     }
// }
?>


