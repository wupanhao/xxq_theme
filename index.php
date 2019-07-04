<?php
get_header();
?>


<div class="row">
  <div   class="bxslider-top">
    <div  id="bxslider-top" height="320" >
<?php
$posts_array = get_posts_by_cat_name( 'slider' , 15); ?>
<?php
foreach ($posts_array as $post) {
  if ( has_post_thumbnail() ) {
      echo '<div> <a title="';
      the_title();
      echo '" href="';
      the_permalink();
      echo '"> ';
    // echo '<img src="';
    the_post_thumbnail(array(400,300));
    // echo '" alt="" title="';
    // the_title();
    // echo '" />';
    echo '</a></div>';
  }
}
?>
      <!-- <div> <img   src="wp-content/uploads/2018/slider/5.jpg" alt="" title="1114441" /></div> -->
    </div>
  </div>

<?php
$posts_array = get_posts_by_cat_name( 'xwdt' , 10); 
?>
    <div class="card-top">
      <div class="card-title">
        <span>新闻动态</span>
        <span ><a href="<?php echo get_category_link(get_category_by_slug('xwdt')->cat_ID); ?>">更 多 »</a></span>
      </div>
      <div class="card-content ">
        <ul class="ul-list">
<?php 
foreach ($posts_array as $post) { 
?>
          <li class="list-item"><a class="normal_link long_link" href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title();?>"><?php the_title();?></a><span class="newtime"><?php the_time('Y年m月d日') ?>&nbsp;</span></li>
<?php 
} 
?>
        </ul>
      </div>
    </div>
</div>

<div class="main-content">
<?php

$cat_names = ['tzgg','xqjs','lzjy','dqgz
','gzzd','tssd'];
$lgly = get_category_by_slug('1lgly');
$fhnc = get_category_by_slug('2fhnc');
$zrsy = get_category_by_slug('3zrsy');
$jwkl = get_category_by_slug('4jwkl');
$categories = get_categories_by_names($cat_names);
for ($i=0; $i < count($categories); $i++) {
?>  
    <div class="card">
      <div class="card-title">
        <span><?php echo $categories[$i]->cat_name; ?></span>
        <span ><a class="top_link" href="<?php echo get_category_link($categories[$i]->cat_ID); ?>">更 多 »</a></span>
      </div>
      <div class="card-content ">
        <ul class="ul-list">
<?php
?>
<?php
/*

  if($posts_array){
    $post = $posts_array[0];
    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
      echo '<a href="';
      the_permalink();
      echo '"> ';

      echo '<div width="150" height="100" class="newspic1"> ';
      the_post_thumbnail(array(100,100));
      echo '</div></a>';


      echo '<div class="jianshu">';
      echo '<h3><a href="';
      the_permalink();
      echo '">';
      the_title();
      echo '</a></h3>';
      echo '</div>';
    }
  }
    */

  if($categories[$i]->cat_name == '图说师大'){
  $posts_array = get_posts_by_cat_id($categories[$i]->cat_ID,1);

   ?>
  <li class="list-item"><a class="normal_link short_link" href="<?php echo get_category_link($lgly->cat_ID); ?>" target="_blank" title="<?php echo $lgly->cat_name ;?>"><?php echo $lgly->cat_name ;?></a></li>
  <li class="list-item"><a class="normal_link short_link" href="<?php echo get_category_link($fhnc->cat_ID); ?>" target="_blank" title="<?php echo $fhnc->cat_name ;?>"><?php echo $fhnc->cat_name ;?></a></li>
  <li class="list-item"><a class="normal_link short_link" href="<?php echo get_category_link($zrsy->cat_ID); ?>" target="_blank" title="<?php echo $zrsy->cat_name ;?>"><?php echo $zrsy->cat_name ;?></a></li>
  <li class="list-item"><a class="normal_link short_link" href="<?php echo get_category_link($jwkl->cat_ID); ?>" target="_blank" title="<?php echo $jwkl->cat_name ;?>"><?php echo $jwkl->cat_name ;?></a></li>
    <?php 
  } 
  else
    $posts_array = get_posts_by_cat_id($categories[$i]->cat_ID,5);
   ?>

<?php
  foreach ($posts_array as $post) {
?>
        <li class="list-item"><a class="normal_link short_link" href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title();?>"><?php the_title();?></a></li>
<?php 
  } 
?>
        </ul>
      </div>
    </div>
<?php 
} 
?>    
</div>


<div class="card">
  <div class="card-title">建设掠影</div>
          <div  id="bxslider-bottom" class="card-content">
<?php

$posts_array =get_posts_by_cat_name('album',55); ?>

<?php
foreach ($posts_array as $post) {
  if ( has_post_thumbnail() ) {
      echo '<div> <a title="';
      the_title();
      echo '" href="';
      the_permalink();
      echo '"> ';
    // echo '<img src="';
    the_post_thumbnail(array(200,150));
    // echo '" alt="" title="';
    // the_title();

    // echo '" />';
    echo '</a></div>';
  }
}
?>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#bxslider-top').bxSlider({
      auto: true,
      // autoControls: true,
      stopAutoOnClick: true,
      minSlides:1,
      pager: true,
      touchEnabled: false,
      captions: true,
      slideWidth: 400
    });
    $('#bxslider-bottom').bxSlider({
        slideWidth: 180,
        minSlides: 1,
        maxSlides: 6,
        moveSlides: 1,
        startSlide: 1,
        controls:true,
        stopAutoOnClick: true,
        touchEnabled: false,
        // captions: true,
        slideMargin: 10,
        pager:false,
        auto: true
      });
  });
</script>



<script type="text/javascript">
  function len(str) {
    //console.log(typeof str)
    if (str == null) return 0;
    if (typeof str != "string"){
        str += "";
      }
    return str.replace(/[^\x00-\xff]/g,"01").length;
     // return str.replace(/[\u0391-\uFFE5]/g,"aa").length;
}

  var titles = document.getElementsByClassName('short_link');
  for (var i = titles.length - 1; i >= 0; i--) {
    if(titles[i].innerText.length > 20 )
      titles[i].innerText = titles[i].innerText.substr(0,21)+'...';
  }

    var titles = document.getElementsByClassName('long_link');
  for (var i = titles.length - 1; i >= 0; i--) {
    if(titles[i].innerText.length > 30 )
      titles[i].innerText = titles[i].innerText.substr(0,31)+'...';
  }
  </script>

<?php
get_footer();
?>