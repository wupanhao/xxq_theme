<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?php bloginfo( 'name' ); ?></title>
  <link href="<?php bloginfo('template_url');?>/style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/assets/css/jquery.bxslider.min.css" type="text/css" />
  <script src="<?php bloginfo('template_url');?>/assets/js/jquery-1.12.4.min.js" type="text/javascript"></script>
  <script src="<?php bloginfo('template_url');?>/assets/js/jquery.bxslider.min.js" type="text/javascript"></script>
</head>
<?php
//wp_list_categories('orderby=id&show_count=1&use_desc_for_title=0&child_of=5');
// $variable = wp_list_categories('echo=0&show_count=1&title_li=');
//$variable = preg_replace('(\d+)(?=\s*+<)~', '$1', $variable);
// var_dump($variable);
$jjc = get_page_by_title('基建处工作职责');
$xxq = get_page_by_title('新校区建设指挥部工作职责');
$jgsz = get_page_by_title('机构设置');
$contact = get_page_by_title('联系我们');
?>

<body>
  <div class="container">
  <img class="top-img" src="<?php bloginfo('template_url');?>/assets/images/topbg.png">
  <div id="nav">
    <span class="nav-item"><a href="<?php echo home_url();?>" class="top_link"><span>&nbsp;&nbsp;&nbsp;&nbsp;首页</span></a></span>
    <span class="dropdown nav-item ">
      <a href="#" class="top_link ">部门介绍</a>
      <ul class="dropdown-content">
       <li><a href="<?php echo $jjc->guid; ?>">基建处</a></li>
       <li><a href="<?php echo $xxq->guid; ?>">新校区建设指挥部</a></li>
      </ul>
    </span>
    <span class="nav-item"><a href="<?php echo $jgsz->guid; ?>" class="top_link">机构设置</a></span>
<?php
$cat_names = ['ghsj','xqjs','lzjy','gzzd','jjcx','fwzn'];
$categories = get_categories_by_names($cat_names);
foreach ($categories as $cat) {
    $catid = $cat->cat_ID;
    $args=array(
          'parent'=> $cat->cat_ID ,
          'orderby' => 'slug',
          'hide_empty'=>0
          );
    $sub_categories = get_categories($args);
?>
   <?php
        if($sub_categories){
    ?>
      <span class="nav-item dropdown">
        <a href="<?php echo get_category_link($cat->cat_ID);?>" class="top_link "><?php echo $cat->cat_name; ?></a>
        <ul class="dropdown-content" id="test2">
<?php
  foreach($sub_categories as $s_cat) {
?>      
        <li><a href="<?php echo get_category_link($s_cat->cat_ID);?>"><?php echo  $s_cat->cat_name; ?></a></li>
<?php  
  }//end foreach  
?>
        </ul>
      </span>
<?php  
  }//end if
   else {
  ?>
      <span class="nav-item"><a href="<?php echo get_category_link($cat->cat_ID);?>" class="top_link"><?php echo $cat->cat_name; ?></a></span>
<?php
  }//end else
}//end foreach
?>
<span class="nav-item"><a href="<?php echo $contact->guid; ?>" class="top_link">联系我们</a></span>
    </div>