<?php
require_once 'models/User.php';

class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = User::authenticate($username, $password);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=admin&action=dashboard');
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
                include 'views/admin/login.php';
            }
        } else {
            include 'views/admin/login.php';
        }
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=admin&action=login');
            exit();
        }

        include 'views/admin/dashboard.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php');
    }

    public function manageNews() {
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=admin&action=login');
            exit();
        }

        $news = News::getAll();
        include 'views/admin/news/index.php';
    }
}
?>
