<?php
  if(isset($_POST['reg_submit']))
{
    $signup_msg = xcluse_signup($_POST);

}
  if(isset($_POST['login_submit']))
{
    $login_msg = xcluse_signin($_POST);

}
  if(isset($_POST['reset_submit']))
{
    $reset_msg = xcluse_resetpassword($_POST);

}
   if(isset($_POST['subscribe_submit']))
{
    $subscribe_msg = xcluse_subscribe($_POST);

}
   if(isset($_POST['feedback_submit']))
{
    $feedback_msg = xcluse_feedback($_POST);

}
$current_user = wp_get_current_user();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); ?><?php wp_title('|',true,''); ?></title>
<link rel="shortcut icon" type="image/x-icon" href="images/fav.png" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style.css" type="text/css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/mtree.css" type="text/css" />
<script src="<?php echo get_template_directory_uri();?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery-menu.js"></script>-->
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/shop.js"></script>
<?php wp_head(); ?>
<script>
   $(document).ready(function() {
	  // $(".shop_loading").css("display", "none");
   $('#for_signin').click(function (e) {
		$("#myModal").modal('show');
		$("#for_login").tab('show');
    });
   $('#for_register').click(function (e) {
		$("#myModal").modal('show');
		$("#for_signup").tab('show');
    });
	 $('#myTab a').click(function (e) {
		   });
	<?php if(isset($subscribe_msg) && !empty($subscribe_msg)){?>
		$(".success-msg").text("<?php echo $subscribe_msg;?>");
		$("#myModal2").modal('show');
		$(".error-msg").show();
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3000);
    <?php } ?>
	<?php if(isset($login_msg) && !empty($login_msg)){?>
		$(".error-msg").text("<?php echo $login_msg;?>");
		$("#myModal").modal('show');
		$(".error-msg").show();
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3000);
    <?php } ?>
	<?php if(isset($signup_msg) && !empty($signup_msg)){?>
		<?php if($signup_msg !="error1" && $signup_msg !="error2" && $signup_msg !="error3" && $signup_msg !="error0"){?>
		$(".success-msg").text("<?php echo $signup_msg;?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3000);
		<?php } ?>
	<?php if($signup_msg =="error0"){?>
		$(".error-msg").text("User already Exist.Login with your existing username and password.");
		$(".error-msg").css( "color", "red" );
		$("#myModal").modal('show');
		$("#for_signup").tab('show');
		$(".error-msg").show();
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3000);
		<?php }?>
	<?php if($signup_msg =="error1"){?>
		$(".error-msg").text("Enter all details.");
		$(".error-msg").css( "color", "red" );
		$("#myModal").modal('show');
		$("#for_signup").tab('show');
		$(".error-msg").show();
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3000);
		<?php }?>
	<?php if($signup_msg =="error2"){?>
		$(".error-msg").text("password mismatch");
		$(".error-msg").css( "color", "red" );
		$("#myModal").modal('show');
		$("#for_signup").tab('show');
		$(".error-msg").show();
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3000);
		<?php }?>
	<?php if($signup_msg =="error3"){?>
		$(".error-msg").text("Enter Valid email");
		$(".error-msg").css( "color", "red" );
		$("#myModal").modal('show');
		$("#for_signup").tab('show');
		$(".error-msg").show();
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3000);
		<?php }?>
    <?php } ?>
	<?php if(isset($reset_msg) && !empty($reset_msg)){?>
		$(".success-msg").text("<?php echo $reset_msg;?>");
		$("#myModal2").modal('show');
		setTimeout(function(){
		   $(".close").trigger("click");
			 }, 3000);
	<?php } ?>
});
</script>
<script>
   $(document).ready(function() {
 $( "body" ).on( "click", "#formSearch button", function(e) {
		e.preventDefault();
	 /* $( ".addtowishlist" ).on( "click", function() {*/
		 search_val = $("#formSearch input").val();
		 
		 // var datastring = $("#formSearch").serialize();
		 // request = $(this).data( "request" );
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mainheadsearchajax',  
					searchdata:search_val,
					},
					context: this,  
					success: function(data){
					$(".j_full_page").html(data);
					$( ".s" ).val(search_val);
					}
 	});				
   });
   
   
   });
</script>
<script>
   $(document).ready(function() {
	    $( "body" ).on( "click", ".j_menu2", function(e) {
			e.preventDefault();
		 cat_id = $(this).data("id");
		 cat_url = $(this).data("url");
		 if(typeof(cat_id) != "undefined" && cat_id !== null && cat_id !== "new" && cat_id !== "sale") {
			 		 $(".menu-width").hide('slow');
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_ajax',  
					cat_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".j_full_page").html(data);
					$("#main_cat").val(cat_id);
					$(".site-footer-sec").css("position", "inherit");
					window.history.replaceState("object or string", "Title", cat_url);
					//window.history.pushState({path:'product-category/mainmain/'},'','product-category/mainmain/');
					}
 	});	
	
		 }
			});	
	   $( "body" ).on( "click", ".bred_cum", function(e) {
		 cat_id = $(this).data("id");
		 cat_url = $(this).data("url");
		 if(typeof(cat_id) != "undefined" && cat_id !== null) {
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_ajax',  
					cat_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".j_full_page").html(data);
					$("#main_cat").val(cat_id);
					$(".site-footer-sec").css("position", "inherit");
					window.history.replaceState("object or string", "Title", cat_url);
					}
 	});	
	
		 }
		 });
$( "body" ).on( "click", ".detail_bred_ajax", function(e) {
		 cat_id = $(this).data("id");
		 cat_url = $(this).data("url");
		 if(typeof(cat_id) != "undefined" && cat_id !== null) {
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_ajax',  
					cat_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".j_full_page").html(data);
					$("#main_cat").val(cat_id);
					$(".site-footer-sec").css("position", "inherit");
					window.history.replaceState("object or string", "Title", cat_url);
					}
 	});	
	
		 }
		 });	
 $( "body" ).on( "click", ".del_compare", function(e) {
		e.preventDefault();
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'delajaxcompare',  
					},
					context: this,  
					success: function(data){
					$(".for_compare").html('Compare');
					$(".addtocompare").html('<i class="level_comp"></i>');
					$(".close").trigger("click");
					}
 	});	

});	
 $( "body" ).on( "click", ".j_menu", function(e) {
		e.preventDefault();
		 cat_id = $(this).data("id");
		 cat_url = $(this).data("url");
		 if(typeof(cat_id) != "undefined" && cat_id !== null && cat_id !== "new" && cat_id !== "sale") {
			 		 $(".menu-width").hide('slow');
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_ajax',  
					cat_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".j_full_page").html(data);
					$("#main_cat").val(cat_id);
					$(".site-footer-sec").css("position", "inherit");
					window.history.replaceState("object or string", "Title", cat_url);
					//window.history.pushState({path:'product-category/mainmain/'},'','product-category/mainmain/');
					}
 	});	
	
		 }
		 
		  if(typeof(cat_id) != "undefined" && cat_id !== null && cat_id == "new" && cat_id !== "sale") {
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_ajax',  
					new_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".j_full_page").html(data);
					$(".site-footer-sec").css("position", "inherit");
					}
 	})
		 }
		  if(typeof(cat_id) != "undefined" && cat_id !== null && cat_id !== "new" && cat_id == "sale") {
	   $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_ajax',  
					sale_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".j_full_page").html(data);
					$(".site-footer-sec").css("position", "inherit");
					}
 	})
		 }
		 
		 
		 
		 
	function func2_cat(){
	 $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_sidebar_ajax',  
					cat_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".widget_price_filter").html(data);
					$("#main_cat").val(cat_id);
					}
 	});	
	}
 function func2_new(){
	 $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_sidebar_ajax',  
					new_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".widget_price_filter").html(data);
					}
 	});	
	}
 function func2_sale(){
	 $.ajax({
						  
					type: 'POST',  
					url: '<?php echo admin_url('admin-ajax.php') ?>',  
					data: {  
					action: 'mymenu_sidebar_ajax',  
					sale_id:cat_id,
					},
					context: this,  
					success: function(data){
					$(".widget_price_filter").html(data);
					}
 	});	
	}
   });
   });
</script>
</head>

<body <?php body_class(); ?>>
<header  <?php if(is_home()){ ?>style="position:fixed;	top:0;	width:100%; z-index:99"<?php } ?> class="for_header">
  <div class="bg-menu">
    <div class="container">
      <nav>
        <div class="container-fluid">
          <div class="logo-xcluse"> <a class="navbar-brand" href="<?php echo HOME;?>"><img src="<?php echo get_template_directory_uri();?>/images/logo-xcluse.png" /></a> </div>
          <div>
            <div class="search_top">
            <?php  echo do_shortcode('[yith_woocommerce_ajax_search]'); ?> 
            <?php //get_search_form(); ?>

            </div>

            <ul class="nav navbar-nav right-nav list-nav">
             <?php if(is_user_logged_in()){ ?>
              <li><a href="<?php echo HOME;?>mywishlist">My Wish Lists</a></li>
              <?php } else { ?>
              <li><a href="#" data-toggle="modal" data-target="#myModal" id="for_account">My Wish Lists</a></li>
              <?php } ?>
              <?php if(!empty($_COOKIE['compare'])){ 
$arr_compare = explode(",", $_COOKIE['compare']);
 }?>
              <li><a href="<?php echo HOME;?>compare" class="for_compare">Compare<?php if(!empty($arr_compare)) { echo '('.count($arr_compare).')'; }?></a></li>
              <?php if(!is_user_logged_in()){ ?>
              <li class="dropdown_list sub_menu_list"><a href="#" id="for_signin">Login</a><!--<a href="#" id="for_register">Sign Up</a>--></li>
              
              <?php } else { ?>
              <li class="dropdown_list"><a href="#">Account</a>
                            <ul>
               <?php if(trim($current_user->roles[0]) != 'subscriber'){?>
            <li><a href="<?php echo HOME;?>changepassword">Change Password</a></li>
            <?php } ?>
             <li><a href="<?php echo HOME;?>profile">Profile & Settings</a></li>
            <li><a href="<?php echo wp_logout_url(HOME); ?>">Logout</a></li>
            <?php } ?>
         
          </ul></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>

    <nav class="nav-bar" role="navigation">
    <div class="wrapper">

      <ul class="site-nav j_menu1" id="accessibleNav">
        
        <!-- Menu level 1 -->
<?php $menu = wp_get_nav_menu_object ('mainmenu');
 
    $menu_items = wp_get_nav_menu_items($menu->term_id);
	foreach($menu_items as $menu_item){
		if($menu_item->menu_item_parent ==0){
		   $object_id = $menu_item->object_id;
		   $object_title = $menu_item->title;
		   $object_url = $menu_item->url;
		  ?>
           <?php if($object_title == 'Decors & Lightings' || $object_title == 'Dining & Kitchen' || $object_title == 'Furniture' || $object_title == 'Kids' || $object_title == 'Patio & Outdoor' || $object_title == 'Grills & Outdoor Cooking' || $object_title == 'main2'){ ?>
           <li class="site-nav--has-dropdown site-nav--active" aria-haspopup="true"> <a href="#" data-id="<?php echo $object_id;?>" data-url="<?php echo $object_url;?>" class="last_menu j_menu"><?php echo $object_title;?> <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
              <?php
  $args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => $object_id,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories = get_categories( $args );
//echo "<pre>"; print_r($categories);exit;
?>
          <ul class="site-nav--dropdown menu-width">
                <?php
		foreach($categories as $cat){
	$args1 = array(
	'type'                     => 'product',
	'child_of'                 => false,
	'parent'                   => $cat->term_id,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '10',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories1 = get_categories( $args1 );
if(!empty($categories1)){
	//$sub_term = get_term_by( 'id', $child, 'product_cat' );
	 $term_link = get_term_link( $cat );?>  
          
            <div class="list-style">
             <ul> 
             <div class="menu_list_head"> <a data-id="<?php echo $cat->term_id;?>" data-url="<?php echo $term_link;?>" class="j_menu"> <?php echo $cat->name;?></a></div>
             <?php $termchildren = get_term_children( $cat->term_id, 'product_cat' );?>
              <?php foreach ( $termchildren as $child ) {
						$sub_term = get_term_by( 'id', $child, 'product_cat' );
						$term_link = get_term_link( $child,'product_cat' );?>
             <li> <a data-id="<?php echo $sub_term->term_id;?>" data-url="<?php echo $term_link;?>" class="j_menu"><?php echo ucfirst($sub_term->name);?></a> </li>
              <?php } ?>
             </ul>
             </div>
             <?php } } ?>         

          </ul>
        </li>
        <?php } else {?>
        <li class="site-nav--has-dropdown last_menu"> <a href="javascript:void(0);" data-id="<?php echo $object_id;?>" data-url="<?php echo $object_url;?>" class="last_menu j_menu"><?php echo $object_title;?> <i class="fa fa-angle-down" aria-hidden="true"></i></a>
      <ul class="site-nav--dropdown menu-width">
                  
          
            <div class="list-style">
             <ul> 
     <?php
  $args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => $object_id,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories2 = get_categories( $args );


?>
                <?php
		foreach($categories2 as $cat2){
			$term_link = get_term_link( $cat2 );?>
                           <li> <a data-id="<?php echo $cat2->term_id;?>" data-url="<?php echo $term_link;?>" class="j_menu"><?php echo ucfirst($cat2->name);?></a></a> </li>
                           <?php } ?>

             </ul>
             </div>

          </ul>
        </li>
        <?php } ?>
	<?php	}
	}
	?>
       <!-- <li class="site-nav--has-dropdown site-nav--active" aria-haspopup="true"> <a href="#">Furniture <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
              <?php
  $args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => 38,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories = get_categories( $args );
//echo "<pre>"; print_r($categories);exit;
?>
          <ul class="site-nav--dropdown menu-width">
                <?php
		foreach($categories as $cat){
	$args1 = array(
	'type'                     => 'product',
	'child_of'                 => false,
	'parent'                   => $cat->term_id,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '10',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories1 = get_categories( $args1 );
if(!empty($categories1)){?>  
          
            <div class="list-style">
             <ul> 
             <div class="menu_list_head"><a href="javascript:void(0);" data-id="<?php echo $cat->term_id;?>"><?php echo $cat->name;?></a></div>
             <?php $termchildren = get_term_children( $cat->term_id, 'product_cat' );?>
              <?php foreach ( $termchildren as $child ) {
						$sub_term = get_term_by( 'id', $child, 'product_cat' );?>
             <li> <a href="javascript:void(0);" data-id="<?php echo $sub_term->term_id;?>"><?php echo ucfirst($sub_term->name);?></a> </li>
              <?php } ?>
             </ul>
             </div>
             <?php } } ?>         

          </ul>
        </li>
		<li class="site-nav--has-dropdown site-nav--active" aria-haspopup="true"> <a href="#">Decor & Lighting <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
	  <?php
$args = array(
'type'                     => 'product',
'child_of'                 => 0,
'parent'                   => 6307,
'orderby'                  => 'name',
'order'                    => 'ASC',
'hide_empty'               => 1,
'hierarchical'             => 1,
'exclude'                  => '',
'include'                  => '',
'number'                   => '',
'taxonomy'                 => 'product_cat',
'pad_counts'               => false 

); 
$categories = get_categories( $args );
//echo "<pre>"; print_r($categories);exit;
?>
  <ul class="site-nav--dropdown menu-width">
		<?php
foreach($categories as $cat){
$args1 = array(
'type'                     => 'product',
'child_of'                 => false,
'parent'                   => $cat->term_id,
'orderby'                  => 'name',
'order'                    => 'ASC',
'hide_empty'               => 1,
'hierarchical'             => 1,
'exclude'                  => '',
'include'                  => '',
'number'                   => '10',
'taxonomy'                 => 'product_cat',
'pad_counts'               => false 

); 
$categories1 = get_categories( $args1 );
if(!empty($categories1)){?>  
  
	<div class="list-style">
	 <ul> 
	 <div class="menu_list_head"><a href="<?php echo HOME;?>product-category/<?php echo $cat->slug;?>/"><?php echo $cat->name;?></a></div>
	 <?php $termchildren = get_term_children( $cat->term_id, 'product_cat' );?>
	  <?php foreach ( $termchildren as $child ) {
				$sub_term = get_term_by( 'id', $child, 'product_cat' );?>
	 <li> <a href="<?php echo HOME;?>product-category/<?php echo $sub_term->slug;?>/"><?php echo ucfirst($sub_term->name);?></a> </li>
	  <?php } ?>
	 </ul>
	 </div>
	 <?php } } ?>         

  </ul>
</li>
        <li class="site-nav--has-dropdown"> <a href="#">Electronics <i class="fa fa-angle-down" aria-hidden="true"></i></a>
      <ul class="site-nav--dropdown menu-width">
                  
          
            <div class="list-style">
             <ul> 
     <?php
  $args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => 6308,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories2 = get_categories( $args );

?>
                <?php
		foreach($categories2 as $cat2){?>
                           <li> <a href="<?php echo HOME;?>product-category/<?php echo $cat2->slug;?>/"><?php echo ucfirst($cat2->name);?></a></a> </li>
                           <?php } ?>

             </ul>
             </div>

          </ul>
        </li>
  <li class="site-nav--has-dropdown"> <a href="#">Bedding <i class="fa fa-angle-down" aria-hidden="true"></i></a>
      <ul class="site-nav--dropdown menu-width">
                  
          
            <div class="list-style">
             <ul> 
     <?php
  $args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => 947,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories2 = get_categories( $args );

?>
                <?php
		foreach($categories2 as $cat2){?>
                           <li> <a href="<?php echo HOME;?>product-category/<?php echo $cat2->slug;?>/"><?php echo ucfirst($cat2->name);?></a></a> </li>
                           <?php } ?>

             </ul>
             </div>

          </ul>
        </li>
    <li class="site-nav--has-dropdown"> <a href="#">Bath <i class="fa fa-angle-down" aria-hidden="true"></i></a>
      <ul class="site-nav--dropdown menu-width">
                  
          
            <div class="list-style">
             <ul> 
     <?php
  $args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => 948,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',

	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories2 = get_categories( $args );

?>
                <?php
		foreach($categories2 as $cat2){?>
                           <li> <a href="<?php echo HOME;?>product-category/<?php echo $cat2->slug;?>/"><?php echo ucfirst($cat2->name);?></a></a> </li>
                           <?php } ?>

             </ul>
             </div>

          </ul>
        </li>    
         <li class="site-nav--has-dropdown site-nav--active" aria-haspopup="true"> <a href="#"> Storage & Organization <i class="fa fa-angle-down" aria-hidden="true"></i> </a>
              <?php
  $args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => 950,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories = get_categories( $args );
//echo "<pre>"; print_r($categories);exit;
?>
          <ul class="site-nav--dropdown menu-width">
                <?php
		foreach($categories as $cat){
	$args1 = array(
	'type'                     => 'product',
	'child_of'                 => false,
	'parent'                   => $cat->term_id,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '10',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories1 = get_categories( $args1 );
if(!empty($categories1)){?>  
          
            <div class="list-style">
             <ul> 
             <div class="menu_list_head"><a href="<?php echo HOME;?>product-category/<?php echo $cat->slug;?>/"><?php echo $cat->name;?></a></div>
             <?php $termchildren = get_term_children( $cat->term_id, 'product_cat' );?>
              <?php foreach ( $termchildren as $child ) {
						$sub_term = get_term_by( 'id', $child, 'product_cat' );?>
             <li> <a href="<?php echo HOME;?>product-category/<?php echo $sub_term->slug;?>/"><?php echo ucfirst($sub_term->name);?></a> </li>
              <?php } ?>
             </ul>
             </div>
             <?php } } ?>         

          </ul>
        </li>
        <li class="site-nav--has-dropdown"> <a href="<?php echo HOME;?>shopbyroom">Shop By Room <i class="fa fa-angle-down" aria-hidden="true"></i></a>
      <ul class="site-nav--dropdown menu-width">
                  
          
            <div class="list-style">
             <ul> 
     <?php
  $args = array(
	'type'                     => 'product',
	'child_of'                 => 0,
	'parent'                   => 953,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'exclude'                  => '',
	'include'                  => '',
	'number'                   => '',
	'taxonomy'                 => 'product_cat',
	'pad_counts'               => false 

); 
$categories2 = get_categories( $args );

?>
                <?php
		foreach($categories2 as $cat2){?>
                           <li> <a href="<?php echo HOME;?>product-category/<?php echo $cat2->slug;?>/"><?php echo ucfirst($cat2->name);?></a></a> </li>
                           <?php } ?>

             </ul>
             </div>

          </ul>
        </li>-->
        <!--<li> <a href="<?php echo HOME;?>shopbyroom">Shop By Room</a></li>-->
        <!--<li> <a  href="javascript:void(0);" data-id="new">New Arrivals</a></li>
        <li> <a  href="javascript:void(0);" data-id="sale">Sale</a> </li>-->
      </ul>
    </div>
  </nav>


  <div id="mobileNavBar">
    <div class="display-table-cell"> <a class="menu-toggle mobileNavBar-link"> <i class="fa fa-navicon"></i> Menu</a> </div>
  </div>
  
</header>

 <!---Start Pop up---->         
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"> 
      
      <!-- Modal content-->
      
      <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff">&times;</button>
          <h4 class="modal-title error-msg"></h4>
        </div>
        <ul id="myTab" class="nav nav-tabs">
   <li class="active"><a href="#home" data-toggle="tab" id="for_login">Login</a>
   </li>
   <li><a>|</a></li>
   <li><a href="#ios" data-toggle="tab" id="for_signup">Sign up</a></li>
  
</ul>
<div id="myTabContent" class="tab-content">
   <div class="tab-pane fade in active" id="home">
     <div class="modal-body">
          <form enctype="#" action="" method="POST" class="newform " _uid="1891">
          <!--<div class="error-msg"><p class="loginerror-msg"></p></div>-->
             <div class="input type_text  required_input" id="js_register_dialog_row19">
              <div class="value">
                <input type="text" id="login_email" name="login_email" _uid="1902" placeholder="Enter your email" required="required">
              </div>
              </div>
            <div class="input type_password  required_input" id="js_register_dialog_row22">
              <div class="value">
                <input type="password" id="login_password" name="login_password" _uid="1907" placeholder="Password" required="required">
              </div>
            </div>
            
            <div class="input type_html " id="js_register_dialog_row33">
              <div class="value">
                <div class="error" id="register_error"></div>
              </div>
            </div>
            <div class="input type_buttons " id="js_register_dialog_row36">
              <div class="value">
                <ul class="actions horizontal">
                  <li>
                    <input type="submit" id="registerButton" class="btn btn_action" value="Log in" name="login_submit">
                  </li>
                 <!-- <li><a href=""><span class="clickable cancel-fun" _uid="1889">I forgot my password</span></a></li>-->
                </ul>
              </div>
            </div>
            
          </form>
        </div>
   </div>
   <div class="tab-pane fade" id="ios">
      <div class="tab-pane fade in active" id="home">
     <div class="modal-body">
          <form enctype="#" action="" method="POST" class="newform " _uid="1891">
         
            <!--<div class="error-msg"><p class="signuperror-msg"></p></div>-->
            <div class="input type_text  required_input" id="js_register_dialog_row19">
              <div class="value">
                <input type="text" id="js_register_dialog_input18" name="reg_name" _uid="1902" placeholder="Enter your name" required="required">
              </div>
              </div>
             <div class="input type_text  required_input" id="js_register_dialog_row19">
              <div class="value">
                <input type="text" id="js_register_dialog_input18" name="reg_email" _uid="1902" placeholder="Enter your email" required="required">
              </div>
              </div>
            <div class="input type_password  required_input" id="js_register_dialog_row22">
              <div class="value">
                <input type="password" id="js_register_dialog_input21" name="reg_password" _uid="1907" placeholder="Create a Password" required="required">
              </div>
            </div>
            <div class="input type_password  required_input" id="js_register_dialog_row22">
              <div class="value">
                <input type="password" id="js_register_dialog_input21" name="reg_conpassword" _uid="1907" placeholder="Confirm Password" required="required">
              </div>
            </div>
            
            <div class="input type_html " id="js_register_dialog_row33">
              <div class="value">
                <div class="error" id="register_error"></div>
              </div>
            </div>
            <div class="input type_buttons " id="js_register_dialog_row36">
              <div class="value">
                <ul class="actions horizontal">
                  <li>
                    <input type="submit" id="registerButton" class="btn btn_action" value="Sign up" name="reg_submit">
                  </li>
                </ul>
              </div>
              
            </div>
            
          </form>
        </div>
   </div>
   </div>
  <div class="input " id="js_register_dialog_row36">
              <div class="value">
              
              <div class="fb-line"><Span>Or</Span></div>
              <div class="social-connection">
              
              <ul class="actions horizontal">
              <?php do_action( 'wordpress_social_login' ); ?>
                </ul>
              </div>
              </div></div>
</div>
      </div>
    </div>
  </div>
 <!---End Pop up---->  
 <!---Start Pop up2---->         
  
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog"> 
      
      <!-- Modal content-->
      
      <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff; margin-top:-15px;">&times;</button>
          <h4 class="modal-title success-msg"></h4>
        </div>
        
     </div>
    </div>
  </div>
 <!---End Pop up---->  
<!---Start Pop up2---->         
  
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog"> 
      
      <!-- Modal content-->
      
      <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="color:#fff; margin-top:-15px;">&times;</button>
          <h4 class="modal-title success-msg">Product category existing currently in Compare list does not match with the selected category.</h4>
        </div>
        <div class="input type_buttons " id="js_register_dialog_row36">
              <div class="value">
                   <span class="for_compare_msg">
                   <a href="" class="del_compare_can">Cancel</a>
                   <a href="#" class="del_compare">Clear Previous Compared products.</a>
                  </span>
              </div>
              
            </div>
     </div>
    </div>
  </div>
 <!---End Pop up---->       
