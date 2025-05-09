<?php 
    require('inc/essentials.php');
    require('inc/db_config.php');

    session_start();
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
        redirect('dashboard.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admin_cred WHERE admin_name=? AND admin_pass=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $_SESSION['adminLogin'] = true;
            $_SESSION['admin_name'] = $username;
            
            logAuditTrail($username, 'LOGIN', 'Admin logged in successfully');
            redirect('dashboard.php');
        } else {
            alert('error', 'Invalid credentials');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minangun Resort - Admin Panel</title>
    <link rel="icon" href="../images/about/title.png" type="image/x-icon" />
    <?php require('inc/links.php'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --resort-primary: #8B4513;
            --resort-secondary: #DEB887;
            --resort-accent: #F4A460;
            --resort-light: #FFEFD5;
            --resort-dark: #5C2E0B;
            --gold: #D4AF37;
            --light-gold: #F4E7BE;
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('../images/about/hero.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 450px;
            padding: 20px;
        }

        .login-form {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4),
                        0 0 80px rgba(212, 175, 55, 0.15);
            border: 1px solid rgba(212, 175, 55, 0.3);
            backdrop-filter: blur(10px);
        }

        .login-header {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            padding: 30px 20px;
            text-align: center;
            border-bottom: 3px solid var(--gold);
            position: relative;
            overflow: hidden;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shine 2s infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .login-header h4 {
            color: var(--resort-light);
            font-size: 26px;
            margin: 0;
            font-weight: 700;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .resort-logo {
            width: 90px;
            height: 90px;
            margin-bottom: 15px;
            padding: 12px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 0 25px rgba(0,0,0,0.3);
            border: 2px solid var(--gold);
            transition: transform 0.3s ease;
        }

        .resort-logo:hover {
            transform: scale(1.05);
        }

        .login-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-control {
            padding: 15px 15px 15px 50px;
            border: 2px solid #e1e1e1;
            border-radius: 12px;
            transition: all 0.3s;
            font-size: 16px;
            background: rgba(255,255,255,0.9);
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 15px rgba(212, 175, 55, 0.2);
            transform: translateY(-2px);
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--resort-primary);
            font-size: 18px;
            pointer-events: none;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .form-control:focus + .input-icon {
            color: var(--gold);
            transform: translateY(-50%) scale(1.1);
        }

        .login-btn {
            background: linear-gradient(135deg, var(--resort-primary), var(--resort-dark));
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 20px;
            transition: all 0.3s;
            font-size: 16px;
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                120deg,
                transparent,
                rgba(255,255,255,0.3),
                transparent
            );
            transition: 0.5s;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:hover {
            background: linear-gradient(135deg, var(--resort-dark), var(--resort-primary));
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .resort-name {
            text-align: center;
            color: white;
            font-size: 38px;
            font-weight: 800;
            margin-bottom: 25px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
            letter-spacing: 2px;
            position: relative;
            display: inline-block;
        }

        .resort-name::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--gold);
            border-radius: 2px;
        }

        @keyframes fadeInUp {
            from { 
                opacity: 0; 
                transform: translateY(30px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        .login-container {
            animation: fadeInUp 1s ease forwards;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .login-container {
                width: 90%;
                padding: 10px;
            }

            .resort-name {
                font-size: 28px;
            }

            .login-header h4 {
                font-size: 22px;
            }

            .resort-logo {
                width: 70px;
                height: 70px;
            }

            .login-body {
                padding: 20px;
            }
        }

        @media (max-width: 768px) {
            .login-container {
                width: 85%;
            }
        }

        @media (max-width: 992px) {
            .resort-name {
                font-size: 32px;
            }
        }

        /* Elegant scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--resort-primary);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--resort-dark);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1 class="resort-name">MINANGUN RESORT</h1>
        <div class="login-form">
            <div class="login-header">
                <img src="../images/about/title.png" alt="Resort Logo" class="resort-logo">
                <h4>ADMIN PANEL</h4>
            </div>
            <form method="POST" class="login-body">
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                    <i class="fas fa-user input-icon"></i>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    <i class="fas fa-lock input-icon"></i>
                </div>
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt me-2"></i>LOGIN
                </button>
            </form>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>
</html>