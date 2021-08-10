<?php

namespace WebpConverter\Error;

/**
 * Checks for configuration errors about incorrect paths of directories.
 */
class PathsError extends ErrorAbstract implements ErrorInterface {

	/**
	 * Returns list of error codes.
	 *
	 * @return string[] Error codes.
	 */
	public function get_error_codes(): array {
		$errors = [];

		if ( $this->if_uploads_path_exists() !== true ) {
			$errors[] = 'path_uploads_unavailable';
		} elseif ( $this->if_htaccess_is_writeable() !== true ) {
			$errors[] = 'path_htaccess_not_writable';
		}

		if ( $this->if_paths_are_different() !== true ) {
			$errors[] = 'path_webp_duplicated';
		} elseif ( $this->if_webp_path_is_writeable() !== true ) {
			$errors[] = 'path_webp_not_writable';
		}

		return $errors;
	}

	/**
	 * Checks if path of uploads directory is exists.
	 *
	 * @return bool Verification status.
	 */
	private function if_uploads_path_exists(): bool {
		$path = apply_filters( 'webpc_dir_path', '', 'uploads' );
		return ( is_dir( $path ) && ( $path !== ABSPATH ) );
	}

	/**
	 * Checks if paths of wp-content and uploads directories are writable.
	 *
	 * @return bool Verification status.
	 */
	private function if_htaccess_is_writeable(): bool {
		$path_dir  = apply_filters( 'webpc_dir_path', '', 'uploads' );
		$path_file = $path_dir . '/.htaccess';
		if ( file_exists( $path_file ) ) {
			return ( is_readable( $path_file ) && is_writable( $path_file ) );
		} else {
			return is_writable( $path_dir );
		}
	}

	/**
	 * Checks if uploads directory path and output directory are different.
	 *
	 * @return bool Verification status.
	 */
	private function if_paths_are_different(): bool {
		$path_uploads = apply_filters( 'webpc_dir_path', '', 'uploads' );
		$path_webp    = apply_filters( 'webpc_dir_path', '', 'webp' );
		return ( $path_uploads !== $path_webp );
	}

	/**
	 * Checks if path of output directory is writable.
	 *
	 * @return bool Verification status.
	 */
	private function if_webp_path_is_writeable(): bool {
		$path = apply_filters( 'webpc_dir_path', '', 'webp' );
		return ( is_dir( $path ) || is_writable( dirname( $path ) ) );
	}
}
