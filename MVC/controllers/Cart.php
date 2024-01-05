<?php
class Cart extends Controller
{
  public function __construct()
  {
  }

//kiểm tra xem có thông tin người dùng (user_id) đã lưu trong biến session 'userlogin' hay không. 
//Nếu có, nó lấy giá trị user_id và gán vào biến $user_id; nếu không có, nó gán giá trị rỗng cho $user_id.
  function Default()
  {
    if (isset($_SESSION['userlogin'])) {
      $user_id = $_SESSION['userlogin'][3];
    } else {
      $user_id = "";
    }
//kiểm tra xem có thông tin người dùng (user_id) đã được lưu trong biến session 'userlogin'
    $User = $this->model("UserModel");
    $Product = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    if (isset($_SESSION['giohang'])) {
      for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
        $num = $_SESSION['giohang'][$i][2];
        $size = $_SESSION['giohang'][$i][0];
        $id = $_SESSION['giohang'][$i][1];
      }
  //kiểm tra xem biến session 'giohang' có tồn tại hay không.
  //nó sử dụng một vòng lặp để lấy thông tin về số lượng ($num), kích thước , và id của mỗi sản phẩm trong giỏ hàng
    }
    $this->view("master2", [
      "Page" => "cart",
      "ShowMenu" => $Category->ListAll(),
      "ShowNameUser" => $User->ShowNameUser($user_id),
    ]);
  }
  //show danh sách 


  
  function deldCart($id)
  {
    array_splice($_SESSION['giohang'], $id, 1);
    header("Location: " . $_SERVER["HTTP_REFERER"]);
  }
  // xóa một mục khỏi giỏ hàng
}
