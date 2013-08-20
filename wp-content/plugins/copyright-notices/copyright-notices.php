<?php
/*
Plugin Name: Copyright Notices
Plugin URIL http://www.xxxxx.com
Description: A plugin that allows the user to set Copyright text in the theme and ontrol it from WordPress Admin.
Author: Runby97
Version: 1.0
Author URI: http://www.xxxxx.com
*/
function copyright_notices_admin()
{
	if(isset($_POST['submit'])){
	    if(wp_verify_nonce($_POST['_wpnonce'],'copyright_notices_admin_options-update')){
	    	update_option('copyright_notices_text', stripslashes($_POST['copyright_text']));
	    	echo '<div class="updated"<p>' . __('Success! Yourchanges were successfully saved!') . '</p></div>';
	    }	else{
	    	echo '<div class="error"><p>' . __('Whoops! There was a problem with the data you posted. Please try again.') . '</div>';
	    }
	}
?>
    <div class="wrap">
        <?php screen_icon();?>
        <h2>Copyright Notices Configuration</h2>
        <p>On this page, you will configure all the aspects of this plugins.</p>
        <form action="" method="post" id="copyright-notices-conf-form">
            <h3><label for="copyright_text">Copyright Text to be inserted in the footer of your theme</label></h3>
            <p>
                <input type="text" name="copyright_text" id="copyright_text" value="<?php echo esc_attr(get_option('copyright_notices_text'));?>"/>
            </p>
            <p class="submit">
                <input type="submit" name="submit" value"Update options &raquo;" />
            </p>
            <?php wp_nonce_field('copyright_notices_admin_options-update');?>
        </form>
    </div>
<?php 
}

function copyright_notices_admin_page()
{
	add_submenu_page('plugins.php','Copyright Notices Configuration', 'Copyright Notices Configuration','manage_options','copyright-notices','copyright_notices_admin');
}

function display_copyright()
{
	if($copyright_text = get_option('copyright_notices_text')){
	$footer = '
		<footer id="colophon" role="contentinfo">
			<div class="site-info">
				<a title="优雅的个人发布平台" href="http://cn.wordpress.org/"> ' . $copyright_text . '</a>
			</div>
		</footer>';
	echo $footer;
	}
}


add_action('admin_menu', 'copyright_notices_admin_page');
add_action('wp_footer', 'display_copyright');

//title filter
/*function display_copyright_home($post_content)
 {
if(($copyright_text = get_option('copyright_notices_text')) && is_home())
	return $post_content . $copyright_text;
return $post_content;
}*/
//add_filter('the_title', 'display_copyright_home');























?>