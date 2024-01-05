<?php
class Admin extends Controller
{
  public function __construct()
  {
  }

  function Default()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    //Kiểm tra xem biến $_SESSION['userAdmin'] có được đặt (đã đăng nhập) hay không.
    //Nếu không, chuyển hướng người dùng đến trang đăng nhập bằng cách sử dụng hàm header của PHP.
    $Models = $this->model("HomeModel");
    $Category = $this->model("CategoryModel");
    $Product = $this->model("ProductModel");
    $Admin = $this->model("AdminModel");
    $User = $this->model("UserModel");
    //Tạo các đối tượng của các lớp Model, (Home, Category, Product, Admin, User).
    $this->view("masterAdmin", [
      "Page" => "home",
      "countCategory" => $Category->countCategory(),
      "countProduct" => $Product->countProduct(),
      "countUser" => $User->countUser(),
      "countOrder" => $Models->countOrder(),
      "countNews" => $Models->countNews(),
      "countComment" => $Models->countComment(),
      "thongkeChartName" => $Admin->ThongKe(),
      "thongkeChartNum" => $Admin->ThongKe(),
      "ThongKe" => $Admin->ThongKe(),
      "ThongKeOrderName" => $Admin->ThongKeOrder(),
      "ThongKeOrderNum" => $Admin->ThongKeOrder(),
    ]);
  }
  //Gọi hàm view với tên layout là "masterAdmin".
  //Truyền một mảng các dữ liệu, trong đó có "Page" được đặt là "home" và một số dữ liệu thống kê từ các đối tượng Model khác nhau.


  function logout()
  {
    unset($_SESSION['userAdmin']);
    header("Location: http://localhost/DuAn1/Admin/login");
  }
  //Hủy bỏ phiên đăng nhập của người dùng bằng cách sử dụng unset để xóa giá trị của $_SESSION['userAdmin'].
  //Sử dụng hàm header để chuyển hướng người dùng đến trang đăng nhập. Sau khi phiên đăng nhập đã bị hủy, người dùng sẽ được đưa đến trang đăng nhập để đăng nhập lại nếu cần.

  function login()
  {
    $Category = $this->model("CategoryModel");
    $this->view("masterAdmin", [
      "Page" => "login",
      "countCategory" => $Category->ListAll()
    ]);
  }
//hàm đăng nhập   
  function loginAction()
  {
    $Login = $this->model("UserModel");
    $kq = $Login->LoginAdmin();
  }



  //hàm này kiểm tra xem admin đã đăng nhập hay chưa.
  function category()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    $this->view("masterAdmin", [
      "Page" => "category",
      "ShowCategory" => $Category->ListAll()
    ]);
  }



  function editCategory($id)
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    //Kiểm tra xem biến $_SESSION['userAdmin'] có tồn tại hay không. 
    //Nếu không tồn tại, nó chuyển hướng người dùng đến trang đăng nhập bằng cách sử dụng hàm header('Location: ...').
    $Category = $this->model("CategoryModel");
    //tạo một đối tượng từ lớp CategoryModel.
    $Category->checkid($id);
    //để kiểm tra tính hợp lệ của ID.
    $this->view("masterAdmin", [
      "Page" => "editcategory",
      "ShowEdit" => $Category->ListItem($id)
    ]);
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
      $Category->editcategory($id, $name);
    }
  }

  function addCategory()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    //Kiểm tra xem người dùng đã đăng nhập (phiên đăng nhập có tồn tại) hay chưa.
    //Nếu không, chuyển hướng người dùng đến trang đăng nhập.
    $Category = $this->model("CategoryModel");
    //Tạo đối tượng của lớp CategoryModel, có vẻ như là một model liên quan đến quản lý danh mục.
    if (isset($_POST['name'])) {
      $name = $_POST['name'];
    }
    //Kiểm tra xem có dữ liệu được gửi đi thông qua phương thức POST hay không.
    //Nếu có, lấy dữ liệu tên danh mục từ $_POST và gán vào biến $name.
    $Category->addCategory($name);
  }
  //Gọi phương thức addCategory của đối tượng CategoryModel với tham số là tên danh mục ($name).
  //Phương thức này có nhiệm vụ thêm một danh mục mới vào cơ sở dữ liệu.



  // kiểm tra đăng nhập của admin, sau đó xử lý yêu cầu xóa danh mục dựa trên dữ liệu POST 
  //sử dụng phương thức deleteCategory của lớp CategoryModel
  function deleteCategory()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    if (!empty($_POST)) {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
          case 'delete':
            if (isset($_POST['id'])) {
              $id = $_POST['id'];
              $Category->deleteCategory($id);
            }
            break;
        }
      }
    }
  }


  //tạo các đối tượng cho việc tương tác với cơ sở dữ liệu 
  //sau đó hiển thị trang quản lý tin tức với danh sách danh mục và sản phẩm
  function addNews()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    $Product = $this->model("ProductModel");
    $Models = $this->model("AdminModel");
    
    $this->view("masterAdmin", [
      "Page" => "news",
      "ShowCategory" => $Category->ListAll(),
      "ShowProduct" => $Product->ListAllAdmin(),
    ]);
  }



  function addNewss()
  {
    $Product = $this->model("ProductModel");
    $Add = $Product->addNews();
  }


  // tạo các đối tượng cho việc tương tác với cơ sở dữ liệu 
  //sau đó hiển thị trang quản lý sản phẩm với danh sách danh mục và sản phẩm
  function product()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    $Product = $this->model("ProductModel");
    $Models = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "product",
      "ShowCategory" => $Category->ListAll(),
      "ShowProduct" => $Product->ListAllAdmin(),
    ]);
  }

  // Thêm sản phẩm
  function addProduct()
  {
    $Product = $this->model("ProductModel");
    $Add = $Product->add();
  }

  // Sửa sản phẩm
  function editProduct($id)
  {
    if (!isset($_SESSION['userAdmin'])) { 
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Product = $this->model("ProductModel");
    $Category = $this->model("CategoryModel");
    // $Category->checkid($id);
    $this->view("masterAdmin", [
      "Page" => "editProduct",
      "ShowEdit" => $Product->ListItem($id),
      "ShowCategory" => $Category->ListAll(),
      "ShowProduct" => $Product->ListItem($id),
      "ShowVariant" => $Product->ShowVariant($id),
    ]);
  }
  function editProductAct()
  {
    $Product = $this->model("ProductModel");
    $Add = $Product->edit();
  }

  function deleteProduct()
  {
    $Product = $this->model("ProductModel");
    if (!empty($_POST)) {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
          case 'delete':
            if (isset($_POST['id'])) {
              $id = $_POST['id'];
              $Product->deleteProduct($id);
              $Product->deleteVariant($id);
            }
            break;
        }
      }
    }
  }

  // USER


  //hiển thị trang quản lý người dùng với danh sách người dùng, 
  //thông tin về vai trò của họ, danh sách danh mục và sản phẩm
  function user()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $Category = $this->model("CategoryModel");
    $Product = $this->model("ProductModel");
    $UserModel = $this->model("UserModel");
    $Models = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "user",
      "showUser" => $UserModel->ListUserRole(),
      "ShowCategory" => $Category->ListAll(),
      "ShowProduct" => $Product->ListAllAdmin(),
    ]);
  }

  function editUser($id)
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $UserModel = $this->model("UserModel");
    $this->view("masterAdmin", [
      "Page" => "editUser",
      "ShowEdit" => $UserModel->ListItem($id),
      "showUserItem" => $UserModel->ListItem($id),
      "showRole" => $UserModel->showRole(),
    ]);
  }

  function editUserAct()
  {
    $UserModel = $this->model("UserModel");
    $edit = $UserModel->edit();
  }

 
  //xử lý yêu cầu xóa người dùng dựa trên dữ liệu POST, sử dụng phương thức deleteUser của lớp UserModel
  function deleteUser()
  {
    $User = $this->model("UserModel");
    if (!empty($_POST)) {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
          case 'delete':
            if (isset($_POST['id'])) {
              $id = $_POST['id'];
              $User->deleteUser($id);
            }
            break;
        }
      }
    }
  }

  // COMMENT
  function comment()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $AdminModel = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "comment",
      "showCommentAd" => $AdminModel->showCommentAd(),
    ]);
  }


  //xóa bình luận dựa trên dữ liệu POST từ một form, sử dụng phương thức deleteComment của lớp UserModel
  function deleteComment()
  { 
    $User = $this->model("UserModel");
    if (!empty($_POST)) {
      if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
          case 'delete':
            if (isset($_POST['id'])) {
              $id = $_POST['id'];
              $User->deleteComment($id);
            }
            break;
        }
      }
    }
  }

  // ORDER
  function order()
  {
    if (!isset($_SESSION['userAdmin'])) {
      header('Location: http://localhost/DuAn1/Admin/login');
    }
    $AdminModel = $this->model("AdminModel");
    $this->view("masterAdmin", [
      "Page" => "order",
      "showOrder" => $AdminModel->showOrder(),
    ]);
  }
  function orderDetails($id)
  {
    $ProductModel = $this->model("ProductModel");
    $this->view("masterAdmin", [
      "Page" => "orderdetails",
      "showOrderDetails" => $ProductModel->showHistoryDetails($id),
      "showOrderDetailsID" => $ProductModel->showHistoryDetails($id),
      "showStatus" => $ProductModel->showStatus($id),
    ]);
  }
  function updateOrder($id)
  {
    if (isset($_POST['status'])) {
      $status = $_POST['status'];
    }
    $Product = $this->model("ProductModel");
    $Add = $Product->updateOrder($status, $id);
  }
}
