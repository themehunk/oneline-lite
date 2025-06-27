<?php 
if(!oneline_lite_checkbox_filter('slider','section_on_off')) :  
if( shortcode_exists( 'themehunk-customizer-oneline-lite' ) ) { 
$bnt_style = get_theme_mod('slidr_button','default'); 
$oneline_plx = get_theme_mod('parallax_opt');
if($oneline_plx =='' || $oneline_plx =='0'){  
$prlx_class = 'parallax-lite';
$prlx_data_center = 'background-position: 50% 0px';
$prlx_top_bottom = 'background-position: 50% -100px;';
}else{
$prlx_class = ''; 
$prlx_data_center = '';
$prlx_top_bottom =''; 
}  
$first_slider_image =  get_template_directory_uri() . '/images/slider.jpeg'; // fallback image   
?>
<input type="hidden" id="txt_slidespeed" value="<?php if (get_theme_mod('oneline_slider_speed','') != '') { echo esc_html((get_theme_mod('oneline_slider_speed'))); } else { ?>3000<?php } ?>"/>
<div id="slider-div">
    <div id="page-top" class="slider">  
        <div class="flexslider <?php echo $prlx_class;?> <?php echo $bnt_style;?>">
            <ul class="slides">
                <!-- #1 Slider -->
                <li data-center="<?php echo esc_attr( $prlx_data_center );?>"
  data-top-bottom="<?php echo esc_attr($prlx_top_bottom);?>" style="background:url('<?php echo esc_url(get_theme_mod('first_slider_image',$first_slider_image)); ?>');">
                    <div class="over-lay">
                        <div class="fs-caption wow thunk-fadeInDown" data-wow-delay="1s">
                            <div class="caption-container" data-center="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slider-div h2">
                                <h2 class="title overtext"><a href="<?php echo esc_url(get_theme_mod('first_slider_link','#')); ?>"><?php echo esc_html(get_theme_mod('first_slider_heading','Every Client Deserves an Innovative Product')); ?></a></h2>
                           
                                <div class="slider-button">
                                    <a href="<?php echo esc_url(get_theme_mod('first_button_link','#')); ?>" class="theme-slider-button"><?php echo esc_html(get_theme_mod('first_button_text','Get IT NOW')); ?></a>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </li>
               
                <!-- #2 Slider -->
                  <?php if (get_theme_mod('second_slider_image','') != '') { ?>
                <li data-center="<?php echo esc_attr( $prlx_data_center );?>"
  data-top-bottom="<?php echo esc_attr($prlx_top_bottom);?>"  style="background:url('<?php echo esc_url(get_theme_mod('second_slider_image')); ?>');">
            <div class="over-lay">
             <div class="fs-caption wow thunk-fadeInDown" data-wow-delay="1s">
                  <div class="caption-container" data-center="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slider-div h2">
                                <h2 class="title overtext"><a href="<?php echo esc_url(get_theme_mod('second_slider_link','#')); ?>"><?php echo esc_html(get_theme_mod('second_slider_heading')); ?></a></h2>
                               <?php if(get_theme_mod('second_button_text', '')!=''){ ?>
                                <div class="slider-button">
                                    <a href="<?php echo esc_url(get_theme_mod('second_button_link','#')); ?>" class="theme-slider-button"><?php echo esc_html(get_theme_mod('second_button_text', __('GET IT NOW','oneline-lite'))); ?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>

                 <!-- #3 Slider -->
                  <?php if (get_theme_mod('third_slider_image','') != '') { ?>
                <li data-center="<?php echo esc_attr($prlx_data_center);?>"
  data-top-bottom="<?php echo esc_attr($prlx_top_bottom);?>" style="background:url('<?php echo esc_url(get_theme_mod('third_slider_image')); ?>');">
                    <div class="over-lay">
                        <div class="fs-caption wow thunk-fadeInDown" data-wow-delay="1s">
                            <div class="caption-container" data-center="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slider-div h2">
                                <h2 class="title overtext"><a href="<?php echo esc_url(get_theme_mod('third_slider_link','#')); ?>"><?php echo esc_html(get_theme_mod('third_slider_heading')); ?></a></h2>
                               <?php if(get_theme_mod('third_button_text', '')!=''){ ?>
                                <div class="slider-button">
                                    <a href="<?php echo esc_url(get_theme_mod('third_button_link','#')); ?>" class="theme-slider-button"><?php echo esc_html(get_theme_mod('third_button_text', __('GET IT NOW','oneline-lite'))); ?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php } ?>
    <?php endif ;