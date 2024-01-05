<?php

class NewsModel extends DB{
    public function getNews() {
        $sql = "SELECT * FROM news ";
        return mysqli_query($this->con, $sql);
    }

    public function addNews() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $error = false;
    
            $newsId = $_POST['newsId'];
            $title = $_POST['title'];
            $content = $_POST['content'];
     // Kiểm tra dữ liệu ảnh đã được gửi chưa
            if (!isset($_FILES["image"])) {
                echo '
                    <script>
                        alert("Dữ liệu ảnh không đúng cấu trúc");
                        window.location.assign("./news");
                    </script>
                ';
                die;
            }
    
            // Kiểm tra lỗi khi upload ảnh
            if ($_FILES["image"]['error'] != 0) {
                echo '
                    <script>
                        alert("Lỗi khi upload ảnh");
                        window.location.assign("./news");
                    </script>
                ';
                die;
            }
    
            // Xử lý upload ảnh
            $target_dir = "mvc/public/images/news/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $allowUpload = true;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $maxfilesize = 800000;
            $allowtypes = array('jpg', 'png', 'jpeg', 'gif');
    
            if ($_FILES["image"]["size"] > $maxfilesize) {
                echo '
                    <script>
                        alert("Ảnh quá lớn (tối đa 800,000 bytes)");
                        window.location.assign("./news");
                    </script>
                ';
                $allowUpload = false;
            }
    
            if (!in_array($imageFileType, $allowtypes)) {
                echo '
                    <script>
                        alert("Chỉ được upload các định dạng JPG, PNG, JPEG, GIF");
                        window.location.assign("./news");
                    </script>
                ';
                $allowUpload = false;
            }
    
            if ($allowUpload) {
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    // Upload ảnh thành công, cập nhật thông tin vào database
                    $result = mysqli_query($this->con, "INSERT INTO news (title, content, image) VALUES ('$title', '$content', '$target_file')");

                    mysqli_close($this->con);
    
                    echo '
                        <script>
                            alert("Cập nhật tin tức thành công");
                            window.location.assign("./news-list");
                        </script>
                    ';
                    exit;
                } else {
                    echo '
                        <script>
                            alert("Có lỗi xảy ra khi upload ảnh");
                            window.location.assign("./news-list");
                        </script>
                    ';
                }
            } else {
                echo '
                    <script>
                        alert("Không thể upload ảnh, vui lòng thử lại");
                        window.location.assign("./news-list");
                    </script>
                ';
            }
        } else {
            echo '
                <script>
                    alert("Dữ liệu không hợp lệ");
                    window.location.assign("./news-list");
                </script>
            ';
        }
    }
   
}
?>
