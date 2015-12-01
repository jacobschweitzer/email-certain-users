<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2><?php esc_html_e( WPPS_NAME ); ?> Settings</h2>
	<form method="post" action="options.php">
		<?php settings_fields( 'ecu_settings' ); ?>
		<?php do_settings_sections( 'ecu_settings' );
		$args = array();

		$selected_users = get_users( $args );
		$emails = '';
		global $wpdb;
		$filtered_users = array();
		foreach ( $selected_users as $user ) {
			$values_code = get_user_meta( $user->ID, 'values_code', true );
			$instrumentDetails = $wpdb->get_row("SELECT ID FROM ".$wpdb->prefix ."abeo_survey_instruments WHERE code = '".$values_code."' AND type = 'values'",ARRAY_A);
			$instrumentID = $instrumentDetails['ID'];
			$sql = "SELECT * FROM ".$wpdb->prefix ."abeo_survey_valuescore WHERE instrumentID = '".$instrumentID."'";
			$details = $wpdb->get_results($sql, ARRAY_A);

			$disc_code = get_user_meta( $user->ID, 'disc_code', true );
			$disc_instrumentDetails = $wpdb->get_row("SELECT ID FROM ".$wpdb->prefix ."abeo_survey_instruments WHERE code = '".$disc_code."' AND type = 'disc'",ARRAY_A);
			$disc_instrumentID = $disc_instrumentDetails['ID'];
			$disc_sql = "SELECT * FROM ".$wpdb->prefix ."abeo_survey_discscore WHERE instrumentID = '".$disc_instrumentID."'";
			$disc_details = $wpdb->get_results($disc_sql, ARRAY_A);

			if ( empty($details) || empty($disc_details) ) {
				$emails[] =  $user->user_email;
				$filtered_users[] = array( 'ID' => $user->ID, 'login' => $user->user_login, 'email' => $user->user_email );
			}
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
		echo '<table>';
		foreach ( $filtered_users as $user ) {
			echo '<tr>';
				echo '<td>';
				echo $user['ID'];
				echo '</td>';

				echo '<td>';
				echo $user['login'];
				echo '</td>';

				echo '<td>';
				echo $user['email'];
				echo '</td>';
			echo '</tr>';
		}
		echo '</table>';
	?>
</div> <!-- .wrap -->
