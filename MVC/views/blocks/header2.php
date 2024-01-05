<header class="header">
  <div id="menu-areas">
    <div class="logo">
      <a href="<?= BASE_URL ?>" class="logo__link">
        <img class="logo__img" src="<?= BASE_URL ?>/MVC/public/images/metacoffee.png" alt="Logo-ToCoToCo" />
      </a>
    </div>
    <ul class="menu-list">
      <li class="menu-item ">
        <a href="<?= BASE_URL ?>" class="menu-item__link">TRANG CHỦ</a>
      </li>
      <li class="menu-item">
        <a href="<?= BASE_URL ?>/home/thucdon" class="menu-item__link">THỰC ĐƠN <i class="ti-angle-down"></i></a>
        <ul class="menu-children">
          <?php
          if (isset($data['ShowMenu'])) {
            while ($row = mysqli_fetch_array($data['ShowMenu'])) {
          ?>
              <li class="children-item"><a href="<?= BASE_URL ?>/home/danhmuc/<?= $row['category_id'] ?>"><?= $row['category_name'] ?></a></li>
          <?php
            }
          }
          ?>
        </ul>
      </li>
      <li class="menu-item">
        <a href="<?= BASE_URL ?>/home/news" class="menu-item__link">TIN TỨC</a>
      </li>
      <li class="menu-item">
        <a href="<?= BASE_URL ?>/home/profile" class="menu-item__link">GIỚI THIỆU</a>
      </li>
      <li class="menu-item">
        <a href="<?= BASE_URL ?>/home/contac" class="menu-item__link">LIÊN HỆ</a>
      </li>
    </ul>
    <ul class="menu-list2">
      <li class="menu-item2">
        <a href="<?= BASE_URL ?>/cart" class="cart"><i class="cart-icon ti-shopping-cart"></i>
          <?php
          if (isset($_SESSION['giohang'])) {
            $numCart = 0;
            for ($i = 0; $i < count($_SESSION['giohang']); $i++) {
              $numCart += $_SESSION['giohang'][$i][2];
            }
            echo '<span class="cart-notice">' . $numCart . '</span></a>';
          } else {
            echo '<span class="cart-notice">0</span></a>';
          }
          ?>
        </a>
      </li>
      <?php
      if (isset($_SESSION['userlogin'])) {
      ?>
        <li class="menu-item2">
          <div class="login-children" onclick="loginOnclick()">
            <div class="my-account">
              <span class="user-name text-white">
                <?php
                if (isset($data['ShowNameUser'])) {
                  $row = mysqli_fetch_assoc($data['ShowNameUser']);
                  echo $row['name'];
                }
                ?>
              </span>
              <i class="icon-down ti-angle-down text-white"></i>
            </div>
            <ul class="login-children__list" onblur="loginOnblur()">
              <li class="login-item">
                <a class="login-link" href="<?= BASE_URL ?>/home/user">
                  <i class="fas fa-user"></i>Tài khoản của tôi
                </a>
              </li>
              <li class="login-item">
                <a class="login-link" href="<?= BASE_URL ?>/home/history">
                  <i class="fas fa-shopping-cart"></i>Lịch sử mua
                </a>
              </li>
              <li class="login-item">
                <a class="login-link" href="<?= BASE_URL ?>/home/logout">
                  <i class="fas fa-sign-out-alt"></i>Đăng xuất
                </a>
              </li>
            </ul>
          </div>
        </li>
      <?php
      } else {
      ?>
        <li class="menu-item2">
          <span class="login" id="login-tab">ĐĂNG NHẬP</span>
        </li>
      <?php
      }
      ?>
    </ul>

  </div>

  
  </div>
</header>
<style>
  .cart-notice {
  position: absolute;
  padding: 2px 7px;
  font-size: 1.4rem;
  line-height: 1.4rem;
  border-radius: 10px;
  border: 2px solid #ff929b;
  color: var(--primary-color);
  background-color: var(--white-color);
  top: -8px;
  right: -8px;
}
  .menu-item2 {
  position: relative;
  width: 150px;
}
.menu-item2 .login {
  display: block;
  width: 150px;
  border-radius: 50px;
  padding: 10px 30px;
  background-color: #ff929b;
  text-decoration: none;
  font-size: 1.4rem;
  border: 1px solid #ff929b;
  color: var(--white-color);
}

</style>