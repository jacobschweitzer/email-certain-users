<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2><?php esc_html_e( WPPS_NAME ); ?> Settings</h2>
	<form method="post" action="options.php">
		<?php settings_fields( 'ecu_settings' ); ?>
		<?php do_settings_sections( 'ecu_settings' );
		$args = array(
			'meta_query' => array(
				array(
					'key' => 'disc_code',
					'value' => ' ',
					'compare' => 'NOT EXISTS'
				),
				array(
					'key' => 'values_code',
					'value' => ' ',
					'compare' => 'NOT EXISTS'
				)
			)
		 );

		$selected_users = get_users( $args );
		$emails = '';
		foreach ( $selected_users as $user ) {
			$emails[] =  $user->user_email;
		}
		$emails_string = implode(',', $emails);
		?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="comma_separated_email_addresses">Email Addresses</label></th>
					<td>
						<textarea type="text" class="large-text"  name="comma_separated_email_addresses" /><?php echo $emails_string; ?></textarea>
					</td>
				</tr>
			</tbody>
		</table>


		
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" value="<?php esc_attr_e( 'Send Emails' ); ?>" />
		</p>
	</form>
	<?php 
		//update_user_meta( 2, 'disc_code', 'asdfads' );
		//update_user_meta( 2, 'values_code', 'asdfads' );
		//delete_user_meta( 2, 'disc_code' );
		//delete_user_meta( 2, 'values_code' );
		
		echo '<table>';
		foreach ( $selected_users as $user ) {
			//print_r($user);
			echo '<tr>';
				
				
				echo '<td>';
				echo $user->ID;
				echo '</td>';

				echo '<td>';
				echo $user->user_login;
				echo '</td>';

				echo '<td>';
				echo $user->user_email;
				echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	?>
</div> <!-- .wrap -->
