<?php
require_once "models/News.php";

class NewsController {
    public function index() {
        $news = News::getAll();

        include "views/home/index.php";
    }

    public function detail($id) {
        $newsItem = News::getById($id);
        include "views/news/detail.php";
    }

//    public function create() {
//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            $title = $_POST['title'];
//            $content = $_POST['content'];
//            $image = $_POST['image'];
//            $category_id = $_POST['category_id'];
//
//            News::create($title, $content, $image, $category_id);
//            header("Location: index.php?controller=news&action=index");
//        } else {
//            include "views/admin/news/add.php";
//        }
//    }
//    public function delete() {
//        if (isset($_GET['id'])) {
//            $id = $_GET['id'];
//
//            // Xóa tin tức theo ID
//            if (News::delete($id)) {
//                header("Location: index.php?controller=admin&action=manageNews");
//                exit;
//            } else {
//                echo "Xóa không thành công!";
//            }
//        } else {
//            echo "Không có ID tin tức!";
//        }
//    }

}
?>
