<?php
/*
If you would like to edit this file, copy it to your current theme's directory and edit it there.
Theme My Login will always look in your theme's directory first, before using this default template.
*/

require get_template_directory() . '/inc/theme-options.php';

?>
<div class="tml tml-profile" id="theme-my-login<?php $template->the_instance(); ?>">
    <?php if ( $boxed ){ ?><div class="container"><?php } ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <?php $template->the_action_template_message( 'profile' ); ?>
                <?php $template->the_errors(); ?>
                <form id="your-profile" action="<?php $template->the_action_url( 'profile', 'login_post' ); ?>" method="post">
                    <?php wp_nonce_field( 'update-user_' . $current_user->ID ); ?>
                    <input type="hidden" name="from" value="profile" />
                    <input type="hidden" name="checkuser_id" value="<?php echo $current_user->ID; ?>" />
                    
                    <div class="form-group">
                        <label for="user_login"><?php _e( 'Username', 'startup-reloaded' ); ?></label>
                        <input type="text" name="user_login" id="user_login" value="<?php echo esc_attr( $profileuser->user_login ); ?>" disabled="disabled" class="form-control" />
                        <span class="help-block"><?php _e( 'Usernames cannot be changed.', 'startup-reloaded' ); ?></span>
                    </div>

                    <div class="form-group">
                        <label for="first_name"><?php _e( 'First Name', 'startup-reloaded' ); ?></label>
                        <input type="text" name="first_name" id="first_name" value="<?php echo esc_attr( $profileuser->first_name ); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="last_name"><?php _e( 'Last Name', 'startup-reloaded' ); ?></label>
                        <input type="text" name="last_name" id="last_name" value="<?php echo esc_attr( $profileuser->last_name ); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="nickname"><?php _e( 'Nickname', 'startup-reloaded' ); ?> <?php _e( '(required)', 'startup-reloaded' ); ?></label>
                        <input type="text" name="nickname" id="nickname" value="<?php echo esc_attr( $profileuser->nickname ); ?>" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="display_name"><?php _e( 'Display name publicly as', 'startup-reloaded' ); ?></label>
                        <select name="display_name" id="display_name" class="form-control">
                            <?php
                            $public_display = array();
                            $public_display['display_nickname']  = $profileuser->nickname;
                            $public_display['display_username']  = $profileuser->user_login;

                            if ( ! empty( $profileuser->first_name ) )
                            $public_display['display_firstname'] = $profileuser->first_name;

                            if ( ! empty( $profileuser->last_name ) )
                            $public_display['display_lastname'] = $profileuser->last_name;

                            if ( ! empty( $profileuser->first_name ) && ! empty( $profileuser->last_name ) ) {
                            $public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
                            $public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;
                            }

                            if ( ! in_array( $profileuser->display_name, $public_display ) )// Only add this if it isn't duplicated elsewhere
                            $public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;

                            $public_display = array_map( 'trim', $public_display );
                            $public_display = array_unique( $public_display );

                            foreach ( $public_display as $id => $item ) {
                            ?>
                                <option <?php selected( $profileuser->display_name, $item ); ?>><?php echo $item; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email"><?php _e( 'E-mail', 'startup-reloaded' ); ?> <?php _e( '(required)', 'startup-reloaded' ); ?></label>
                        <input type="text" name="email" id="email" value="<?php echo esc_attr( $profileuser->user_email ); ?>" class="form-control" />
                    </div>
                    
                    <?php
                    $new_email = get_option( $current_user->ID . '_new_email' );
                    if ( $new_email && $new_email['newemail'] != $current_user->user_email ) : ?>
                        <div class="updated inline">
                            <p><?php
                                printf(__( 'There is a pending change of your e-mail to %1$s. <a href="%2$s">Cancel</a>', 'startup-reloaded' ), '<code>' . $new_email['newemail'] . '</code>', esc_url( self_admin_url( 'profile.php?dismiss=' . $current_user->ID . '_new_email' ) )
                            ); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php
                    $show_password_fields = apply_filters( 'show_password_fields', true, $profileuser );
                    if ( $show_password_fields ) :
                    ?>

                        <table class="tml-form-table">
                            <tr id="password" class="user-pass1-wrap">
                                <td>
                                    <input class="hidden" value=" " /><!-- #24364 workaround -->
                                    <button type="button" class="btn btn-default button button-secondary wp-generate-pw hide-if-no-js"><?php _e( 'Change Password', 'startup-reloaded' ); ?></button>
                                    <div class="wp-pwd hide-if-js">
                                        <span class="password-input-wrapper">
                                            <div class="form-group">
                                                <input type="password" name="pass1" id="pass1" class="form-control regular-text" value="" autocomplete="off" data-pw="<?php echo esc_attr( wp_generate_password( 24 ) ); ?>" aria-describedby="pass-strength-result" />
                                            </div>
                                        </span>
                                        <div style="display:none" id="pass-strength-result" aria-live="polite"></div>
                                        <button type="button" class="btn btn-default button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Hide password', 'startup-reloaded' ); ?>">
                                            <span class="dashicons dashicons-hidden"></span>
                                            <span class="text"><?php _e( 'Hide', 'startup-reloaded' ); ?></span>
                                        </button>
                                        <button type="button" class="btn btn-default button button-secondary wp-cancel-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Cancel password change', 'startup-reloaded' ); ?>">
                                            <span class="text"><?php _e( 'Cancel', 'startup-reloaded' ); ?></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="user-pass2-wrap hide-if-js">
                                <td>
                                    <div class="form-group">
                                        <input name="pass2" type="password" id="pass2" class="form-control regular-text" value="" autocomplete="off" />
                                        <p class="help-block"><?php _e( 'Type your new password again.', 'startup-reloaded' ); ?></p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="pw-weak">
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="pw_weak" class="pw-checkbox" /> <?php _e( 'Confirm use of weak password', 'startup-reloaded' ); ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    <?php endif; ?>

                    <?php do_action( 'show_user_profile', $profileuser ); ?>

                    <input type="hidden" name="action" value="profile" />
                    <input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo esc_attr( $current_user->ID ); ?>" />

                    <input type="submit" class="btn btn-default" value="<?php esc_attr_e( 'Update Profile', 'startup-reloaded' ); ?>" name="submit" id="submit" />

                </form>
            </div>
        </div>
    <?php if ( $boxed ){ ?></div><?php } ?>
</div>