  
<div id="fh5co-main" >
  <!-- 导航栏 -->
  <div class="pet_mian" >
    <div class="pet_head">
      <header data-am-widget="header" class="am-header am-header-default pet_head_block">
        <div class="am-header-left am-header-nav ">
          <a href="<?php $url = "Update/update/".$tag;echo site_url($url);?>" class="iconfont pet_head_jt_ico">&#xe601;</a>
        </div>
      </header>
    </div>
  </div>
  <!-- 正文内容 -->
  <div class="pet_content">
    <div class="pet_content_block">
      <article data-am-widget="paragraph" class="am-paragraph am-paragraph-default pet_content_article" data-am-paragraph="{ tableScrollable: true, pureview: true }">
        <h1 class="pet_article_title" align="center"><?php echo $title;?></h1>
        <div class="pet_article_user_ico"><img src=<?php echo base_url('image/1.jpg');?> ></div>
        <div class="pet_article_user_time"><?php echo ' '.$author.' '.$date;?>
        </div>
        <div class="pet_article_user_block">
          <?php echo $body;?>
        </div>
      </article>
      <ul class="like_share_block">

      </ul>
    </div>
  </div>


  <div class="pet_article_like">
    <div class="pet_article_like_title">猜你喜欢
    </div>
    <div class="pet_content_main pet_article_like_delete">
      <div data-am-widget="list_news" class="am-list-news am-list-news-default am-no-layout">
        <div class="am-list-news-bd">
          <ul class="am-list">
           <!--缩略图在标题右边-->
         </ul>
       </div>

     </div>
   </div>
 </div>



 <div class="pet_article_footer_info">Copyright(c)2017 新闻之窗 All Rights Reserved</div>
</div>
<script>
  $(function(){
    // 隐藏适应性变化的nav
    $('#nav').hide();
    // 动态计算新闻列表文字样式
    auto_resize();
    $(window).resize(function() {
      auto_resize();
    });
    $('.am-list-thumb img').load(function(){
      auto_resize();
    });
    $('.pet_article_like li:last-child').css('border','none');
    function auto_resize(){
      $('.pet_list_one_nr').height($('.pet_list_one_img').height());
    }
    $('.pet_article_user').on('click',function(){
      if($('.pet_article_user_info_tab').hasClass('pet_article_user_info_tab_show')){
        $('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_show').addClass('pet_article_user_info_tab_cloes');
      }else{
        $('.pet_article_user_info_tab').removeClass('pet_article_user_info_tab_cloes').addClass('pet_article_user_info_tab_show');
      }
    });

    var tag = "<?php echo $tag;?>";
    switch(tag){
      case "head": $('#head').addClass("fh5co-active");break;
      case "native": $('#native').addClass("fh5co-active");break;
      case "world": $('#world').addClass("fh5co-active");break;
      case "eco": $('#eco').addClass("fh5co-active");break;
      case "sports": $('#sports').addClass("fh5co-active");break;
      case "ent": $('#ent').addClass("fh5co-active");break;
      case "war": $('#war').addClass("fh5co-active");break;
      case "car": $('#car').addClass("fh5co-active");break;
      case "tech": $('#tech').addClass("fh5co-active");break;
      case "society": $('#society').addClass("fh5co-active");break;
    };

    $("nav ul li[class!='fh5co-active']").mouseenter(function(){
      $(this).addClass("fh5co-active");
    });
    $("nav ul li[class!='fh5co-active']").mouseleave(function(){
      $(this).removeClass("fh5co-active");
    });

  });
</script>
</body>
</html>