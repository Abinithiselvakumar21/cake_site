<?php 
/*-----------------------------------------------------------------------------------*/
/* Social links
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }


extract(shortcode_atts(array(
	'socialicon_style'			=> 'simple',
	'socialicon_design'			=> 'none',
	'socialicon_color'			=> '#bebdbd',
	'socialicon_hover_color'	=> '#afaeae',
	'socialicon_box_bg'			=> '#e8e8e8',
	'socialicon_box_hover_bg'	=> '#dbdada',
	'socialicon_box_bor'		=> '#e8e8e8',
	'socialicon_box_hover_bor'	=> '#dbdada',
	'socialicon_facebook'		=> '',
	'socialicon_twitter'		=> '',
	'socialicon_instagram'		=> '',
	'socialicon_dribbble'		=> '',
	'socialicon_googleplus'		=> '',
	'socialicon_linkedin'		=> '',
	'socialicon_tumblr'			=> '',
	'socialicon_reddit'			=> '',
	'socialicon_yahoo'			=> '',
	'socialicon_deviantart'		=> '',
	'socialicon_vimeo'			=> '',
	'socialicon_youtube'		=> '',
	'socialicon_pinterest'		=> '',
	'socialicon_rss'			=> '',
	'socialicon_digg'			=> '',
	'socialicon_flickr'			=> '',
	'socialicon_skype'			=> '',
	'socialicon_dropbox'		=> '',
	'socialicon_soundcloud'		=> '',
	'socialicon_vk'				=> '',
	'socialicon_email'			=> '',
	'socialicon_alignment'		=> '',
	'class'						=> '',
	'data_animation'			=> 'No Animation',
	'data_delay'				=> '500',
		
), $atts));

//Animation
if($data_animation == 'No Animation'){
	$animatedclass = 'noanimation';
}else{
	$animatedclass = 'animated hiding';
}
$target = '_blank';

$uniqid = uniqid(rand());
$c = 'acp_'.$uniqid;

?>

<!--zolo calltoaction Row Start-->

<div class="zolo_social_box_<?php echo $c;?> zolo_social_box <?php echo $socialicon_style.' '.$socialicon_design.' '.$animatedclass.' '.$class;?>" style="text-align:<?php echo $socialicon_alignment;?>" data-animation ="<?php echo $data_animation; ?>" data-delay ="<?php echo $data_delay;?>">
  <ul class="zolo_social_element">
    <?php if($socialicon_facebook): ?>
    <li class="social_icon_list facebook"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_facebook; ?>" ><i class="ap-facebook"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_flickr): ?>
    <li class="social_icon_list flickr"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_flickr; ?>" ><i class="ap-flickr1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_rss): ?>
    <li class="social_icon_list rss"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_rss; ?>" ><i class="ap-rss1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_twitter): ?>
    <li class="social_icon_list twitter"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_twitter; ?>" ><i class="ap-twitter2"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_vimeo): ?>
    <li class="social_icon_list vimeo"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_vimeo; ?>" ><i class="ap-vimeo1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_youtube): ?>
    <li class="social_icon_list youtube"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_youtube; ?>" ><i class="ap-youtube"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_instagram): ?>
    <li class="social_icon_list instagram"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_instagram; ?>" ><i class="ap-instagram1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_pinterest): ?>
    <li class="social_icon_list pinterest"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_pinterest; ?>" ><i class="ap-pinterest"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_tumblr): ?>
    <li class="social_icon_list tumblr"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_tumblr; ?>" ><i class="ap-tumblr1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_googleplus): ?>
    <li class="social_icon_list google"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_googleplus; ?>" ><i class="ap-google-plus"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_dribbble): ?>
    <li class="social_icon_list dribbble"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_dribbble; ?>" ><i class="ap-dribbble1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_digg): ?>
    <li class="social_icon_list digg"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_digg; ?>" ><i class="ap-digg"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_linkedin): ?>
    <li class="social_icon_list linkedin"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_linkedin; ?>" ><i class="ap-linkedin2"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_skype): ?>
    <li class="social_icon_list skype"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_skype; ?>" ><i class="ap-skype1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_deviantart): ?>
    <li class="social_icon_list deviantart"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_deviantart; ?>" ><i class="ap-deviantart"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_yahoo): ?>
    <li class="social_icon_list yahoo_link"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_yahoo; ?>" ><i class="ap-yahoo"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_reddit): ?>
    <li class="social_icon_list reddit"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_reddit; ?>" ><i class="ap-reddit"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_dropbox): ?>
    <li class="social_icon_list dropbox"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_dropbox; ?>" ><i class="ap-dropbox1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_soundcloud): ?>
    <li class="social_icon_list soundcloud"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_soundcloud; ?>" ><i class="ap-soundcloud1"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_vk): ?>
    <li class="social_icon_list vk"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_vk; ?>" ><i class="ap-vk"></i></a></li>
    <?php endif; ?>
    <?php if($socialicon_email): ?>
    <li class="social_icon_list email"><a target="<?php echo $target; ?>" href="<?php echo $socialicon_email; ?>" ><i class="ap-envelope"></i></a></li>
    <?php endif; ?>
  </ul>
</div>
<?php
$custom_css = '';
$custom_css .= '.zolo_social_box_'.$c.'.zolo_social_box.simple ul.zolo_social_element li a{ background:'.$socialicon_box_bg.'; border:1px solid '.$socialicon_box_bor.'; color:'.$socialicon_color.';}';	
$custom_css .= '.zolo_social_box_'.$c.'.zolo_social_box.simple ul.zolo_social_element li a:hover{ background:'.$socialicon_box_hover_bg.'; border:1px solid '.$socialicon_box_hover_bor.'; color:'.$socialicon_hover_color.';}';
apcore_save_plugin_dyn_styles( $custom_css );
