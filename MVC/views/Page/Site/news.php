<style>
  #content-error {
    font-size: 1.6rem;
  }
  @import url('https://fonts.googleapis.com/css2?family=Dosis&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=M+PLUS+1&display=swap');
        /* Add your CSS styles here */
        .news-item {
            position:relative;
            width: 50%;
            margin:10px auto;
            border: 1px solid #ddd;
            padding: 20px;
            font-family: 'M PLUS 1', sans-serif;
            border-radius: 10px;
        }
        .news-item h2{
            padding: 10px 0px;
            font-family: 'Dosis', sans-serif;
        }
        .news-item img {
            max-width: 100%;
            border-radius: 10px;
            height: 40vh;
        }
        .read-more-content {
            display: block;
        }
        .container-btn-like{
            
            display: flex;
            left: 25px;
            bottom: 0px;
        }
        .like-btn{
            border: 0;
            background:none;
            
        }
        .read-more-btn{
            position: absolute;
            right: 10px;
            bottom: 10px;
            border-radius: 10px;
            padding: 0px 10px;
            border:1px solid white;
            background-color: orange;
        }
        #news-container{
            margin: 40px auto;
        }
        .calendar{
            display: flex;
            align-items: center;
            gap:5px;
        }
        .tag-news img{
            position: absolute;
            width: 100px;
            height: 30px;
            top: 30px;
            right: 30px;
        }
       
</style>
<div class="banners">
    <img src="http://localhost/DuAn1/MVC/public/images/bg-con.png" alt="">
    <div class="banner-texts">
      <h1 class="text-black">Tin Tức</h1>
      <p class="text-red">sức khỏe - xu hướng - đổi mới</p>
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

<div id="news-container">
    <?php
    
          while ($news = mysqli_fetch_array(($data['ShowNews']))) {
          ?>
         
           <div class="news-item" data-id="<?= $news['id'] ?>">
            <div><img src="<?= BASE_URL ?>/<?= $news['image'] ?>" alt="News Image"></div>
            <div class="tag-news"><img src="http://localhost/DuAn1/MVC/public/images/metacoffee.png"></div>
            <div><h2><?= $news['title'] ?></h2></div>
             <div class="calendar">
             <div><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="red" d="M19 3h-1V1h-2v2H8V1H6v2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14c1.11 0 2-.89 2-2V5c0-1.11-.89-2-2-2m0 16H5V9h14v10m0-12H5V5h14M7 11h5v5H7"/></svg></div>
             <div><?= $news['created_at'] ?></div>  
             </div> 
             <div class="container-btn-like">
                <div class="read-more-content"><?= $news['content'] ?></div>
            </div>
            
           
    </div>
    
<?php
          }
          ?>