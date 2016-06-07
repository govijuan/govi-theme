<?php
	add_action('admin_menu', 'govi_theme_menu');
	function govi_theme_menu (){
		$page_title = "Govi Theme Settings";
		$menu_title = "Govi Theme Settings";
		$capability = "administrator";
		$menu_slug = "govi-theme-settings";
		$function = "govi_main_theme_menu";
		//$icon_url = get_template_directory_uri(). "/admin/images/settings_icon.png";
		
		//add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url);
		add_theme_page($page_title, $menu_title, $capability, $menu_slug, $function);
	}	
	
	function add_my_favicon(){
		echo '<link rel="icon" type="image/png" href="'.get_option('govi_favicon'). '" >';
	}
	add_action('admin_head', 'add_my_favicon');
	 
	function govi_main_theme_menu(){
		$current_user = wp_get_current_user();
		$user_id = $current_user->ID;
		if(!user_can( $user_id, 'create_users'))
			return false;
	
	?>
<div class="wrap govi-panel-wrap">
	<div class="govi-admin-title-wrap"><h2>Govi Theme Options</h2></div>
	<div class="settings-top-strip"><a id="general-button" class="general-save-button" href="#">Save Theme Options</a></div>
	<div id="tabs">
		<ul>
			<li><a rel="govi-generla-settings" href="#govi-general-settings">General Settings</a></li>
			<li><a rel="govi-homepage-settings" href="#govi-home-settings">Homepage Settings</a></li>
			<li><a  rel="govi-font-style" href="#govi-font-style">Font Style</a></li>
			<li><a  rel="govi-element-settings" href="#govi-element-setings">Elements Settings</a></li>
			<li><a rel="govi-color-picker-elements-tab" href="#govi-color-picker">Elements Colors</a></li>
		</ul>
	
	<?php 	general_settings ();
			govi_home_settings ();
			govi_font_style ();
			govi_element_settings ();
			govi_color_picker_elements_tab ();
	?> 
</div>
<div class="settings-bottom-strip"><a id="general-button" class="general-save-button" href="#">Save Theme Options</a></div>
</div>

<?php }

	function govi_enque_script(){
		wp_enqueue_script('jquery');
		wp_enqueue_media();
		wp_enqueue_script('govi-framework-tabs', get_template_directory_uri()."/js/govi-featured.js");
		wp_enqueue_script('govi-js-ui-script', get_template_directory_uri(). "/js/jquery-ui.js");
		wp_enqueue_script('govi-my-script', get_template_directory_uri(). "/js/my-script.js");
		wp_enqueue_style( 'govi-js-ui-style', get_template_directory_uri()."/css/jquery-ui.css");
		wp_enqueue_style( 'govi-js-ui-style-structure', get_template_directory_uri()."/css/jquery-ui.structure.css");
		wp_enqueue_style( 'govi-js-ui-style-theme', get_template_directory_uri()."/css/jquery-ui.theme.css");
		wp_enqueue_style( 'govi-js-ui-admin-style', get_template_directory_uri()."/css/admin.css");
		
	}
	
	add_action('admin_init', 'govi_enque_script');
	
	function general_settings (){ ?>
		
		<div id="govi-general-settings" class="govi-element">
			<div class="panel-body">
				<h2>General Settings</h2>
				<!-- Input Field -->
				<!-- Logo Upload -->
				<label for="our-logo-upload">Upload Your Logo:</label>
				<input type="text" id="our-logo-upload" name="our-logo-upload" value="<?php echo get_option('govi_logo'); ?>"/> <input type="button" id="upload_image_logo_button" value="Upload Image"/>
				<!-- Favicon Upload --><br/><br/>
				<label for="our-favicon-upload">Upload Your Favicon:</label>
				<input type="text" id="our-favicon-upload" name="our-favicon-upload" value="<?php echo get_option('govi_favicon'); ?>"/> <input type="button" id="upload_favicon_button" value="Upload Favicon"/><br/><br/>
				<!-- Google Analytics -->
				<label>Google Analytics</label> 
				<textarea id="our-analytics"><?php if( get_option('govi_analytics') == ""){ echo "Put your Google Analytics or other code here!";} else { echo get_option('govi_analytics');} ?> 
				</textarea>
				
				<div id="save-message-general" style="display:none"></div>
			</div> <!-- Close panel-body div -->
		</div>  
	
		
<?php
	}
	
	function govi_home_settings(){?>
		<div id="govi-home-settings" class="govi-element">
			<div class="panel-body">
				<h2>Homepage Settings</h2>
				<label for="our-featured-bg-img">Upload Top Featured Background Image:</label>
				<input type="text" id="our-featured-bg-img" name="our-featured-bg-img" value="<?php echo get_option('govi_feat_bg_image'); ?>"/> <input type="button" id="upload_f_bg_image_button" value="Upload Image"/>
			</div>
		</div>
		
	<?php
	}
	
	function govi_font_style(){?>
		<div id="govi-font-style" class="govi-element">
			<div class="panel-body">
				<h2>Font Styles</h2>
				<p>Here we put the content for the font styles</p>
			</div>
		</div>
		
	<?php
	}

	function govi_element_settings(){?>
		<div id="govi-element-setings" class="govi-element">
			<div class="panel-body">
				<h2>Element Settings</h2>
				<p>Here we put the content for the element settings or whatever.</p>
			</div>
		</div>
	
	<?php
	}
	
	function govi_color_picker_elements_tab(){?>
		<div id="govi-color-picker" class="govi-element">
			<div class="panel-body">
				<h2>Elements Colors</h2>
				<p>Here we put the content for the color picker elements or whatever.</p>
			</div>
		</div>
	
	<?php
	}
	
	add_action('admin_footer', 'govi_js_init' );
	
	function govi_js_init(){
	?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				$('#general-button').live('click', function(){
					var govilogo = $('#our-logo-upload').val();
					var govifavicon = $('#our-favicon-upload').val();
					var govianalytics = $('#our-analytics').val();
					var govifeatbgimage = $('#our-featured-bg-img').val();
					
					var data = {
						action: 'general_settings_action',
						govi_logo: govilogo,
						govi_favicon: govifavicon,
						govi_analytics: govianalytics,
						govi_feat_bg_image: govifeatbgimage,
						
						
					};
					
					$.post(ajaxurl, data, function(response){
						$('#save-message-general').html('Loading...');
						$('#save-message-general').show(2000);
						
					})
					.success(function(){})
					.error(function(){ alert("error");})
					.complete(function(){ $('#save-message-general').html('Gereral Settings Saved!').hide(5000); });
				}); 
			}); 
		
		</script>
	<?php
	}
	add_action('wp_ajax_general_settings_action', 'govi_general_settings_save');
	function govi_general_settings_save(){
		$govi_logo = $_POST['govi_logo'];
		$govi_favicon = $_POST['govi_favicon'];
		$govi_analytics = $_POST['govi_analytics'];
		$govi_feat_bg_image = $_POST['govi_feat_bg_image'];
		
		update_option( 'govi_logo', $govi_logo );
		update_option( 'govi_favicon', $govi_favicon );
		update_option( 'govi_analytics', $govi_analytics );
		update_option('govi_feat_bg_image', $govi_feat_bg_image);
		
		echo "Success";
		
		die;
	}
	
	
	