<?php
if ( 'ecu_email_subject' == $field['label_for'] ) { ?>

	<input id="<?php esc_attr_e( 'ecu_settings[email_subject]' ); ?>" name="<?php esc_attr_e( 'ecu_settings[email_subject]' ); ?>" class="regular-text" value="<?php esc_attr_e( $settings['email_subject'] ); ?>" />

<?php } ?>


<?php if ( 'ecu_email_message' == $field['label_for'] ) { ?>

	<textarea id="<?php esc_attr_e( 'ecu_settings[email_message]' ); ?>" name="<?php esc_attr_e( 'ecu_settings[email_message]' ); ?>" class="large-text"><?php echo esc_textarea( $settings['email_message'] ); ?></textarea>
<?php } ?>