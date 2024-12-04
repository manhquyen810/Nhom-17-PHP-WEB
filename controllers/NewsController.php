<?php
require_once "models/News.php";
require_once "models/Category.php";

class NewsController {
    public function index() {
        $news = News::getAll();

        include "views/admin/news/index.php";
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nhận dữ liệu từ form
            $title = $_POST['title'];
            $content = $_POST['content'];
            $image = $_POST['image'];
//            $createAt = $_POST['create_at'];
            $category_id = $_POST['category_id'];

            // Tạo tin tức mới
            News::create($title, $content, $image, $category_id);


            header("Location: index.php?controller=admin&action=manageNews");
        }else {
            // Lấy danh sách các danh mục để người dùng chọn

            $categories = Category::getAll();
            include "views/admin/news/add.php";
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Xóa tin tức theo ID
            if (News::delete($id)) {
                header("Location: index.php?controller=admin&action=manageNews");
                exit;
            } else {
                echo "Xóa không thành công!";
            }
        } else {
            echo "Không có ID tin tức!";
        }
    }

}
?>
