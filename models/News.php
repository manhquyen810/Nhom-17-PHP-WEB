<?php
require_once __DIR__ . '/Database.php';
class News {
    public static function getAll() {
        $db = Database::connect();
        $stmt = $db->query("SELECT n.*, c.name AS category_name FROM news n
                                     LEFT JOIN categories c ON n.category_id = c.id
                                     ORDER BY n.created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT n.*, c.name AS category_name FROM news n
                                     LEFT JOIN categories c ON n.category_id = c.id
                                     WHERE n.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function search($keyword) {
        $db = Database::connect();

        if (empty($keyword)) {
            return [];  // Nếu không có từ khóa, trả về mảng rỗng
        }
        $query = "SELECT n.*, c.name AS category_name FROM news n
                LEFT JOIN categories c ON n.category_id = c.id WHERE title LIKE :keyword OR content LIKE :keyword";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        return $stmt->fetchAll();
    }

//    public static function create($title, $content, $image, $category_id) {
//        $db = Database::connect();
//        $stmt = $db->prepare("INSERT INTO news (title, content, image, category_id) VALUES (?, ?, ?, ?)");
//        return $stmt->execute([$title, $content, $image, $category_id]);
//    }
//
    public static function delete($id) {
        $db = Database::connect();
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public static function create($title, $content, $image, $category_id) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO news (title, content, image, created_at, category_id) VALUES (?, ?, ?, NOW(), ?)");
        return $stmt->execute([$title, $content, $image, $category_id]);
    }

    public static function update($id, $title, $content, $image, $category_id) {
        $db = Database::connect();
        
        if ($image) {
            // Nếu có hình ảnh mới, cập nhật toàn bộ các trường
            $stmt = $db->prepare("UPDATE news 
                                  SET title = ?, content = ?, image = ?, category_id = ?
                                  WHERE id = ?");
            return $stmt->execute([$title, $content, $image, $category_id, $id]);
        } else {
            // Nếu không có hình ảnh mới, không cập nhật trường `image`
            $stmt = $db->prepare("UPDATE news 
                                  SET title = ?, content = ?, category_id = ?
                                  WHERE id = ?");
            return $stmt->execute([$title, $content, $category_id, $id]);
        }
    }
}
?>
