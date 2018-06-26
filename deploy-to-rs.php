<?php
/*
 * Plugin Name: Deploy to RS 
 */
add_action('admin_menu', 'deploy_menu');

function deploy_menu() {
    add_menu_page('Deploy', 'Deploy Settings', 'administrator', __FILE__, 'deploy_settings_page' , plugins_url('/images/icon.png', __FILE__));
    add_action('admin_init', 'deploy_settings');
}

function deploy_settings() {
    //register our settings
    register_setting('deploy-settings-group', 'bucket_name');
    register_setting('deploy-settings-group', 'site_url');
    register_setting('deploy-settings-group', 'api_id');
    register_setting('deploy-settings-group', 'api_key');
}
function deploy_settings_page() {
?>
<div class="wrap">
<h1>Deploy to RSO Cloud Storage</h1>

<form method="post" action="options.php">
    <?php settings_fields('deploy-settings-group'); ?>
    <?php do_settings_sections('deploy-settings-group'); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Bucket Name</th>
        <td><input type="text" name="bucket_name" value="<?php echo esc_attr( get_option('bucket_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Site URL</th>
        <td><input type="text" name="site_url" value="<?php echo esc_attr( get_option('site_url') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">API ID</th>
        <td><input type="text" name="api_id" value="<?php echo esc_attr( get_option('api_id') ); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">API KEY</th>
        <td><input type="text" name="api_key" value="<?php echo esc_attr( get_option('api_key') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>
