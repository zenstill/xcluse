<?php

/*

  Template Name: changepassword Template

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
<main role="main" class="main-content">
<div class="forget_password">
<div class="client_mail">
<p><?php echo $current_user->user_email;?></p>
<div class="line_alien"></div>
  <a id="registerButton" class="btn_sub lable_tag">Change Password</a>
  </div>
  <div class="information">
<form action="" method="POST" class="mail_information">
              
               <input type="text" name="old_password"  placeholder="Old Password">
                 
               <input type="password" name="new_password1"  placeholder="New Password">
                <input type="password" name="new_password2" placeholder="Re-enter New Password">
                
                 <input type="submit" id="registerButton" class="btn_sub" value="Confirm" name="reset_submit">
                     
              </form>
</div>
<div class="information">
<p>Email me alerts for sales, price changes or when an item is back in stock on items in my wishlist:</p>
</div>

</div>
</main>
</div>
<?php get_footer();?>