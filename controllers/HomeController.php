<?php
require_once 'models/News.php';
require_once 'models/Category.php';

class HomeController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    // Hiển thị danh sách bài viết
    public function index() {
        // Lấy từ khóa tìm kiếm nếu có
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

        if ($keyword) {
            $news = News::search($keyword);
        } else {

            $news = News::getAll();
        }
        $categories = Category::getAll();


        include 'views/home/index.php';
    }

    // Hiển thị chi tiết bài viết
    public function detail($id) {
        $newsModel = new News($this->pdo);
        $news = $newsModel->getById($id);

        if ($news) {
            include 'views/news/detail.php'; // Hiển thị chi tiết bài viết
        } else {
            echo "Bài viết không tồn tại.";
        }
    }
}
?>
