<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! class_exists( 'Oneline_Lite_Plugin_Notice' ) ) :

class Oneline_Lite_Plugin_Notice {

	const PLUGIN_SLUG = 'themehunk-customizer';
	const PLUGIN_FILE = 'themehunk-customizer/themehunk-customizer.php';
	const NOTICE_META = 'oneline_lite_customizer_notice_dismissed';

	public function __construct() {
		add_action( 'admin_notices',             array( $this, 'render_notice' ) );
		add_action( 'admin_head',                array( $this, 'notice_styles' ) );
		add_action( 'wp_ajax_oneline_lite_dismiss_plugin_notice', array( $this, 'dismiss_notice' ) );
	}

	private function is_dismissed() {
		return (bool) get_user_meta( get_current_user_id(), self::NOTICE_META, true );
	}

	private function plugin_status() {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}
		if ( is_plugin_active( self::PLUGIN_FILE ) ) {
			return 'active';
		}
		if ( file_exists( WP_PLUGIN_DIR . '/' . self::PLUGIN_FILE ) ) {
			return 'inactive';
		}
		return 'not_installed';
	}

	private function should_show() {
		return ! $this->is_dismissed()
			&& $this->plugin_status() !== 'active'
			&& current_user_can( 'install_plugins' );
	}

	public function notice_styles() {
		if ( ! $this->should_show() ) return;
		?>
		<style>
		.oneline-plugin-notice {
			display: flex;
			align-items: center;
			background: #fff;
			border: 1px solid #c3c4c7;
			border-left: 4px solid #2271b1;
			box-shadow: 0 1px 1px rgba(0,0,0,.04);
			padding: 16px 20px;
			position: relative;
			margin: 5px 0 20px;
		}
		.oneline-plugin-notice .th-notice-icon {
			display: flex;
			align-items: center;
			justify-content: center;
			width: 44px;
			height: 44px;
			background: #1d2327;
			border-radius: 50%;
			flex-shrink: 0;
			margin-right: 16px;
			overflow: hidden;
		}
		.oneline-plugin-notice .th-notice-icon img {
			width: 28px;
			height: 28px;
			object-fit: contain;
		}
		.oneline-plugin-notice .th-notice-body {
			flex: 1;
		}
		.oneline-plugin-notice .th-notice-body strong {
			display: block;
			font-size: 14px;
			margin-bottom: 5px;
			color: #1d2327;
		}
		.oneline-plugin-notice .th-notice-body p {
			margin: 0 0 12px;
			color: #50575e;
			font-size: 13px;
			line-height: 1.6;
		}
		.oneline-plugin-notice .th-notice-actions {
			display: flex;
			align-items: center;
			gap: 14px;
			flex-wrap: wrap;
		}
		.oneline-plugin-notice .th-notice-actions .button-primary {
			text-decoration: none;
			height: 34px;
			line-height: 32px;
			padding: 0 14px;
		}
		.oneline-plugin-notice .th-notice-actions .th-why-link {
			color: #2271b1;
			text-decoration: none;
			font-size: 13px;
		}
		.oneline-plugin-notice .th-notice-actions .th-why-link:hover {
			text-decoration: underline;
		}
		.oneline-plugin-notice .th-notice-dismiss {
			position: absolute;
			top: 10px;
			right: 14px;
			background: none;
			border: none;
			cursor: pointer;
			color: #787c82;
			font-size: 16px;
			line-height: 1;
			padding: 2px;
		}
		.oneline-plugin-notice .th-notice-dismiss:hover {
			color: #1d2327;
		}
		</style>
		<?php
	}

	public function render_notice() {
		if ( ! $this->should_show() ) return;

		$status   = $this->plugin_status();
		$theme    = wp_get_theme();
		$icon_url = get_template_directory_uri() . '/inc/th-option/assets/images/icon.png';
		$nonce    = wp_create_nonce( 'oneline_lite_dismiss_notice' );

		if ( $status === 'not_installed' ) {
			$action_url = wp_nonce_url(
				add_query_arg(
					array( 'action' => 'install-plugin', 'plugin' => self::PLUGIN_SLUG ),
					network_admin_url( 'update.php' )
				),
				'install-plugin_' . self::PLUGIN_SLUG
			);
			$btn_label = __( 'Install Themehunk Customizer', 'oneline-lite' );
		} else {
			$action_url = wp_nonce_url(
				add_query_arg(
					array(
						'action'        => 'activate',
						'plugin'        => rawurlencode( self::PLUGIN_FILE ),
						'plugin_status' => 'all',
					),
					admin_url( 'plugins.php' )
				),
				'activate-plugin_' . self::PLUGIN_FILE
			);
			$btn_label = __( 'Activate Themehunk Customizer', 'oneline-lite' );
		}
		?>
		<div class="oneline-plugin-notice" id="oneline-plugin-notice">
			<div class="th-notice-icon">
				<img src="<?php echo esc_url( $icon_url ); ?>" alt="ThemeHunk">
			</div>
			<div class="th-notice-body">
				<strong><?php printf( esc_html__( 'Thanks for installing %s, you rock!', 'oneline-lite' ), esc_html( $theme->get( 'Name' ) ) ); ?></strong>
				<p><?php esc_html_e( 'We strongly recommend you to install the Themehunk Customizer plugin. This way you will have access to all section customization options, demo import templates, and many other awesome features.', 'oneline-lite' ); ?></p>
				<div class="th-notice-actions">
					<a href="<?php echo esc_url( $action_url ); ?>" class="button button-primary">
						<?php echo esc_html( $btn_label ); ?>
					</a>
					<a href="https://themehunk.com/product/themehunk-customizer/" target="_blank" class="th-why-link">
						<?php esc_html_e( 'Why you need Themehunk Customizer?', 'oneline-lite' ); ?>
					</a>
				</div>
			</div>
			<button type="button" class="th-notice-dismiss" data-nonce="<?php echo esc_attr( $nonce ); ?>" aria-label="<?php esc_attr_e( 'Dismiss this notice', 'oneline-lite' ); ?>">&#x2715;</button>
		</div>
		<script>
		(function($){
			$('#oneline-plugin-notice .th-notice-dismiss').on('click', function(){
				var $notice = $('#oneline-plugin-notice');
				$.post(ajaxurl, {
					action : 'oneline_lite_dismiss_plugin_notice',
					nonce  : $(this).data('nonce')
				}, function(){
					$notice.slideUp( 200, function(){ $notice.remove(); });
				});
			});
		})(jQuery);
		</script>
		<?php
	}

	public function dismiss_notice() {
		check_ajax_referer( 'oneline_lite_dismiss_notice', 'nonce' );
		update_user_meta( get_current_user_id(), self::NOTICE_META, true );
		wp_die();
	}
}

new Oneline_Lite_Plugin_Notice();

endif;
