<?php
class AdminModel extends DB
{
    public function ListAll()
    {
        $sql = "SELECT * FROM category";
        return mysqli_query($this->con, $sql);
    }
    public function ListItem($id)
    {
        $sql = "SELECT * FROM product where category_id=$id";
        return mysqli_query($this->con, $sql);
    }

    public function showCommentAd()
    {
        $sql = "SELECT * FROM comment, product, user
        WHERE comment.product_id=product.product_id 
        AND comment.user_id=user.user_id";
        return mysqli_query($this->con, $sql);
    }


    
//variant -> size
// SELECT: Chọn các cột để hiển thị trong kết quả thống kê.
// FROM: Liệt kê các bảng cần tham gia trong truy vấn.
// WHERE: Điều kiện để lọc dữ liệu, chỉ lấy các sản phẩm có giá khác 0 và có kích thước 'Nhỏ'.
// GROUP BY: Nhóm các dòng dữ liệu theo danh mục để thực hiện thống kê.
// ORDER BY: Sắp xếp kết quả theo category_id tăng dần
    public function ThongKe()
    {
        $sql = "SELECT category.category_id as id_category, 
                category.category_name as name_category,
                MIN(variant.price) as priceMin,
                MAX(variant.price) as priceMax,
                AVG(variant.price) as priceAvg,
                variant.price as price,
                count(*)  as numProduct
                FROM category, product,variant
                WHERE product.category_id=category.category_id 
                AND product.product_id=variant.product_id 
                AND variant.price!=0 AND variant.size='Nhỏ'
                GROUP by category.category_id ORDER BY category.category_id ASC";
        return mysqli_query($this->con, $sql);
    }




//SELECT: Chọn các cột để hiển thị trong kết quả thống kê.
// FROM: Liệt kê các bảng cần tham gia trong truy vấn.
// WHERE: Điều kiện để liên kết các bảng và lọc dữ liệu.
// GROUP BY: Nhóm các dòng dữ liệu theo product_id để thực hiện thống kê theo sản phẩm.
// ORDER BY: Sắp xếp kết quả theo số lượng đặt hàng (ProductNum) giảm dần (DESC).
    public function ThongKeOrder()
    {
        $sql = "SELECT
        product.product_id as product_id, 
        product.product_name as product_name,
        sum(num) as ProductNum 
        FROM category, product,variant,order_details
        WHERE product.category_id=category.category_id 
        AND product.product_id=variant.product_id 
        AND order_details.variant_id = variant.variant_id
        GROUP by product.product_id ORDER BY ProductNum DESC";
        return mysqli_query($this->con, $sql);
    }

    public function showOrder()
    {
        $sql = "SELECT * FROM user,orders WHERE orders.user_id=user.user_id ORDER BY order_date DESC";
        return mysqli_query($this->con, $sql);
    }
}
