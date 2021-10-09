
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('Setup Home Page','oneline-lite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Click button to set theme default home page','oneline-lite'); ?></p>
     <p>
        <?php
        if($this->_check_homepage_setup()){
            $class = "activated disabled";
            $btn_text = "Default Homepage Activated";
        }else{
            $class = "default-home";
             $btn_text = "Setup Default Homepage";
        }
        ?>
        <button class="button activate-now button-primary <?PHP echo $class; ?>"><?php _e('Set Home Page','oneline-lite'); ?></button>
         </p>
    <p>
        <a target="_blank" href="https://www.youtube.com/watch?v=pHCoxwYCZGQ"><?php _e('Manually Setup','oneline-lite'); ?></a>
    </p>
</div> 

<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('Import Demo Content','oneline-lite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('1. Install ThemeHunk Customizer plugins', 'oneline-lite');?> </p>




    <?php
/**
 * Detect plugin. For use on Front End only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 
// check for plugin using plugin name
if ( is_plugin_active( 'themehunk-customizer/themehunk-customizer.php' ) ) { ?>

    <button class="button disabled button-primary "><?php _e('Plugin Activated','oneline-lite'); ?>
</button> <?php 
               }else { ?>

    
    <button data-activated="Plugin Activated" data-msg="Activating Plugin" data-init="themehunk-customizer/themehunk-customizer.php" data-slug="themehunk-customizer" class="button install-now button themehunk-customizer">Install Now</button>


    
<?php } ?>

    <p><?php _e('2. Install One Click Demo Import plugins', 'oneline-lite');?> </p>

    <?php
/**
 * Detect plugin. For use on Front End only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 
// check for plugin using plugin name
if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?>

<button class="button disabled button-primary "><?php _e('Plugin Activated','oneline-lite'); ?>
</button> <?php 
               }else { ?>

    <button data-activated="Plugin Activated" data-msg="Activating Plugin" data-init="one-click-demo-import/one-click-demo-import.php" data-slug="one-click-demo-import" class="button install-now button one-click-demo-import">Install Now</button>
                    
<?php 
} ?>

    <p><?php _e('3. If above both plugin activated then one click demo importer button.', 'oneline-lite');?> </p>
     <p>
            <?php
            // Sita Sites - Installed but Inactive.
            // Sita Premium Sites - Inactive.
            if ( file_exists( WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php' ) && is_plugin_inactive( 'one-click-demo-import/one-click-demo-import.php' )) {

              $class       = 'button zta-sites-inactive';
              $button_text = __( 'Activate Importer Plugin', 'oneline-lite' );
              $data_slug   = 'one-click-demo-import';
              $data_init   = '/one-click-demo-import/one-click-demo-import.php';

          } elseif ( ! file_exists( WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php' ) ) {

              $class       = 'button zta-sites-notinstalled';
              $button_text = __( 'Install Importer Plugin', 'oneline-lite' );
              $data_slug   = 'one-click-demo-import';
              $data_init   = '/one-click-demo-import/one-click-demo-import.php';

            }

            else {
              $class       = 'button active';
              $button_text = __( 'Import Demo', 'oneline-lite' );
              $link        = admin_url( 'themes.php?page=pt-one-click-demo-import' );
            }

            printf(
              '<a class="ztabtn %1$s" %2$s %3$s %4$s> %5$s </a>',
              esc_attr( $class ),
              isset( $link ) ? 'href="' . esc_url( $link ) . '"' : '',
              isset( $data_slug ) ? 'data-slug="' . esc_attr( $data_slug ) . '"' : '',
              isset( $data_init ) ? 'data-init="' . esc_attr( $data_init ) . '"' : '',
              esc_html( $button_text )
            );

        
            ?> </p>



            <p>
            <?php
            // Sita Sites - Installed but Inactive.
            // Sita Premium Sites - Inactive.
            if( file_exists( WP_PLUGIN_DIR . '/themehunk-customizer/themehunk-customizer.php' ) && is_plugin_inactive( 'themehunk-customizer/themehunk-customizer.php' )) {

              $class       = 'button zta-sites-inactive';
              $button_text = __( 'Activate customizer Plugin', 'oneline-lite' );
              $data_slug   = 'themehunk-customizer';
              $data_init   = '/themehunk-customizer/themehunk-customizer.php';

              // Sita Sites - Not Installed.
              // Sita Premium Sites - Inactive.
            } elseif ( ! file_exists( WP_PLUGIN_DIR . '/themehunk-customizer/themehunk-customizer.php' ) ) {

              $class       = 'button zta-sites-notinstalled';
              $button_text = __( 'Install Customizer Plugin', 'oneline-lite' );
              $data_slug   = 'themehunk-customizer';
              $data_init   = '/themehunk-customizer/themehunk-customizer.php';

            }

            else {
              $class       = 'button active';
              $button_text = __( 'Import Demo', 'oneline-lite' );
              $link        = admin_url( 'themes.php?page=pt-one-click-demo-import' );
            }

            printf(
              '<a class="ztabtn %1$s" %2$s %3$s %4$s> %5$s </a>',
              esc_attr( $class ),
              isset( $link ) ? 'href="' . esc_url( $link ) . '"' : '',
              isset( $data_slug ) ? 'data-slug="' . esc_attr( $data_slug ) . '"' : '',
              isset( $data_init ) ? 'data-init="' . esc_attr( $data_init ) . '"' : '',
              esc_html( $button_text )
            );

        
            ?>

                            </p>
</div>
<!--- tab third -->

<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('Customize Your Website','oneline-lite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Onelinelite theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','oneline-lite'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e('Start Customize','oneline-lite'); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e('Customizer Links','oneline-lite'); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e('Upload Logo','oneline-lite'); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=site_color'); ?>" class="components-button is-link"><?php _e('Site Colors','oneline-lite'); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[section]=global_set'); ?>" class="components-button is-link"><?php _e('Global Options','oneline-lite'); ?></a>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=header_setting'); ?>" class="components-button is-link"><?php _e('Header Options','oneline-lite'); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[section]=slider_set_optn'); ?>" class="components-button is-link"><?php _e('Slider Options','oneline-lite'); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[panel]=widgets'); ?>" class="components-button is-link"><?php _e('Footer Widgets','oneline-lite'); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->

 <div class="theme_link">
    <h3><?php _e('Documentation','oneline-lite'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Please check our full documentation for detailed information on how to use Onelinelite.','oneline-lite'); ?></p>
    <p><a target="_blank" href="https://themehunk.com/docs/oneline-lite-theme/"><?php _e(' Go to docs','oneline-lite'); ?></a></p>
</div>