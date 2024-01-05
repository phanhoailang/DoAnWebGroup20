<style>
    @import url('https://fonts.googleapis.com/css2?family=M+PLUS+1&display=swap');
    .body{
        margin: 0 auto;
    }
    .bn_profile{
        position: relative;
        background-image: url(http://localhost/DuAn1/MVC/public/images/bg-con.png);
        width: 100%;
        height: 25vh;
        margin: 0 auto;
        text-align: center;
        font-family: 'M PLUS 1', sans-serif;
    }
    .bn_profile h3{
    padding-top: 5vh;
       font-size: 40px;
    }
    .text_profile p{
       font-size: 13px;
    }
    .container-profile{
        margin: 10px auto;
        width: 100%;
        display: flex;
        font-family: 'M PLUS 1', sans-serif;
    }
    .img_text_profile{
        width: 50%;
        min-height: 30vh;
        padding: 30px;
       
        
    }
    .img_text_profile img{
        width: 100%;
        height:40vh ;
        border-radius: 10px;
    }
    .text_profile{
        width: 50%;
        min-height: 30vh;
        padding: 30px;
    }
</style>

    
    <div class="banners">
    <img src="http://localhost/DuAn1/MVC/public/images/bg-con.png" alt="">
    <div class="banner-texts">
      <h1 class="text-black">Giới thiệu</h1>
      <p class="text-red">thơm ngon - tiện lợi - tiết kiệm</p>
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
    <form class="container-profile">
        <div class="img_text_profile"><img src="http://localhost/DuAn1/MVC/public/images/profile2.jpg"></div>
        <div class="text_profile">
        <h3>MetaCoffee - Nơi Hẹn Hò Virtual Của Những Tách Đồ Uống Đặc Biệt</h3>   
        <div style="width:60%;height:2px;margin:10px 0px;background-color:red;border-radius:10px;"></div>
       
        <p>
        Cuộc sống hối hả ngày nay khiến cho việc thư giãn trở nên quan trọng hơn bao giờ hết. Trong không gian ảo hiện đại, MetaCoffee đã xuất hiện như một người bạn đồng hành tuyệt vời, mang lại trải nghiệm đặt đồ uống trực tuyến một cách thuận tiện và thú vị.
        Với giao diện thân thiện và đẹp mắt, MetaCoffee không chỉ là nơi đặt đồ uống mà còn là không gian gặp gỡ và trò chuyện trực tuyến. Bạn có thể chọn từ danh sách đa dạng các loại cà phê, trà sữa, và đồ uống khác, từ mỗi góc độ của thế giới.
        Đặc biệt, MetaCoffee cung cấp tính năng "Custom Blend" cho phép bạn tạo nên công thức độc đáo cho riêng mình. Bạn có thể chọn loại cà phê, đường, sữa và thậm chí là hương vị để tận hưởng một ly đồ uống hoàn toàn cá nhân.
        Không chỉ dừng lại ở việc đặt đồ uống, MetaCoffee còn tổ chức các sự kiện trực tuyến như hội thảo về nghệ thuật pha chế, giúp bạn hiểu rõ hơn về thế giới đa dạng và phong phú của đồ uống.
        Hãy tham gia cùng chúng tôi tại MetaCoffee, nơi hội tụ yêu thích đồ uống và những trò chuyện ấn tượng, giúp bạn thư giãn mà không cần phải rời khỏi góc nhà của mình.
        </p>
        </div>
    </form>
    <form class="container-profile">
        <div class="text_profile">
        <h3>MetaCoffee - Giá trị mang đến cho khách hàng</h3>
        <div style="width:40%;height:3px;margin:10px 0px;background-color:yellow;border-radius:10px;"></div>
          
        <p>
        MetaCoffee không chỉ là nơi để đặt đồ uống, mà còn là một cộng đồng đam mê đồ uống, nơi mà chúng ta chia sẻ và kết nối thông qua niềm đam mê chung. Cùng với sự thoải mái và tiện lợi, MetaCoffee mang đến cho bạn những giá trị đặc biệt.

        Sự Sáng Tạo: MetaCoffee khuyến khích sự sáng tạo trong mỗi tách đồ uống. Bạn có thể thử nghiệm và tạo ra những hương vị mới, độc đáo, và chia sẻ công thức tới cộng đồng.

        Giao Lưu Đa Văn Hóa: Với đa dạng người dùng từ khắp nơi trên thế giới, MetaCoffee là nơi giao lưu văn hóa, nơi mà bạn có thể tìm hiểu về truyền thống pha chế và thưởng thức đồ uống từ mọi quốc gia.

        Trải Nghiệm Độc Đáo: MetaCoffee không chỉ là một trang web đặt đồ uống, mà là một trải nghiệm độc đáo mà bạn không thể tìm thấy ở bất kỳ đâu khác. Từ việc chọn đồ uống đến tham gia các sự kiện trực tuyến, bạn luôn có cơ hội trải nghiệm cái mới mẻ.

        Hỗ Trợ Cộng Đồng: MetaCoffee cam kết hỗ trợ các nhà pha chế địa phương và những doanh nghiệp nhỏ bằng cách giới thiệu sản phẩm của họ. Chúng tôi tin rằng sự hỗ trợ cộng đồng là chìa khóa để xây dựng một cộng đồng đồ uống bền vững và phát triển.

        Với những giá trị này, MetaCoffee không chỉ là nơi để thưởng thức đồ uống mà còn là điểm đến tuyệt vời cho những người yêu thích sự sáng tạo và mong muốn chia sẻ niềm đam mê của mình với cộng đồng toàn cầu. </div>
        <div class="img_text_profile"><img src="http://localhost/DuAn1/MVC/public/images/profile1.jpg"></div>
    </form>