		<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
			<a href="<?php echo site_url('Update/update/$tag');?>" title="">
				<img class="am-gotop-icon-custom" src="<?php echo base_url('image/goTop.png');?>">
			</a>
		</div>
		<div id="fh5co-main" >
			<aside id="fh5co-hero" class="js-fullheight">
				<div class="flexslider js-fullheight">
					<ul class="slides">
						<!-- 滑动窗口	 -->			
						<?php for ($i=0;$i<7;++$i){ ?>
						<div hidden>
							<?php echo form_open('getNews'); ?>

							<input type="input" name="title" value="<?php echo $news[$i]['title']; ?>"/><br />
							<input type="input" name="author" value="<?php echo $news[$i]['author']; ?>"><br />
							<input type="input" name="date" value="<?php echo $news[$i]['date']; ?>"/><br />
							<input type="input" name="tag" value="<?php echo $tag; ?>"/><br />
							<textarea name="body"><?php echo $news[$i]['body']; ?></textarea><br />

							<input type="submit" name="submit" id="<?php echo $i.'_submit'; ?>"/>

						</form>
					</div>
					<li style="background-image: url('<?php echo base_url('image/img_'.$i.'.jpg');?>');">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
									<div class="slider-text-inner">
										<h1><strong><?php echo $news[$i]['title']; ?></strong></h1>
										<h2><strong><?php echo $news[$i]['author']; ?></strong></h2>
										<p>
											<a class="btn btn-primary btn-demo popup-vimeo">
												<i class="icon-time"></i><?php echo $news[$i]['date']; ?>
											</a> 
											<a href="javascript:;" onclick= "send('<?php echo $i; ?>')" class="btn btn-primary btn-learn">More
												<i class="icon-arrow-right3"></i>
											</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</aside>
		<div class="pet_content_main">
			<div data-am-widget="list_news" class="am-list-news am-list-news-default" >
				<div class="am-list-news-bd">
					<ul class="am-list" id="list">
						<!-- 新闻陈列模式 -->
						<?php for ($i=7; $i< 50;++$i){ ?>
						<div hidden>
							<?php echo form_open('getNews'); ?>

							<input type="input" name="title" value="<?php echo $news[$i]['title']; ?>"/><br />
							<input type="input" name="author" value="<?php echo $news[$i]['author']; ?>"><br />
							<input type="input" name="date" value="<?php echo $news[$i]['date']; ?>"/><br />
							<input type="input" name="tag" value="<?php echo $tag; ?>"/><br />
							<textarea name="body"><?php echo $news[$i]['body']; ?></textarea><br />

							<input type="submit" name="submit" id="<?php echo $i.'_submit'; ?>"/>

						</form>
					</div>
					<?php if (empty($news[$i]['image_url'])): ?>
						<li class="am-g am-list-item-desced pet_list_one_block">
							<div class="pet_list_one_info">
								<div class="pet_list_one_info_l">
									<div class="pet_list_one_info_ico"><img src="<?php echo base_url('image/1.jpg');?>" alt=""></div>
									<div class="pet_list_one_info_name"><?php echo $news[$i]['date']; ?></div>
								</div>
								<div class="pet_list_one_info_r">
									<div class="pet_list_tag pet_list_tag_mzt"><?php echo $news[$i]['author']; ?></div>
								</div>
							</div>
							<div class=" am-list-main">
								<h3 class="am-list-item-hd pet_list_one_bt" id="list_title"><a href="javascript:;" onclick="send('<?php echo $i;?>')"><?php echo $news[$i]['title']; ?></a></h3>


								<div class="am-list-item-text pet_list_two_text"><?php echo mb_substr(trim(strip_tags($news[$i]['body'],'<p>')), 0, 200); ?></div>

							</div>
						</li>
					<?php else :?>
						<?php $image_urls = explode(",", $news[$i]['image_url'],-1);$num= count($image_urls);?>
						<?php if ($num > 3) :?>
							<li class="am-g am-list-item-desced pet_list_one_block">
								<div class="pet_list_one_info">
									<div class="pet_list_one_info_tytj"><i class="iconfont pet_nav_kantuya pet_more_list_block_line_ico pet_list_tytj_ico">&#xe607;</i><a href="javascript:;" onclick="send('<?php echo $i;?>')" ><?php echo $news[$i]['title']; ?></a></div>
									<div class="pet_list_one_info_r">
										<div class="pet_list_tag pet_list_tag_kty">"><?php echo $news[$i]['author']; ?></div>
									</div>
								</div>
								<div class=" am-list-main">
									<ul data-am-widget="gallery" class="am-gallery am-avg-sm-3 am-avg-md-3 am-avg-lg-3 am-gallery-default pet_list_one_list pet_list_one_tytj" >
										<?php foreach ($image_urls as $image_url): ?>
											<li>
												<div class="am-gallery-item">
													<a>
														<img src="<?php echo $image_url?>"  alt="某天 也许会相遇 相遇在这个好地方"/>
													</a>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</li>
						<?php else :?>

							<li class="am-g am-list-item-desced pet_list_one_block">
								<div class="pet_list_one_info">
									<div class="pet_list_one_info_l">
										<div class="pet_list_one_info_ico"><img src="<?php echo base_url('image/1.jpg');?>" alt=""></div>
										<div class="pet_list_one_info_name"><?php echo $news[$i]['date']; ?></div>
									</div>
									<div class="pet_list_one_info_r">
										<div class="pet_list_tag pet_list_tag_stj"><?php echo $news[$i]['author']; ?></div>
									</div>
								</div>
								<div class=" am-list-main">
									<h3 class="am-list-item-hd pet_list_one_bt"><a herf="javascript:;" onclick="send('<?php echo $i;?>')"><?php echo $news[$i]['title']; ?></a></h3>
									<ul data-am-widget="gallery" class="am-gallery am-avg-sm-3 am-avg-md-3 am-avg-lg-3 am-gallery-default pet_list_one_list" >
										<?php foreach ($image_urls as $image_url): ?>
											<li>
												<div class="am-gallery-item">
													<a>
														<img src="<?php echo $image_url?>"  alt="某天 也许会相遇 相遇在这个好地方"/>
													</a>
												</div>
											</li>
										<?php endforeach; ?>
									</ul>
									<div class="am-list-item-text pet_list_two_text"><?php echo mb_substr(trim(strip_tags($news[$i]['body']),'<p>'), 0, 100); ?>
									</div>
								</div>
							</li>
						<?php endif; ?>
					<?php endif; ?>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	$(document).ready(function(){
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
    auto_resize();// 动态计算新闻列表文字样式
    $(window).resize(function() {
    	auto_resize();
    });
    $('.am-list-thumb img').load(function(){
    	auto_resize();
    });

    $('.am-list > li:last-child').css('border','none');
    function auto_resize(){
    	$('.pet_list_one_nr').height($('.pet_list_one_img').height());

    }

    $("nav ul li[class!='fh5co-active']").mouseenter(function(){
    	$(this).addClass("fh5co-active");
    });
    $("nav ul li[class!='fh5co-active']").mouseleave(function(){
    	$(this).removeClass("fh5co-active");
    });

});

</script>

<!-- jQuery -->
<script src="<?php echo base_url('js/jquery.min.js');?>"></script>
<!-- jQuery Easing -->
<script src="<?php echo base_url('js/jquery.easing.1.3.js');?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
<!-- Waypoints -->
<script src="<?php echo base_url('js/jquery.waypoints.min.js');?>"></script>
<!-- Flexslider -->
<script src="<?php echo base_url('js/jquery.flexslider-min.js');?>"></script>
</body>
</html>