<?php
/**********************************************************************************
wpmu_theme_support - adds theme support for post formats, post thumbnails, HTML5 and automatic feed links
**********************************************************************************/
function wpmu_theme_support() {

  /* post formats */
  // add_theme_support( 'post-formats', array( 'aside', 'quote' ) );

  /* post thumbnails */
  add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

  /* HTML5 */
  // add_theme_support( 'html5' );

  /* automatic feed links */
  // add_theme_support( 'automatic-feed-links' );

}

function get_posts_by_cat_name($name,$num=5,$offset=0){

	$args = array(
  'posts_per_page'   => $num,
  'offset'           => $offset,
  // 'category'         => $cat_ID,
  'category_name'    => $name,
  'orderby'          => 'date',
  'order'            => 'DESC',
  // 'include'          => '',
  // 'exclude'          => '',
  // 'meta_key'         => '',
  // 'meta_value'       => '',
  'post_type'        => 'post',
  // 'post_mime_type'   => '',
  // 'post_parent'      => '',
  // 'author'     => '',
  // 'author_name'    => '',
  'post_status'      => 'publish',
  'suppress_filters' => true
);

$posts_array= get_posts( $args );
return $posts_array;

}


function get_posts_by_cat_id($id,$num=5,$offset=0){
	$args = array(
  'posts_per_page'   => $num,
  'offset'           => $offset,
  'category'         => $id,
  // 'category_name'    => $name,
  'orderby'          => 'date',
  'order'            => 'DESC',
  // 'include'          => '',
  // 'exclude'          => '',
  // 'meta_key'         => '',
  // 'meta_value'       => '',
  'post_type'        => 'post',
  // 'post_mime_type'   => '',
  // 'post_parent'      => '',
  // 'author'     => '',
  // 'author_name'    => '',
  'post_status'      => 'publish',
  'suppress_filters' => true
);

$posts_array= get_posts( $args );
return $posts_array;
}

function get_categories_by_names($names){
    $categories = array();
   for ($i=0; $i < count($names); $i++) {
      # code...
    $cat = get_category_by_slug($names[$i]);
    if($cat){
    $categories[] = $cat;
    }
    }

    return $categories;
/*
	$args=array(
	'parent'=>'0',
	'exclude' => '1,3,11',
	'orderby'  => 'id',
	'hide_empty'=>0
);

$categories = get_categories($args);
*/

}

function get_cat_postcount($id) {
// 获取当前分类信息
	$cat = get_category($id);
// 当前分类文章数
	$count = (int) $cat->count;
// 获取当前分类所有子孙分类
$tax_terms = get_terms('category', array('child_of' => $id));
foreach ($tax_terms as $tax_term) {
// 子孙分类文章数累加
	$count +=$tax_term->count;
	}
return $count;
}


add_action( 'after_setup_theme', 'wpmu_theme_support' );
remove_action('wp_head', 'wp_generator');


function par_pagenavi($num = 10){
	$pageid = 1;
  if($_GET && $_GET['pageid'])
      $pageid = (int)$_GET['pageid'];
	$cat_ID = get_query_var('cat');
	// var_dump($pageid);
	// var_dump($cat_ID);
	if($pageid < 1)
  		$pageid = 1;
  	$count = get_cat_postcount($cat_ID);
	$pages = ceil($count/$num) ;
	$links = array();
	for ($i=0; $i < $pages ; $i++) {
		# code...
		$links[$i+1] = get_category_link($cat_ID).'&pageid='.($i+1);
	}
	// var_dump($links);
	return $links;

}

//通过子分类id获取父分类id（可以自定义一个函数
function get_category_root_id($cat){
$this_category = get_category($cat); // 取得当前分类
while($this_category->category_parent) // 若当前分类有上级分类时，循环
{
$this_category = get_category($this_category->category_parent); // 将当前分类设为上级分类（往上爬）
}
return $this_category->term_id; // 返回根分类的id号
}