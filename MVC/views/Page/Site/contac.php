<style>
     @import url('https://fonts.googleapis.com/css2?family=M+PLUS+1&display=swap');
    .container-contac{
        width:50%;
        text-align: left;
        font-family: 'M PLUS 1', sans-serif;
        padding: 40px;
        line-height: 40px;
    }
    .container-contac p{
       font-size: 19px;
    }
    .con-contact{
        width:100%;
        display:flex;
    }
    .contac-right{
        width: 50%;
        height:40vh;
    }
    .contac-right img{
        width: 90%;
        height:90%;
        padding:10px 0px;
        border-radius: 10px;
    }
</style>
<!-- <div class="bn_profile">
        <h3>MetaCoffee</h3>
        <h4>Chúng tôi sinh ra để giúp bạn có những thức uống thơm ngon - tiện lợi - tiết kiệm</h4>
    </div> -->
    <div class="banners">
    <img src="http://localhost/DuAn1/MVC/public/images/bg-con.png" alt="">
    <div class="banner-texts">
      <h1 class="text-black">Liên Hệ</h1>
      <p class="text-red">Bạn cần tôi có - nhanh chóng - trách nhiệm</p>
      <form action="<?= BASE_URL ?>/home/search" method="POST" id="search-bn">
        <i class="fas fa-search search-bn"></i>
        <input name="search" class="search-sp" type="text" placeholder="Tìm đồ ăn hoặc nước uống mà bạn thích...">
      </form>
    </div>
  </div>
  <div class="featured-product__title">
                <div class="icon-bottom-title" style="padding:50px;">
                <img src="http://localhost/DuAn1/MVC/public/images/metacoffee.png">
                </div>
                <div class="icon-bottom-title" style="padding-bottom:60px;">
                <img src="http://localhost/DuAn1/MVC/public/images/home_line.webp">
                </div>
            </div>
    <div class="con-contact">
    <form class="container-contac">
        <h1>LIÊN HỆ VỚI CHÚNG TÔI</h2>
        <div style="width:100px;height:3px;background-color:#39a6cf;border-radius:10px;"></div>
        <h2>MetaCoffee</h2>
        <p>Địa chỉ : <span>470 Đ. Trần Đại Nghĩa, Khu đô thị FPT, Ngũ Hành Sơn, Đà Nẵng 550000</span></p>
        <p>Điện thoại : <span>0905752450</span></p>
        <p>Email : <span>metacoffee@gmail.com</span></p>
    </form>
    <div class="contac-right">
        <img src="http://localhost/DuAn1/MVC/public/images/ps-contac.png">
    </div>
    </div>
