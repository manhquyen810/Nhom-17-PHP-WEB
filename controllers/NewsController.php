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

    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Nhận dữ liệu từ form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];

            // Xử lý upload hình ảnh mới (nếu có)
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = "uploads/";
                $image = time() . "_" . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $image);
            }

            // Cập nhật tin tức
            if (News::update($id, $title, $content, $image, $category_id)) {
                header("Location: index.php?controller=admin&action=manageNews");
            } else {
                echo "Cập nhật không thành công!";
            }
        } else {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                // Lấy thông tin chi tiết của tin tức
                $news = News::getById($id);
                if (!$news) {
                    echo "Tin tức không tồn tại!";
                    return;
                }

                // Lấy danh sách các danh mục để hiển thị trong form
                $categories = Category::getAll();
                include "views/admin/news/edit.php";
            } else {
                echo "Không có ID tin tức!";
            }
        }
    }
}
?>
