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
	echo '<a href="' . get_category_link($cats[$i]->cat_ID) . '">'. $cats[$i]->cat_name .'</a>';
}
?>
</div>

      <span class="article-title"><?php the_title(); ?></span>
      <span class="article-time">发布时间：<?php the_time('Y年n月j日') ?></span>
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