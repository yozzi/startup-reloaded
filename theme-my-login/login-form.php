<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/
?>
<div class="login row" id="theme-my-login<?php $template->the_instance(); ?>">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <?php $template->the_action_template_message( 'login' ); ?>
        <?php $template->the_errors(); ?>
        <form name="loginform" id="loginform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'login' ); ?>" method="post" role="form">
            <div class="form-group">
                <label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username', 'theme-my-login' ); ?></label>
                <input type="text" name="log" id="user_login<?php $template->the_instance(); ?>" class="input form-control" value="<?php $template->the_posted_value( 'log' ); ?>" size="20" />
            </div>
            <div class="form-group">
                <label for="user_pass<?php $template->the_instance(); ?>"><?php _e( 'Password', 'theme-my-login' ); ?></label>
                <input type="password" name="pwd" id="user_pass<?php $template->the_instance(); ?>" class="input form-control" value="" size="20" autocomplete="off" />
            </div>

            <?php do_action( 'login_form' ); ?>

            <div class="forgetmenot checkbox">
                <label for="rememberme<?php $template->the_instance(); ?>"><input name="rememberme" type="checkbox" id="rememberme<?php $template->the_instance(); ?>" value="forever" /><?php esc_attr_e( 'Remember Me', 'theme-my-login' ); ?></label>
            </div>
            <input class="btn btn-custom" type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Log In', 'theme-my-login' ); ?>" />
            <input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'login' ); ?>" />
            <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
            <input type="hidden" name="action" value="login" />
        </form>
        <p>
            <?php $template->the_action_links( array( 'login' => false ) ); ?>
        </p>
    </div>
</div>
