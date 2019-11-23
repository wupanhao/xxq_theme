<?php
get_header();
?>
<?php
// the_time('Y年n月j日');
?>
<div class="my-article">
  <div class="article-cat">所属栏目：

<?php
// echo get_category_parents( TRUE, ' &raquo; ');
$cats = get_the_category()  ;

for ($i=0; $i < count($cats); $i++) {
	if($i > 0 )
		echo '、';
	echo '<a class="navi-cat" href="' . get_category_link($cats[$i]->cat_ID) . '">'. $cats[$i]->cat_name .'</a>';
}
?>
</div>
      <span class="article-title"><?php the_title(); ?></span>
      <span class="article-time">发布时间：<?php the_time('Y年n月j日') ?></span>
     <?php if(function_exists('the_views')) { echo '<span class="zhengwendate">浏览次数：'; the_views(); echo '</span>'; } ?>
<div class="article-content">

<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>

<?php 
if (in_category(array('4jwkl'))    ) :
  echo '<div style="display:none;">';
  the_content(); 
  echo '</div>';
?>
<!--sectionWrap开始-->
    <div class="sectionWrap">
      <div class="articleList01">
       <!-- <div class="listTitle01"><h2><a href="#">Title</a></h2></div> -->
        <div class="Album">
          <div id="slider" class="flexslider">
            
          <div class="flex-viewport" style="overflow: hidden; position: relative;">
            <ul id="slides1" class="slides" style="width: 3200%; transition-duration: 0s; transform: translate3d(-4604px, 0px, 0px);">
<!--               <li class="" style="width: 1151px; float: left; display: block;"><img src="./assets/20190521165244025792.jpg" draggable="false">
                <div class="slideTitle02"><a target="_blank"><h3> Title </h3><p>Text </p></a></div>
              </li> -->
            </ul>
          </div>
          <ul class="flex-direction-nav">
            <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li>
            <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li>
          </ul>
          
        </div>
        <div id="carousel" class="flexslider">
          <div class="flex-viewport" style="overflow: hidden; position: relative;">
            <ul id="slides2" class="slides" style="width: 3200%; transition-duration: 0s; transform: translate3d(-1108px, 0px, 0px);">
             <!-- <li class="" style="width: 269px; float: left; display: block;"><img src="./assets/20190521165244025792.jpg" draggable="false"></li> -->
            </ul>
          </div>
          <ul class="flex-direction-nav">
            <li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li>
            <li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div>
        </div>
      </div>
   </div>
<!--sectionWrap结束-->
<script src="<?php bloginfo('template_url');?>/assets/js/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url');?>/assets/js/script.js" type="text/javascript"></script>
<!-- <script type="text/javascript" src="./assets/jquery-1.12.0.min.js"></script> -->
<script type="text/javascript">
  console.log($("div.article-content img"))
  var imgs = $("div.article-content img")
  var html1 = ""
  var html2 = ""
  for (var i = 0 ; i < imgs.length ; i++) {
    html1 += '<li class="" style="max-width: 1151px; float: left; display: block;"><img src="' + imgs[i].src + '" srcset="'+imgs[i].srcset+'" draggable="false">' 
    html2 += '<li class="" style="max-width: 269px; float: left; display: block;"><img src="' + imgs[i].src + '" srcset="'+imgs[i].srcset+'" draggable="false"></li>'
  }
  $("#slides1")[0].innerHTML = html1
  $("#slides2")[0].innerHTML = html2
  console.log($("#slides1"))
</script>
<script type="text/javascript">
$(function() {
    mobideMenu()// 移动端主导航
    listWidth()
  $(window).resize(function() {
    listWidth()
  });
  function listWidth(){
    var winWidth = $(window).width();
    if(winWidth <= 480) {
      x = 100;
      y = 5;
    } else if(winWidth <= 768) {
      x = 140;
      y = 5;
    }else if(winWidth <= 1230) {
      x = 200;
      y = 8;
    } else {
      x = 269;
      y = 8;
    }
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: x,
        itemMargin: y,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel"
      });
  }
}); 
</script>
<?php else :
  the_content(); 
endif;
?>

 <?php else : ?>
    <div class="errorbox">
        没有文章！
    </div>
<?php 
endif; 
?>

</div>
<br>
</div>

<?php
get_footer();
?>