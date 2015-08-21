<?php
	function xcluse_feedback($feedback) 
	{
			$from_mail = get_option( 'admin_email' );
			$admin_details = get_user_by_email( $from_mail ); 
	        $admin_nickname = $admin_details->display_name;
 /*mail template*/
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "From:" .$admin_nickname. "<".$from_mail.">\r\n";
					$headers .= "Cc:\r\n";
					$subject = "Your Registration Success on XCluse.com.";
					$message ='Your Registration Success on XCluse.com.'.'<br><br>';
					$message .= HOME;
					$comment = feedback_emailtemplate($reg_name);
					 if(wp_mail($reg_email, $subject, $comment, $headers))
					 {
						 $msg = 'You have successfully Registered.check your mail for reference.';
					 }
					 else
					 {
						 $msg= "We Have some Problem in our Network";
					 }
				/*mail template*/
	}
function feedback_emailtemplate($user_name) {
	$url= HOME;
	$body_msg ='<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
  
    <tr id="header" style="background: transparent url('.get_template_directory_uri().'/images/header_bg.png) no-repeat top center;height: auto;	text-align: center;	color: white;">
      <td><img src="'.get_template_directory_uri().'/images/logo-xcluse.png" width="308" height="59" alt="Email Template" style="margin-top: 30px; text-align: center;"></td>
    </tr>
    
    <tr>
      <td align="center" valign="top">
        
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td colspan="3"><p><br><img src="'.get_template_directory_uri().'/images/header_product.jpg" height="70" width="549"></p></td></tr>
                    <tr>
                      <td class="date" style="font-size:12px;margin: 0; padding: 25px 0 9px 0; border-bottom: 1px solid #333;"><p style="font-size: 14px; color: #666666;">Dear '.$user_name.',</p>
                        <p style="font-size: 13px; color: #666666;">We have processed your request for password reset. Your account details are mentioned below: </p>
						
						 <p style="font-size: 16px; color: #666666;">Username : '.$user_name.'</p>
						 <p style="font-size: 16px; color: #666666;">Password : .........</p>

                        <p style="font-size: 13px; color: #666666;">Please keep them safe.
 </p>
  <p style="font-size: 13px; color: #666666;">For any further queries/assistance, kindly mail us at contact@xcluse.com </p>
 </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                          <ul style="list-style-type:none;">
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://www.facebook.com/XcluseShop" target="_blank"><img src="http://www.xcluse.com/images/1.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://twitter.com/XcluseShop" target="_blank"><img src="http://www.xcluse.com/images/2.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://plus.google.com/+XcluseShop/" target="_blank"><img src="http://www.xcluse.com/images/3.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://www.pinterest.com/XcluseShop/" target="_blank"><img src="http://www.xcluse.com/images/4.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://instagram.com/XcluseShop/" target="_blank"><img src="http://www.xcluse.com/images/5.png" height="25"></a></li>
                          </ul>
                        </div></td>
                    </tr>
                    
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;"><p>This message and it\'s content is Copyright by <span style="font-weight: bold;">Xcluse.com</span></p>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr id="footer" style="background: transparent url('.get_template_directory_uri().'/images/footer_nav_bg.png) no-repeat bottom center; text-align: center; height: 30px;	padding-top: 15px;color: white;">
      <td>.</td>
    </tr>
  </tbody>
</table>';
	
	return $body_msg; 
}
	function get_my_term($id,$tax) 
	{
		$term_name_cur = get_term_by('id', $id, 'product_cat');
		return $term_name_cur;
	}
	function xcluse_subscribe($sub_posts) 
	{
		global $wpdb;
		$news_email = $sub_posts['news_email'];
		$news_userid = $sub_posts['news_userid'];
		$news_type = $sub_posts['news_type'];
		$user_results = $wpdb->get_results("select id from newsletter where user_id=".$news_userid);
		$user_count = count($user_results);
		if($user_count == 0){
		 $wpdb->insert( 'newsletter', array('user_id' => $news_userid,'user_email' => $news_email,'user_type' => $news_type,'created' => date('Y-m-d H:i:s')));
		}else{
		 $wpdb->update( 'newsletter', array('user_email' => $news_email,'user_type' => $news_type), array( 'user_id' => $news_userid));
		}
				 $msg = "profile updated successfully";
		return $msg;
	}
	function current_page_url() 
	{
		$pageURL = 'http';
		if( isset($_SERVER["HTTPS"]) )
		{
			if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") 
		{
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} 
		else 
		{
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
function get_short_content($content,$i)
{
	global $sqlobj,$pageobj,$userobj;
	$con_len=strlen(strip_tags(stripslashes($content)));
	if($con_len>$i)
	{
	$length=strpos(strip_tags(stripslashes($content)),' ',$i);
	if(isset($length) && !empty($length)){
	$final_content = substr(strip_tags(stripslashes($content)),0,$length)."....";
	return $final_content;
	}else{
		return stripslashes($content);
	}
	}
	elseif($con_len<=$i)
	{
	return stripslashes($content);
	}
}
function xcluse_signin($xcluse_post){

	global $current_user;
	
	if(!is_user_logged_in())
	{
	        $username = $xcluse_post['login_email'];

			$password = $xcluse_post['login_password'];
			
			$creds['user_login'] = $username;
		
			$creds['user_password'] = $password;
		
			$creds['remember'] = true;
		
			$result = &wp_signon( $creds, $secure_cookie );
		
		if(is_wp_error($result))
		{
			$username = get_user_by('email', $username);
			
			$creds['user_login'] = $username->user_login;
	
			$creds['user_password'] = $password;
	
			$creds['remember'] = true;
	
			$result = &wp_signon( $creds, $secure_cookie );
	
		}

		if ( $result instanceof WP_User )
	
			$current_user = $result;
		
		if(!is_wp_error($result))
		{
			/*session_start();*/
			//$msg = 'You have logged in successfully.';
			
		}
		else
		{
			/*session_start();*/
			$msg = 'Your login information was incorrect. Please try again.';
		}

	}
	else
	{
/*		session_start();*/
		$msg = 'Already logged in.';
/*		$_SESSION['class'] = 'error';*/
	}
	return $msg;
}

function xcluse_signup($xcluse_post){
global $current_user;
			$reg_email = $xcluse_post['reg_email'];
			$reg_password = $xcluse_post['reg_password'];
			$reg_conpassword = $xcluse_post['reg_conpassword'];
			$reg_name = $xcluse_post['reg_name'];
			$from_mail = get_option( 'admin_email' );
			$admin_details = get_user_by_email( $from_mail ); 
	        $admin_nickname = $admin_details->display_name;

			if ( is_email( $reg_email ) ) {
 			if($reg_password == $reg_conpassword){
			if($reg_email!="")
			{
			$user_id = username_exists( $reg_email );
			if ( $user_id == '' && email_exists($reg_email) == false ) {
				//echo $random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
				$user_id = wp_insert_user( array(

				'user_login' 	=>  $reg_email,
		
				'user_pass' 	=>	$reg_password,
		
				'user_email'	=> 	$reg_email,
				
				'first_name'	=> 	$xcluse_post['reg_name'],
		
				'role' 			=> 'customer'
		
			) );
			
			$creds['user_login'] = $reg_email;
		
			$creds['user_password'] = $reg_password;
		
			$creds['remember'] = true;
		
			$result = &wp_signon( $creds, $secure_cookie );
			
			if ( $result instanceof WP_User )
	
			$current_user = $result;
		
			
				if ( is_wp_error( $user_id ) ) {
		
					$msg ="error";
				}
				else
				{
					$msg ="success";
					 /*mail template*/
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "From:" .$admin_nickname. "<".$from_mail.">\r\n";
					$headers .= "Cc:\r\n";
					$subject = "Your Registration Success on XCluse.com.";
					$message ='Your Registration Success on XCluse.com.'.'<br><br>';
					$message .= HOME;
					$comment = registration_emailtemplate($reg_name);
					 if(wp_mail($reg_email, $subject, $comment, $headers))
					 {
						 $msg = 'You have successfully Registered.check your mail for reference.';
					 }
					 else
					 {
						 $msg= "We Have some Problem in our Network";
					 }
				/*mail template*/
				}
			}else{
				$msg ="error0";
			}
			}else{
				$msg ="error1";
			}
			}else{
				$msg ="error2";
			}
}else{
				$msg ="error3";
			}

		return $msg;
		
}
function registration_emailtemplate($user_name) {
	$url= HOME;
	$body_msg ='<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
  
    <tr id="header" style="background: transparent url('.HOME.'wp-content/themes/xcluse/images/header_bg.png) no-repeat top center;height: auto;	text-align: center;	color: white;">
      <td><img src="'.get_template_directory_uri().'/images/logo-xcluse.png" width="308" height="59" alt="Email Template" style="margin-top: 30px; text-align: center;"></td>
    </tr>
    
    <tr>
      <td align="center" valign="top">
        
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td colspan="3"><p><br><img src="'.get_template_directory_uri().'/images/header_product.jpg" height="70" width="549"></p></td></tr>
                    <tr>
                      <td class="date" style="font-size:12px;margin: 0; padding: 25px 0 9px 0; border-bottom: 1px solid #333;"><p style="font-size: 14px; color: #666666;">Dear '.$user_name.',</p>
                        <p style="font-size: 13px; color: #666666;">Welcome to XCluse.com</p>
						
						<p style="font-size: 13px; color: #666666;">You have successfully registered on XCluse.com</p>
						
						 <p style="font-size: 16px; color: #666666;">Username : '.$user_name.'</p>

                        <p style="font-size: 13px; color: #666666;">Click the below link to login XCluse.com</p>
						<p style="font-size: 13px; color: #666666;"><a href="http://xcluse.com/demo/test" target="_blank">Click here</a></p>
  <p style="font-size: 13px; color: #666666;">For any further queries/assistance, kindly mail us at contact@xcluse.com </p>
 </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                          <ul style="list-style-type:none;">
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://www.facebook.com/XcluseShop" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/1.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://twitter.com/XcluseShop" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/2.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://plus.google.com/+XcluseShop/" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/3.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://www.pinterest.com/XcluseShop/" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/4.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://instagram.com/XcluseShop/" target="_blank"><img src="http://www.xcluse.com/images/5.png" height="25"></a></li>
                          </ul>
                        </div></td>
                    </tr>
                    
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;"><p>This message and it\'s content is Copyright by <span style="font-weight: bold;">Xcluse.com</span></p>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr id="footer" style="background: transparent url('.HOME.'wp-content/themes/xcluse/images/footer_nav_bg.png) no-repeat bottom center; text-align: center; height: 30px;	padding-top: 15px;color: white;">
      <td>.</td>
    </tr>
  </tbody>
</table>';
	
	return $body_msg; 
}
function xcluse_resetpassword($xcluse_post){

			$old_password = $xcluse_post['old_password'];
		    $new_password1 = $xcluse_post['new_password1'];
		    $new_password2 = $xcluse_post['new_password2'];
			$current_user = wp_get_current_user();
			$username = $current_user->user_login;
			$user_nickname=$current_user->display_name;
			$from_mail=get_option( 'admin_email' );
			$admin_details=get_user_by_email( $from_mail ); 
	        $admin_nickname=$admin_details->display_name;
			if($new_password1 == $new_password2){
				$user = get_user_by( 'login', $username );
			if ( $user && wp_check_password( $old_password, $user->data->user_pass, $user->ID) )
			  {
				  wp_set_password( $new_password1, $user->ID );
				   wp_set_auth_cookie( $user->ID, true);
				  $msg = 'Your Password changed Successfully.';
				  /*mail template*/
					$headers  = "MIME-Version: 1.0\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$headers .= "From:" .$admin_nickname. "<".$from_mail.">\r\n";
					$headers .= "Cc:\r\n";
					$subject = "Your Password changed Successfully.";
					$message ='You have successfully registered on Xcluse.'.'<br><br>';
					$message .='Click the below link to login Xcluse.'.'<br><br>';
					$message .= HOME;
					$comment = password_reset_emailtemplate($user_nickname);
					 if(wp_mail('contact@xcluse.com', $subject, $comment, $headers))
					 {
						 $msg = 'You have successfully changed your password.check your mail for reference.';
					 }
					 else
					 {
						 $msg= "We Have some Problem in our Network";
					 }
				/*mail template*/
			  }else{
				  $msg = 'Please Check your old password';
			  }
			}else{
				$msg = 'New password Mismatch';
			}
	return $msg;
}

function password_reset_emailtemplate($user_name) {
	$url= HOME;
	$body_msg ='<table width="100%" cellspacing="0" cellpadding="0" style="font-size:13px; font-family:calibri; color: #222222;padding: 24px; background-color: #34495e;">
  <tbody>
  
    <tr id="header" style="background: transparent url('.HOME.'wp-content/themes/xcluse/images/header_bg.png) no-repeat top center;height: auto;	text-align: center;	color: white;">
      <td><img src="'.HOME.'wp-content/themes/xcluse/images/logo-xcluse.png" width="308" height="59" alt="Email Template" style="margin-top: 30px; text-align: center;"></td>
    </tr>
    
    <tr>
      <td align="center" valign="top">
        
        <table width="580" border="0" cellspacing="0" cellpadding="0" style="background-color: #e6e6e6;">
          <tbody>
            <tr>
              <td align="center"><table width="550" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr><td colspan="3"><p><br><img src="'.HOME.'wp-content/themes/xcluse/images/header_product.jpg" height="70" width="549"></p></td></tr>
                    <tr>
                      <td class="date" style="font-size:12px;margin: 0; padding: 25px 0 9px 0; border-bottom: 1px solid #333;"><p style="font-size: 14px; color: #666666;">Dear '.$user_name.',</p>
                        <p style="font-size: 13px; color: #666666;">We have processed your request for password reset. Your account details are mentioned below: </p>
						
						 <p style="font-size: 16px; color: #666666;">Username : '.$user_name.'</p>
						 <p style="font-size: 16px; color: #666666;">Password : .........</p>

                        <p style="font-size: 13px; color: #666666;">Please keep them safe.
 </p>
  <p style="font-size: 13px; color: #666666;">For any further queries/assistance, kindly mail us at contact@xcluse.com </p>
 </td> 
                    </tr>
                    <tr align="left" rowspan="3" valign="top"> </tr>
                    <tr> </tr>
                    <tr> 
                    </tr>
                    <tr>
                      <td align="center" class="footer">
					   <div style="margin-left: 120px;">
                          <ul style="list-style-type:none;">
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://www.facebook.com/XcluseShop" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/1.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://twitter.com/XcluseShop" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/2.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://plus.google.com/+XcluseShop/" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/3.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://www.pinterest.com/XcluseShop/" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/4.png" height="25"></a></li>
                            <li style="float:left; padding:4px 10px 10px 10"><a href="https://instagram.com/XcluseShop/" target="_blank"><img src="'.HOME.'wp-content/themes/xcluse/images/5.png" height="25"></a></li>
                          </ul>
                        </div></td>
                    </tr>
                    
                  </tbody>
                </table></td>
            </tr>
            <tr>
              <td align="center" class="footer" style="font-size:13px;"><p>This message and it\'s content is Copyright by <span style="font-weight: bold;">Xcluse.com</span></p>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr id="footer" style="background: transparent url('.HOME.'wp-content/themes/xcluse/images/footer_nav_bg.png) no-repeat bottom center; text-align: center; height: 30px;	padding-top: 15px;color: white;">
      <td>.</td>
    </tr>
  </tbody>
</table>';
	
	return $body_msg; 
}
?>