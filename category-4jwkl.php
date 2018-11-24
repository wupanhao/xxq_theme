<?php

get_header();


$cat_ID = get_query_var('cat');
$current_cat = get_category($cat_ID);
$root_ID = get_category_root_id( $cat_ID);
$root_cat = get_category($root_ID);

$cats = array('dqgz','fwzn','ghsj','gzzd','jjcx','lzjy','tssd','tzgg','xwdt','xqjs');

?>

<?php 
if(in_array($root_cat->slug,$cats)){
?>
  <img  class="top-img" src="<?php echo home_url();?>/wp-content/uploads/2018/category/<?php echo $root_cat->slug;?>.png">
<?php  
} 
?>
<div class="row">

<?php

// var_dump($root_cat);
    $args=array(
          'parent'=> $root_ID ,
          'orderby' => 'slug',
          'hide_empty'=>0
          );
    $sub_categories = get_categories($args);
    if($sub_categories){
?>
  
         <ul class="sub-nav">
<?php

    foreach ($sub_categories as $sub) {
      # code...
      // var_dump($sub);
      if($current_cat->slug == $sub->slug):
?>
<li><a class="active sub-nav-item" href="<?php echo get_category_link($sub->cat_ID); ?>"><?php echo  $sub->cat_name; ?></a></li>
<?php
else:
?>
<li><a class="sub-nav-item" href="<?php echo get_category_link($sub->cat_ID); ?>"><?php echo  $sub->cat_name; ?></a></li>

<?php
endif;
}

?>
<!-- <li id="redlist_rsc">免费师范生教育</li> -->
    </ul>

<?php
    }
?>
   
<div class="card-top">
  <div class="card-title card-title-start ">
<?php 
if($root_cat)
  echo '<a class="navi_cat" href="'.get_category_link($root_cat->cat_ID).'">'.$root_cat->cat_name.'</a>  >>  ';
?>

<?php 
if($root_ID != $cat_ID) 
  single_cat_title(); 
?>
</div>


<?php

// $category = get_the_category();
// var_dump($category);
  $pageid = 1;

if($_GET && $_GET['pageid'])
    $pageid = (int)$_GET['pageid'];

$cat_ID = get_query_var('cat');
// var_dump($pageid);
if($pageid < 1)
  $pageid = 1;
$num = 10;

$count = get_cat_postcount($cat_ID);
// echo $count;

$pages = ceil($count/$num) ;

// var_dump(par_pagenavi($num));

$posts_array = get_posts_by_cat_id( $cat_ID,$num , $num*($pageid-1));

$page_links = par_pagenavi($num);

// $wp_query = new WP_Query( $args );
// echo paginate_links(array(
//     'prev_next'          => 0,
//     'before_page_number' => '',
//     'mid_size'           => 2,
// ));
// wp_reset_postdata();

// var_dump($the_query);

?>
<style type="text/css">

.campus-list{
  display: flex;
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  flex-wrap: wrap;
}

.campus-item{
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

.campus-img img{
  width: 300px;
  height: 200px;
}

.page_links a{
  font-size: 16px;
  padding: 4px;
}
.posts-nav{ 
  font-size: 14px;
  color:rgba(0,0,0,0.44);
  padding:10px 0;
  display: flex;
  align-items: center;
  flex-direction: row;
  justify-content: center;
}
.posts-nav .page-numbers{
  border-radius: 3px;
  border:1px solid rgba(0, 0, 0, 0.15);
  display: inline-block;
  text-align: center;
  width: 30px;
  line-height:30px;
  margin:0 5px;
}
.posts-nav .page-numbers.current,.posts-nav .page-numbers:not(.dots):hover{ 
  background: #3b5998;
  border-color: #3b5998;
  color:#fff;
}
.posts-nav .page-numbers.dots{
  border-color:rgba(0,0,0,0);
}


</style>
<ul class="campus-list" >

<?php
foreach ($posts_array as $post) {
// echo $p->ID;
 // var_dump($p);


  if ( has_post_thumbnail() ) {
 ?>

<li class="campus-item">
  <a href="<?php the_permalink(); ?>">
    <span class="campus-img"><?php the_post_thumbnail(array(300,200));?></span>
  </a>
  <span class="campus-title"><?php the_title();?></span>
  </li>

 <?php
    } //end if

  }  // end foreach
  ?>
   </ul>



  <div class="posts-nav">

    <?php
    // var_dump($page_links);
    $page_html = "";
    foreach ($page_links as $id => $link) {
      # code...
      if($pageid == $id)
          $page_html.='<a class="page-numbers current">'.$id.'</a>';
        else
          $page_html.='<a href="'.$link.'" class="page-numbers">'.$id.'</a>';
    }

    echo $page_html;
    // var_dump($page_html);
    ?>
    </div>
  </div>
</div>

<?php
get_footer();
?>