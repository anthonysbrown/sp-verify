<?php
/*
Plugin Name: SP Verify
Plugin URI: http://www.sibyl.com/
Description: Age verification plugin for breweries
Author: Anthony Brown
Version: 1.0.0
Author http://www.sibyl.com/
*/


include_once('admin/admin-init.php');

$sp_verify_init= new sp_verify_init;
add_action('wp_footer',array($sp_verify_init, 'wall'));
add_action('wp_enqueue_scripts',array($sp_verify_init, 'scripts'));
add_action('wp_print_styles',array($sp_verify_init, 'styles'));
add_action('init',array($sp_verify_init, 'init'));
add_action('admin_init',array($sp_verify_init, 'admin_init')); 
class sp_verify_init{
			
			
			function admin_init(){
				
				
					if($_GET['reset_verify_cookie'] == 1){
						
							setcookie("sp_age_check", '',  time() - 3600 , "/");	
					
							wp_redirect('admin.php?page=sp_verify_options&tab=1');
					}
				
			}
			
			function styles(){
				global $sp_verify;
	if($sp_verify['enabled'] == 1 && !is_admin()){
				if($_COOKIE['sp_age_check'] != 1){
	wp_enqueue_style( 'sp-style',plugins_url('/css/style.css', __FILE__) );
		}
	}
			}
			function init(){
				global $sp_verify;
			
				
				if(($_GET['sp_confirm_age'] != '' or $_GET['sp_day'] != '') && !is_admin()){
					
					$today = time();
					$age = $date = strtotime(''.date("".$_GET['sp_year']."-".$_GET['sp_month']."-".$_GET['sp_day']."").'');
					$ofage = $date = strtotime(''.date("Y-m-d").' -'.$sp_verify['verify_age'].' years');
					
					
					if($age <= $ofage){
						
					$pass_age = true;	
					}else{
					$pass_age = false;		
					}
					
					
					
					
					
					if($_GET['sp_confirm_age']  == 1 or $pass_age == true){
						
						$time = $sp_verify['over_age_cookie'] * 86400;
					setcookie("sp_age_check", 1, time()+ $time , "/");	
					
					if($sp_verify['over_age_redirect'] != ''){
					ob_start();	
					wp_redirect($sp_verify['over_age_redirect']);	
					exit;
					}else{
					ob_start();
					wp_redirect(get_home_url());	
					exit;	
					}
					
					}else{
						$time = $sp_verify['under_age_cookie'] * 3600;
						
					setcookie("sp_age_check", 'under', time()+ $time , "/");	
					if($sp_verify['under_age_redirect'] != ''){
					ob_start();	
					wp_redirect($sp_verify['under_age_redirect']);	
					exit;
					}else{
					ob_start();	
					wp_redirect(get_home_url());	
					exit;	
					}
					}
				}
				
			}
			function scripts(){
				global $sp_verify;
	if($sp_verify['enabled'] == 1 && !is_admin()){
				if($_COOKIE['sp_age_check'] != 1){

	wp_enqueue_script( 'sp-script',plugins_url('/js/scripts.js', __FILE__) , array('jquery'));			}
	}
			}
			function wall(){
				global $sp_verify;
				
				if($sp_verify['enabled'] == 1 && !is_admin()){
				
				if($_COOKIE['sp_age_check'] != 1){
					
					if($sp_verify['font']['google'] == 'true'){
						echo '  <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family='.$sp_verify['font']['font-family'].'">';
					}
					if($sp_verify['under_age_font']['google'] == 'true'){
						echo '  <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family='.$sp_verify['under_age_font']['font-family'].'">';
					}
					if($sp_verify['over_age_font']['google'] == 'true'){
						echo '  <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family='.$sp_verify['over_age_font']['font-family'].'">';
					}
					
					print_r($sp_verify);
					echo '<style type="text/css">
							.ao_lay {
								position: absolute;
								top: 0;
								left: 0;
								width: 100%;
								height: 800%;
								background-color: '.$sp_verify['background']['background-color'].';
								
								z-index: 99999999999999999999999999;
							}
							';
							if($sp_verify['background']['background-image'] != ''){
							echo '
							.ao_lay {
								background-image:url('.$sp_verify['background']['background-image'].');
								background-repeat:'.$sp_verify['background']['background-repeat'].';
								background-attachment:'.$sp_verify['background']['background-attachment'].';
								background-position:'.$sp_verify['background']['background-position'].';
								}
							
							';
								
							}
							echo'
							.sp-verify-text h1{color:'.$sp_verify['font']['color'].';font-size:'.$sp_verify['font']['font-size'].'; font-family:'.$sp_verify['font']['font-family'].'; font-height:'.$sp_verify['font']['font-height'].'; font-height:'.$sp_verify['font']['font-weight'].'; font-weight:'.$sp_verify['over_age_font']['font-weight'].'}
							
							
							a.over_age_button{background-color:'.$sp_verify['over_age_bg'].';color:'.$sp_verify['over_age_font']['color'].';font-size:'.$sp_verify['over_age_font']['font-size'].'; font-family:'.$sp_verify['over_age_font']['font-family'].'; font-height:'.$sp_verify['over_age_font']['font-height'].'; font-weight:'.$sp_verify['over_age_font']['font-weight'].'} 
							a:hover.over_age_button{
							background-color:'.$sp_verify['over_age_bg_hover'].';
							} 	
							a.under_age_button{background-color:'.$sp_verify['under_age_bg'].';color:'.$sp_verify['under_age_font']['color'].';font-size:'.$sp_verify['under_age_font']['font-size'].'; font-family:'.$sp_verify['under_age_font']['font-family'].'; font-height:'.$sp_verify['under_age_font']['font-height'].'; font-weight:'.$sp_verify['under_age_font']['font-weight'].'} 
						a:hover.under_age_button{
							 background-color:'.$sp_verify['under_age_bg_hover'].';
							 
								} 
							
							'.$sp_verify['css_editor_page'].'
							
							
							
															

							';
							
							
							
						  echo'</style>
						  
						  <div class="ao_lay">';
					
						  
						  
						  
						  
						  echo '<div class="age-verify-wrapper">';
						
					   if($sp_verify['alternative-text-switch'] == 1){
						 
						 if($sp_verify['logo']['url'] != ''){	
						 echo '<div class="sp-verify-logo"><img src="'.$sp_verify['logo']['url'].'"></div>';	  
						 }
						 if($sp_verify['begining-text'] != '' && $_COOKIE['sp_age_check'] != 'under'){	
						 echo '<div class="sp-verify-text"><h1>'.$sp_verify['begining-text'].'</h1></div>';	  
						 }
						  }else{
							 if($sp_verify['alternative-above-buttons'] != ''  && $_COOKIE['sp_age_check'] != 'under'){	
						 echo '<div class="sp-verify-text">'.$sp_verify['alternative-above-buttons'].'</div>';	  
						 }  
							  
					  }
							  
							  
							  	if($_COOKIE['sp_age_check'] == 'under'){
					
										if($sp_verify['under_age_redirect'] != ''){
											
										echo '<script type="text/javascript">
<!--
window.location = "'.$sp_verify['under_age_redirect'].'"
//-->
</script>';
										
										exit;	
											
										}else{
										echo '<div class="sp-verify-text"><h1>'.$sp_verify['under_age_message'].'</h1></div>'; 	
										}
						
						
						
						
								}else{
						  
					
						 
						 echo '<div class="sp-verify-images">';
						 
						  if($sp_verify['display-type'] == 0){
							  
							  echo '<div class="sp_age_form"><form action="'.get_home_url().'" method="get" class="sp_submit_form">'; 
							echo '<select name="sp_day" class="sp_day">';
	  echo '<option value="">Day</option>';
		for($i = 1; $i <= 31; $i++){
		  $i = str_pad($i, 2, 0, STR_PAD_LEFT);
			echo "<option value='$i'>$i</option>";
		}
	echo '</select>';
					
	echo '<select name="sp_month" class="sp_month">';
		echo '<option value="">Month</option>';
		for($i = 1; $i <= 12; $i++){
		  $i = str_pad($i, 2, 0, STR_PAD_LEFT);
			echo "<option value='$i'>$i</option>";
		}
	echo '</select> ';
	
							  echo '<select name="sp_year" class="sp_year">';
	 
	  echo '<option value="">Year</option>';
		for($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--){
		  echo "<option value='$i'>$i</option>";
		} 
	echo '</select> ';
							  
							  
							  echo ' <a href="#" class="over_age_button sp_verify_submit">Enter</a></form></div>
							  ';	
						  }else{
						 
						 
							  if($sp_verify['image-or-text'] == 1){
								  
								  echo '<div class="sp-button-holder"><a href="?sp_confirm_age=1" class="over_age_button sp_over_age_limit">'.$sp_verify['over_age_text'].'</a></div>
										<div class="sp-button-holder"><a href="?sp_confirm_age=0" class="under_age_button sp_under_age_limit">'.$sp_verify['under_age_text'].'</a></div>';
								  
							  }else{
								  if($sp_verify['over_age_image']['url'] != ''){
								   echo '<div class="sp-button-holder"><a href="?sp_confirm_age=1" class="over_age_button_image sp_over_age_limit"><img src="'.$sp_verify['over_age_image']['url'].'"></a></div>';
								  }
								  if($sp_verify['under_age_image']['url'] != ''){
								   echo '<div class="sp-button-holder"><a href="?sp_confirm_age=0" class="under_age_button_image sp_under_age_limit"><img src="'.$sp_verify['under_age_image']['url'].'"></a></div>';
								  }
							  }
						  }
						  echo '<div style="clear:both"></div></div>';
						 
					}
						  echo'</div></div>
						  ';
					
					
				}
				
					
				}		
			
			}
	
	
	
	
}