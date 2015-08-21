<?php

/*

  Template Name: newsletter Template

 */
get_header();
 ?>
 <div class="j_full_page">
<style>
.forget_password{
	width:300px;
	margin:20px auto;
	text-align:center;
}
.mail_information input[type='text'], .mail_information input[type='password']{
	width:100% !important;
	border-radius: 0 !important;
	background:#E6E6E6;
	border:none !important;
	margin-bottom:5px;
	padding:5px 10px !important;
}
.btn_sub{
  width: 100%;
  background: #191919;
  color: #fff;
  padding: 8px 10px !important;
  border-radius: 0 !important;
}
.line_alien{
	height:1px;
	width:100%;
	background:#333;
	margin-bottom:20px;
}
.information{
	margin-top:30px;
}
.information p{
	font-size:16px;
}
.post_class{
	position:fixed;
	bottom:0;
	width:100%;
}
.lable_tag{
	width:100%;
	display:inline-block;
}
</style>
<script>

   $(document).ready(function() {
	   $( "body" ).on( "click", ".news_division li a", function() {
	 /* $( ".addtowishlist" ).on( "click", function() {*/
		  news_type = $(this).data( "id" );
		  $("#news_type").val( news_type );
		  $( ".news_division li a" ).removeClass( "active" );
		  $(this).addClass( "active" );
		  $(".selection_line span").attr('class', '');
		   $(".selection_line span").addClass('circule_select '+news_type);
		  //alert(product_id);
   });
   });
</script>
<main role="main" class="main-content">
<div class="forget_password">
<div class="client_mail">
<!-- <p><?php echo $current_user->user_email;?></p>-->
<div class="line_alien"></div>
  <a id="registerButton" class="btn_sub lable_tag">Subscribe Newsletter</a>
  </div>
  <div class="information">
<form action="" method="POST" class="mail_information">
              
               <input type="text" name="news_email" value="<?php echo $current_user->user_email;?>">
                <input name="news_userid" value="<?php echo $current_user->ID;?>" type="hidden">
                 <input name="news_type" value="never" type="hidden" id="news_type">

                 <input type="submit" id="registerButton" class="btn_sub" value="Subscribe" name="subscribe_submit">
                     
              </form>
              
              
</div>
<div class="information">
<p>Email me alerts for sales, price changes or when an item is back in stock on items in my wishlist:</p>
</div>
<?php $res = $wpdb->get_results("select user_type from newsletter where user_id=".$current_user->ID);?>
<?php if($res[0]->user_type=="never"){ 
$as = "never";
}elseif($res[0]->user_type=="weekly"){ 
$as = "weekly";
}elseif($res[0]->user_type=="daily"){
$as = "daily";
}elseif($res[0]->user_type=="immediately"){ 
$as = "immediately";
}?>
<div class="news_letter">
<div class="selection_line">
<span class="circule_select <?php echo $as;?>"></span>
</div>
<ul class="news_division">
<li><a data-id="never" <?php if($res[0]->user_type=="never"){?>class="active"<?php } ?>>never</a></li>
<li><a data-id="weekly" <?php if($res[0]->user_type=="weekly"){?>class="active"<?php } ?>>weekly</a></li>
<li><a data-id="daily" <?php if($res[0]->user_type=="daily"){?>class="active"<?php } ?>>daily</a></li>
<li><a data-id="immediately" <?php if($res[0]->user_type=="immediately"){?>class="active"<?php } ?>>immediately</a></li>
</ul>
</div>
</div>
</main>
</div>
<?php get_footer();?>