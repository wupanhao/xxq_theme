<?php
get_header();
$pages = array('联系我们','机构设置');
$pages2 = array('基建处工作职责','新校区建设指挥部工作职责');
?>
<?php
// the_time('Y年n月j日');
?>
<?php 
  if(in_array(get_the_title(),$pages)){
?>
  <img  class="top-img" src="<?php echo home_url();?>/wp-content/uploads/2018/category/<?php echo get_the_title();?>.png">
<?php  
  }else if(in_array(get_the_title(),$pages2)){
?>
  <img  class="top-img" src="<?php echo home_url();?>/wp-content/uploads/2018/category/部门介绍.png">
<?php
}
?>
<div class="my-article">
<span class="article-title"><?php the_title(); ?></span>
<?php if(function_exists('the_views')) { echo '<span class="zhengwendate">浏览次数：'; the_views(); echo '</span>'; } ?>

<div class="article-content">
</p>

<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
<?php the_content(); ?>

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