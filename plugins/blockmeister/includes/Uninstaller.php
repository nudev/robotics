<?php

namespace ProDevign\BlockMeister;

class Uninstaller {
	public static function uninstall() {

		if ( current_user_can( 'delete_plugins' ) ) {
			self::delete_custom_posts();
			// we warn about this in the FAQ
			self::delete_custom_taxonomy_terms();
			// we warn about this in the FAQ
			self::remove_capabilities();
			self::delete_options();
		} else {
			wp_die( 'User not allowed to delete plugins.' );
		}

	}

	/**
	 * Delete all blockmeister related posts, meta and term relationships.
	 */
	private static function delete_custom_posts() {
		$post_ids = get_posts( [
			'post_type'   => 'blockmeister_pattern',
			'post_status' => 'any',
			'fields'      => 'ids',
			'numberposts' => - 1,
		] );
		foreach ( $post_ids as $post_id ) {
			wp_delete_post( $post_id, true );
		}
	}

	/**
	 * Delete all blockmeister custom taxonomies terms
	 *
	 * Remember: the actual taxonomy registration is NOT run during uninstall,
	 *           so it won't be available here.
	 */
	private static function delete_custom_taxonomy_terms() {
		global $wpdb;
		$query = "SELECT t.term_id FROM $wpdb->terms AS t INNER JOIN $wpdb->term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy IN ('pattern_category','pattern_keyword')";
		$term_ids = $wpdb->get_col( $query );

		foreach ( $term_ids as $term_id ) {
			$wpdb->delete( $wpdb->terms, ['term_id' => $term_id] );
			$wpdb->delete( $wpdb->termmeta, ['term_id' => $term_id] );
			$wpdb->delete( $wpdb->term_taxonomy, ['term_id' => $term_id] );
			$wpdb->delete( $wpdb->term_relationships, ['term_taxonomy_id' => $term_id] ); // in current WP both fields contain always the same value
		}
	}

	/**
	 * Loops all roles and user capabilities and removes any blockmeister related cap.
	 */
	private static function remove_capabilities() {
		// remove blockmeister related caps form any role:
		$editable_roles = get_editable_roles();
		foreach ( $editable_roles as $role_slug => $editable_role ) {
			$role = get_role( $role_slug );
			foreach ( $role->capabilities as $capability => $is_true ) {
				if ( $is_true && preg_match( "/blockmeister/", $capability ) ) {
					$role->remove_cap( $capability );
				}
			}
		}
		// remove blockmeister related caps from any user:
		$users = get_users();
		foreach ( $users as $user ) {
			foreach ( $user->allcaps as $capability => $is_true ) {
				if ( $is_true && preg_match( "/blockmeister/", $capability ) ) {
					$user->remove_cap( $capability );
				}
			}
		}
	}

	/**
	 * Delete any option that starts with 'blockmeister_'.
	 */
	private static function delete_options() {
		global $wpdb;
		$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'blockmeister_%'" );
	}

}