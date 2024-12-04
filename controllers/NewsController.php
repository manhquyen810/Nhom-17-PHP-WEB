<?php
require_once "models/News.php";
require_once "models/Category.php";
class NewsController {

    // Hiển thị danh sách tin tức
    public function index() {
        $news = News::getAll();
        include "views/admin/news/index.php";
    }

    // Hiển thị chi tiết tin tức
    public function detail($id) {
        $newsItem = News::getById($id);
        include "views/news/detail.php";
    }

    // Thêm tin tức
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
            News::create($title, $content, $image, $category_id);
            header('Location: admin_news.php');
        } else {
            require 'views/admin/news/create.php';
        }
    }

    public function detail($id) {
        $news = News::getById($id);
        require 'views/news/detail.php';
    }

    // Sửa tin tức
    public function edit($id) {
        $newsItem = News::getById($id);
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
            $category_id = $_POST['category_id'];
    
            News::update($id, $title, $content, $image, $category_id);
            header("Location: index.php?controller=admin&action=manageNews");
        } else {
            // Lấy danh sách các danh mục
            $categoryModel = new Category(Database::connect());
            $categories = $categoryModel->getAll();
            include "views/admin/news/edit.php";
        }
    }
    
    

    // Xóa tin tức
    public function delete($id) {
        // Xóa tin tức
        News::delete($id);

        // Chuyển hướng về trang danh sách tin tức
        header("Location: index.php?controller=news&action=index");
    }
}
?>
