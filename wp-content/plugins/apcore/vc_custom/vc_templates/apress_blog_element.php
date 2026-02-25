<?php 
/*-----------------------------------------------------------------------------------*/
/* Blog Element
/*-----------------------------------------------------------------------------------*/

if ( ! defined( 'ABSPATH' ) ) { exit; }
	extract(shortcode_atts(array(
		'style'									=> 'style_01',
		'category'								=> '',
		'layoutstyle'							=> 'fitRows',
		'num' 									=> '3',
		'blgcrslcolprw' 						=> '3',
		'box_bg_color'							=> '#ffffff',
		'box_hover_text_color'					=> '#ffffff',
		'min_height'							=> '300',
		'color_scheme'							=>'primary_color_scheme',
		'image_overlay_color2'					=>'#000000',
		'opacity'								=> '0.7',
		'blog_navigation'						=> 'none',
		'blog_click'							=> '3',
		'nav_bg'								=> '#eeeeee',
		'nav_color'								=> '#000000',
		'nav_border'							=> '#eeeeee',
		'nav_hover_color'						=> '#ffffff',
		'nav_hover_bg'							=> '#549ffc',
		'button_bg'								=> '#549ffc',
		'button_title'							=> '#fff',
		'button_border'							=> '#549ffc',
		'button_hover_title'					=> '#fff',
		'button_hover_bg'						=> '#549ffc',				
		'blgshowfilter'							=> 'no',
		'filter_button_align'					=> 'center',
		'filter_fontsize'						=> '16',
		'filter_button_text_color'				=> '#000000',
		'filter_button_text_hover_color'		=> '#ef3774',
		
		'gutter_space'							=>'20',	
		'box_shadow'							=>'box_shadow_enable:enable|shadow_horizontal:7|shadow_vertical:5|shadow_blur:30|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',	
		'box_hover_shadow'						=> 'box_shadow_enable:disable|shadow_horizontal:0|shadow_vertical:7|shadow_blur:15|shadow_spread:0|box_shadow_color:rgba(0%2C0%2C0%2C0.2)',
		'box_swing'								=>'no',
		'text_alignment'						=>'left',
		'excerptlength'							=>'15',		
		'data_animation'						=>'No Animation',
		'data_delay'							=>'500',
		
		'link_color'							=>'#b1b1b1',
		'link_hover_color'						=>'#ef3774',
		'title_font_options'					=> '',
		'title_google_fonts'					=> '',
		'title_custom_fonts'					=> '',
		'categories_font_options'				=> '',
		'categories_google_fonts'				=> '',
		'categories_custom_fonts'				=> '',
		'meta_font_options'						=> '',
		'meta_google_fonts'						=> '',
		'meta_custom_fonts'						=> '',
		
		'desktop_no_of_items' 		=> '1',
		'small_desktop_no_of_items' => '1',
		'tablet_no_of_items'		=> '1',
		'slick_autoplay' 			=> 'no',
    	'slick_autoplay_duration'	=> '2000',
		
		
		'slick_hide_arrow_navigation'=> 'yes',
		'arrows_style'				=> 'arrows_style1',
		'arrows_color'				=> '#ef3774',
		'arrows_bg'					=> '#549ffc',
		'slick_bullet_navigation' 	=> 'yes',
		'bullet_navigation_style' 	=> '',
		'bullet_bg'					=> '#000000',
		
		
	), $atts));
	
	ob_start();
	$id = RandomString(20);
	



	// Title Alignment
	//RTL Colde
	if ( is_rtl() ){
		
		if($text_alignment == ''){
			$textalignment = 'right';
		}elseif($text_alignment == 'left'){
			$textalignment = 'right';
		}elseif($text_alignment == 'right'){
			$textalignment = 'left';
		}elseif($text_alignment == 'center'){
			$textalignment = 'center';
		}
	
	if($filter_button_align == ''){
			$filterbutton_align = 'right';
		}elseif($filter_button_align == 'left'){
			$filterbutton_align = 'right';
		}elseif($filter_button_align == 'right'){
			$filterbutton_align = 'left';
		}elseif($filter_button_align == 'center'){
			$filterbutton_align = 'center';
		}
	}else{
		$textalignment = $text_alignment;
		$filterbutton_align = $filter_button_align;
		}


	//Animation
	if($data_animation == 'No Animation'){
			$animatedclass = 'noanimation';
		}else{
			$animatedclass = 'animated hiding';
		}
	

	$uniqid = uniqid(rand());
	$c = 'acp_'.$uniqid;
	
	$layoutstyle_class = '';
	
	if($layoutstyle == 'fitRows'){
		$layoutstyle_class = 'layoutstyle_normal';
		$layout_class = 'grid-item';
		$blogstyle_thumb = 'apcore_blog_medium';

	}else if($layoutstyle == 'masonry'){
		$layoutstyle_class = 'shortcode_blog_layout_masonry';
		$layout_class = 'masonry-item';
		$blogstyle_thumb = 'full';
		
	}else{
		$layoutstyle_class = 'zolo_blog_element_carousel';
		$layout_class = 'element-item';
		$blogstyle_thumb = '';
		
		}
		
		$title_options = _zolo_parse_text_shortcode_params($title_font_options, '', $title_google_fonts, $title_custom_fonts);
		$categories_options = _zolo_parse_text_shortcode_params($categories_font_options, '', $categories_google_fonts, $categories_custom_fonts);
		$meta_options = _zolo_parse_text_shortcode_params($meta_font_options, '', $meta_google_fonts, $meta_custom_fonts);
		?>
        
   <?php 
    $desktop_no_of_items = 'slidesToShow: '.$desktop_no_of_items.',';
	$slidesToShow_small_desktop_no_of_items = 'slidesToShow: '.$small_desktop_no_of_items.',';
	$slidesToShow_tablet_no_of_items = 'slidesToShow: '.$tablet_no_of_items.',';
	
	$slick_autoplay = ($slick_autoplay == 'yes')? 'true' : 'false';
	$slick_autoplay_duration = $slick_autoplay_duration;
	$slick_hidearrow_navigation = ($slick_hide_arrow_navigation == 'yes')? 'true' : 'false';
	$slickbullet_navigation = ($slick_bullet_navigation == 'yes')? 'true' : 'false';
	$slick_arrow_true_class = ($slick_hide_arrow_navigation == 'yes')? 'slick_arrow_true' : 'slick_arrow_false';
	$slick_bullet_true_class = ($slick_bullet_navigation == 'yes')? 'slick_bullet_true' : 'slick_bullet_false';
	
   if($layoutstyle == 'carousel'){ 
   echo '<script type="text/javascript">
	var j$ = jQuery;
	j$.noConflict();
	"use strict";
	j$(document).on("ready", function() {
if(j$("body").hasClass("rtl")){ var rtlvar = true }else{ var rtlvar = false }
j$(".zolo_blog_element_carousel_'.$c.'").slick({
		  dots: '.$slickbullet_navigation.',
		  infinite: true,
		  speed: 900,
		  rtl: rtlvar,
		  slidesToScroll: 1,
		  autoplay: '.$slick_autoplay.',
  		  autoplaySpeed:'.$slick_autoplay_duration.',
		  arrows: '.$slick_hidearrow_navigation.',
		  '.$desktop_no_of_items.'
		  
		  responsive: [
			{
			  breakpoint: 1050,
			  settings: {
				'.$slidesToShow_small_desktop_no_of_items.'
				slidesToScroll: 1,
			  }
			},
			{
			  breakpoint: 800,
			  settings: {
			  '.$slidesToShow_tablet_no_of_items.'
			  slidesToScroll: 1,
			  }
			},
		  ]
		});
	});
	</script>';
   }?>
        <?php if($blog_navigation == 'loadmore_nav'){
					
				$items_on_start = $num; 
				$items_per_click = $blog_click;
				$view_type = $layoutstyle;    
				$category = $category;
	
		?>
		<script>
			jQuery.noConflict();
			var j$ = jQuery;
			"use strict";
			j$(document).ready(function(){
			
			var html_template = "<?php echo esc_js($view_type); ?>";
			var now_open_works = 0;
			var first_load = true;
			var style = "<?php echo esc_js($style); ?>";
			var cat = "<?php echo esc_js($category); ?>";
			var layoutstyle = "<?php echo esc_js($layoutstyle); ?>";
			var blgcrslcolprw = "<?php echo esc_js($blgcrslcolprw); ?>";
			var blgshowfilter = "<?php echo $blgshowfilter; ?>";
			var layout_class = "<?php echo esc_js($layout_class); ?>";
			var layoutstyle_class = "<?php echo esc_js($layoutstyle_class); ?>";
			var blogstyle_thumb = "<?php echo esc_js($blogstyle_thumb); ?>";
			var excerptlength = "<?php echo esc_js($excerptlength); ?>";
			
			var title_font_options = "<?php echo esc_js($title_font_options); ?>";
			var title_google_fonts = "<?php echo esc_js($title_google_fonts); ?>";
			var title_custom_fonts = "<?php echo esc_js($title_custom_fonts); ?>";
			
			var categories_font_options = "<?php echo esc_js($categories_font_options); ?>";
			var categories_google_fonts = "<?php echo esc_js($categories_google_fonts); ?>";
			var categories_custom_fonts = "<?php echo esc_js($categories_custom_fonts); ?>";
			
			var meta_font_options = "<?php echo esc_js($meta_font_options); ?>";
			var meta_google_fonts = "<?php echo esc_js($meta_google_fonts); ?>";
			var meta_custom_fonts = "<?php echo esc_js($meta_custom_fonts); ?>";
			
			function get_blog_elements () {
			
				if (first_load == true) {		
					works_per_load = <?php echo esc_js($items_on_start); ?>;
					first_load = false;		
				} else {		
					works_per_load = <?php echo esc_js($items_per_click); ?>;		
				}
			
				j$.ajax({
				
				type: "POST",
				url: zt_post.ajaxurl,
				data: "html_template="+html_template+"&works_per_load="+works_per_load+"&now_open_works="+now_open_works+"&style="+style+"&layout_class="+layout_class+"&layoutstyle_class="+layoutstyle_class+"&blogstyle_thumb="+blogstyle_thumb+"&action=get_blog_elements"+"&first_load="+first_load+"&category="+cat+"&blgcrslcolprw="+blgcrslcolprw+"&blgshowfilter="+blgshowfilter+"&excerptlength="+excerptlength+"&title_font_options="+title_font_options+"&title_google_fonts="+title_google_fonts+"&title_custom_fonts="+title_custom_fonts+"&categories_font_options="+categories_font_options+"&categories_google_fonts="+categories_google_fonts+"&categories_custom_fonts="+categories_custom_fonts+"&meta_font_options="+meta_font_options+"&meta_google_fonts="+meta_google_fonts+"&meta_custom_fonts="+meta_custom_fonts+"",
				success: function(result){
				//alert(result);
				if(result.length<1){
				j$(".blog_load_more_cont").hide("fast");
				}
				
				now_open_works = now_open_works + works_per_load;
				first_load = false;
				//alert(result);
				var $newItems = j$(result);
				
				var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");
				
				
				setTimeout(function(i) {
				$container.imagesLoaded( function() {
					
					// init Isotope
					$container.isotope( 'insert', $newItems, function() {
						j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").ready(function(){
							j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');		
						});
						j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');
						j$(window).trigger('resize');
					})
					// Pretty Photo
					j$("a[rel^='prettyPhoto']").prettyPhoto({
						animation_speed: 'normal', /* fast/slow/normal */
						slideshow: false, /* false OR interval time in ms */
						autoplay_slideshow: false, /* true/false */
						opacity: 0.80, /* Value between 0 and 1 */
						show_title: true, /* true/false */
						allow_resize: true, /* Resize the photos bigger than viewport. true/false */
						horizontal_padding: 0,
						default_width: 960,
						default_height: 540,
						counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
						theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
						hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
						wmode: 'opaque', /* Set the flash wmode attribute */
						autoplay: true, /* Automatically start videos: True/False */
						modal: false, /* If set to true, only the close button will close the window */
						overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
						keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
						deeplinking: false,
						social_tools: false
					});	
				});
				
				  },3000);		
					}   		
				});	
			}
			
				j$(".get_blog_elements_btn").click(function(){
					get_blog_elements();						
					j$(".site-content.<?php echo $id.$layoutstyle_class; ?>").isotope('layout');
					return false;
				});
			
			
			/* load at start */	
				j$(window).load(function(){
					get_blog_elements();
					var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
					var $grid = $container.imagesLoaded( function() {
							// init Isotope
							$container.isotope({
		
							// options
								itemSelector : '<?php echo '.'.$layout_class;?>',
								layoutMode : '<?php echo $layoutstyle; ?>'
							})
						});
						// filter functions
						  var filterFns = {
							// show if number is greater than 50
							numberGreaterThan50: function() {
							  var number = j$(this).find('.number').text();
							  return parseInt( number, 10 ) > 50;
							},
							// show if name ends with -ium
							ium: function() {
							  var name = j$(this).find('.name').text();
							  return name.match( /ium$/ );
							}
						  };
						  // bind filter button click
						  j$('.postfilter-<?php echo $id; ?>').on( 'click', 'button', function() {
							var filterValue = j$( this ).attr('data-filter');
							// use filterFn if matches value
							filterValue = filterFns[ filterValue ] || filterValue;
							$grid.isotope({ filter: filterValue });
						  });
						  // change is-checked class on buttons
							j$('.postfilter-<?php echo $id; ?>').each( function( i, buttonGroup ) {
							var $buttonGroup = j$( buttonGroup );
							$buttonGroup.on( 'click', 'button', function() {
							  $buttonGroup.find('.is-checked').removeClass('is-checked');
							  j$( this ).addClass('is-checked');
							});
						  });				
					});
			
			});
		</script>
		<?php }?>
        
		<script type="text/javascript">
			jQuery.noConflict();
			var j$ = jQuery;
			"use strict";
			j$(window).load(function() {
			var $container = j$(".site-content.<?php echo $id.$layoutstyle_class; ?>");	
			var $grid = $container.imagesLoaded( function() {
					// init Isotope
					$container.isotope({
					// options
						itemSelector : '<?php echo '.'.$layout_class;?>',
						layoutMode : '<?php echo $layoutstyle; ?>'
					})
				});
				// filter functions
				  var filterFns = {
					// show if number is greater than 50
					numberGreaterThan50: function() {
					  var number = j$(this).find('.number').text();
					  return parseInt( number, 10 ) > 50;
					},
					// show if name ends with -ium
					ium: function() {
					  var name = j$(this).find('.name').text();
					  return name.match( /ium$/ );
					}
				  };
				  // bind filter button click
				  j$('.postfilter-<?php echo $id; ?>').on( 'click', 'button', function() {
					var filterValue = j$( this ).attr('data-filter');
					// use filterFn if matches value
					filterValue = filterFns[ filterValue ] || filterValue;
					$grid.isotope({ filter: filterValue });
				  });
				  // change is-checked class on buttons
				  j$('.postfilter-<?php echo $id; ?>').each( function( i, buttonGroup ) {
					var $buttonGroup = j$( buttonGroup );
					$buttonGroup.on( 'click', 'button', function() {
					  $buttonGroup.find('.is-checked').removeClass('is-checked');
					  j$( this ).addClass('is-checked');
					});
				  });				
			});
		</script>
		<?php
		
				global $post;
				
				if ( get_query_var('paged') ) { 
					$paged = get_query_var('paged'); 
				}elseif ( get_query_var('page') ) { 
					$paged = get_query_var('page'); 
				}else{ 
					$paged = 1; 
				}
				
				if($category == 'all') {
					$category = null;
				}
				
				$blog_arr = array(
					'posts_per_page'	=> $num,
					'post_type'			=> 'post',
					'category_name'		=> $category,
					'paged'				=> $paged,
					'post_status'		=>'publish'
				);
				
				query_posts($blog_arr);
		?>
		
		<!--Blog Row Start-->
		
		<div class="zolo_blog_element_area <?php echo 'zolo_blog_element_'.$style.' zolo_blog_element_'.$c;?> ">
		<?php
			if($blgshowfilter == 'yes'){
			echo '<div class="filter_button_area filter_button_align_'.$filterbutton_align.'">';
				echo isotope_categories($id);
			echo '</div>';
			}
		?>
		
		  <div class="zolo_blog_element_row" style="margin:0px -<?php echo $gutter_space;?>px 0 -<?php echo $gutter_space;?>px;">
            
            <?php if($layoutstyle == 'carousel'){?>
					<div class="zolo_row apress_slick_slider <?php echo 'zolo_blog_element_carousel_'.$c.' '.$bullet_navigation_style.' '.$arrows_style.' '.$slick_arrow_true_class.' '.$slick_bullet_true_class;?>">
				<?php }else{?>
					<div class="zolo_row <?php echo 'site-content '.$id.$layoutstyle_class;?>">
					<?php }?>
                    

			
              <?php if($blog_navigation != 'loadmore_nav'){?>
			  <?php
				$i = 1;
				while (have_posts()) : the_post();   ?>
			  <?php  
					if($blgshowfilter == 'yes'){
					$terms = get_the_terms( @$post->ID, 'category' );  
					
					if ( $terms && ! is_wp_error( $terms ) ) :   
					$links = array();  
					
					foreach ( $terms as $term )   
					{  
					$links[] = $term->name;  
					}  
					$links = str_replace(' ', '-', $links);   
					$tax = join( " ", $links );       
					else :    
					$tax = '';    
					endif; 
					}
					?>
			  <?php if($blgshowfilter == 'yes'){$filterclasselector = strtolower($tax);}else{$filterclasselector='';} ?>
			  <?php 
			  if( $i % 4 == 0 )
				$class = 'last';
				else
				$class = '';
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
				if($thumb) {
				$url = $thumb['0'];
				} 
?>

			  
			  <!--Blog Box Area Start-->
			  <div class="zolo_blog_element_col <?php echo 'zolo_element_col'.$blgcrslcolprw.' '.$class.' '.$layout_class.' '.$filterclasselector;?> <?php echo $animatedclass;?>" data-animation="<?php echo $data_animation;?>" data-delay="<?php if($data_delay <= 200){echo $i*$data_delay; }else{ echo $data_delay; }?>">
				<div class="zolo_blog_element_item">
                
                <?php if($style == 'style_01'){?>
                  <div class="zolo_blog_element_thumb">
					<?php
						apress_theme_shortcode_post_thumbnail($blogstyle_thumb); ?>
                  </div>
                  <?php }else if($style == 'style_02'){?>
				  <div class="zolo_blog_element_thumb" style="background:url(<?php echo $url; ?>) no-repeat center center;"></div>
                  <?php }?>
                  
                  <div class="zolo_blog_element_content_wrap">
					<div class="zolo_blog_element_content">
                    <div class="zolo_blog_element_content_top">
					
                    <span class="zolo_blog_element_categories_list" <?php echo $categories_options['style'];?>> 
					<?php $categories_list = get_the_category_list( __( ' / ', 'apress' ) );
						  echo $categories_list;?>
                    </span>
                    
                    <?php echo '<'.$title_options['tag'].' class="zolo_blog_element_title entry-title">';?>
                    <a href="<?php the_permalink(); ?>" <?php echo $title_options['style'];?>><?php the_title(); ?></a>
                    <?php echo '</'.$title_options['tag'].'>';?>
                    
					<div class="zolo_blog_element_description">
					  <?php //the_excerpt() ;?>
				  		<?php $content = wp_trim_words( get_the_content(), $excerptlength, '' );
                              echo  preg_replace( '/\[[^\]]+\]/', '', $content );?>
					</div>
					</div>
					<!--Meta Area Code Start-->
    				<span class="zolo_blog_element_meta_wrap" <?php echo $meta_options['style'];?>> 
                        <span class="zolo_blog_element_meta_left"> 
                            <?php 
							printf( '<span class="apress_postmeta_author vcard author"><a class="url fn n" href="%1$s" title="%2$s" rel="author"><span class="avatar_image">%4$s</span> %3$s</a></span>',
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
							esc_attr( sprintf( __( 'View all posts by %s', 'apress' ), get_the_author() ) ),
							get_the_author(),
							get_avatar(get_the_author_meta( 'ID' ), 30)
							);
							?>&nbsp; / &nbsp;
                            
                            <span>
                        <?php the_time('M j Y') ?>
                        </span>
                        </span>
                        <span class="zolo_blog_element_meta_right"> 
                        <?php //zolo_zilla_likes
                            if( function_exists('zolo_zilla_likes') ){ 
                                echo '<span class="zolo_zilla_likes_wrap">';
                                zolo_zilla_likes();
								echo '</span> ';
                            }?>
                            <?php echo '<span class="zolo_blog_element_social_sharing">';
									get_template_part('framework/social_sharing');
								echo '</span>';?>
                            
                            </span>
                        </span>
                    <!--Meta Area Code End-->
                    
				  </div></div>
                
                </div> 
			  </div>
			  <!--Blog Box Area End-->

			  <?php $i++; endwhile; 
			}
			?>
			</div>
		  </div>
		  <!-- .navigation -->
		  
		  <?php
		  if($blog_navigation != 'none'){
					if($blog_navigation == 'classic_nav'){ 
						apcore_blog_pagination(); 
					}elseif($blog_navigation == 'default'){
						apcore_blog_old_nav();
					}elseif($blog_navigation == 'loadmore_nav'){
							echo '<div class="blog_load_more_cont"><a class="btn_load_more get_blog_posts_btn" href="#">'.__('Load More','apcore').' </a></div>'; 
						} 
					}?>
		  
		  <!-- .navigation END --> 
		</div>


<?php
$shortcode_css = '';

$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .filters-button-group{ text-align:'.$filterbutton_align.';}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .filters-button-group button.button{ color:'.$filter_button_text_color.'; font-size:'.$filter_fontsize.'px;}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .filters-button-group button.button:hover,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .filters-button-group button.button.is-checked{ color:'.$filter_button_text_hover_color.';}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .filters-button-group button.button:before { 
			position:absolute; 
			content:""; 
			transition:all 0.7s;
			-webkit-transition:all 0.7s;
			-moz-transition:all 0.7s;
			left: 0;
			bottom:0;
			width: 100%;
			border-bottom: 2px  solid '.$filter_button_text_hover_color.';
			-moz-transform:  translateX(-100%);
			-ms-transform:  translateX(-100%);
			-o-transform:  translateX(-100%);
			-webkit-transform:  translateX(-100%);
			transform:  translateX(-100%);
		  }';
		$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .filters-button-group button.button.is-checked:before,
		.zolo_blog_element_area.zolo_blog_element_'.$c.' .filters-button-group button.button:hover:before {
			-moz-transform:  translateX(0);
			-ms-transform:  translateX(0);
			-o-transform:  translateX(0);
			-webkit-transform:  translateX(0);
			transform:  translateX(0);
		  }';


$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_col{ padding:'.$gutter_space.'px;}';

if(substr_count($box_shadow, 'disable') == 0) {
	$box_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_shadow);
	$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item{'.$box_shadow.'}';
}
if(substr_count($box_hover_shadow, 'disable') == 0) {
	$box_hover_shadow = Zolo_Box_Shadow_Param::box_shadow_css($box_hover_shadow);
	$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover{'.$box_hover_shadow.'}';
}
if($box_swing == 'yes'){
	$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover{ transform:translateY(-10px); -moz-transform:translateY(-10px); -webkit-transform:translateY(-10px); -ms-transform:translateY(-10px); -o-transform:translateY(-10px);}';
	 }
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item{ text-align:'.$textalignment.';background:'.$box_bg_color.';}';

$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .zolo_blog_element_meta_wrap,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .zolo_blog_element_meta_wrap a{ color:'.$link_color.';}';

$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .zolo_blog_element_categories_list, 
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .zolo_blog_element_categories_list a,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .apress_postmeta_author a,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .zolo_blog_element_title a:hover{ color:'.$link_hover_color.'!important;}';

$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .zolo_blog_element_categories_list::after{ background:'.$link_hover_color.';}';


$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .apress_slick_slider .slick-arrow{ color:'.$arrows_color.'}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .apress_slick_slider .slick-arrow:after{ background:'.$arrows_color.'}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .apress_slick_slider.arrows_style4 .slick-arrow.slick-next:before{border-color: transparent transparent transparent '.$arrows_color.';}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .apress_slick_slider.arrows_style4 .slick-arrow.slick-prev:before{border-color: transparent '.$arrows_color.' transparent transparent;}';
if($arrows_style == 'arrows_style2' || $arrows_style == 'arrows_style3'){
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .apress_slick_slider .slick-arrow{ background:'.$arrows_bg.'}';
}
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .apress_slick_slider ul.slick-dots li.slick-active button:after{ box-shadow:inset 0 0 0 1px '.$bullet_bg.';}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .apress_slick_slider ul.slick-dots li button::after{box-shadow: 0 0 0 5px '.$bullet_bg.' inset;}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .apress_slick_slider.dots_style3 ul.slick-dots li button::after{ background:'.$bullet_bg.';}';

if($style == 'style_02'){

$key = $color_scheme;
if($color_scheme == 'design_your_own'){
	$background_color_scheme = 'background:'.$image_overlay_color2.';';
}else{
	$background_color_scheme = apcore_shortcodes_background_color_scheme($key);
}
		
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .zolo_blog_element_meta_wrap,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .zolo_blog_element_meta_wrap a,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .zolo_blog_element_categories_list,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .zolo_blog_element_description, 
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .zolo_blog_element_categories_list a,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .apress_postmeta_author a,
.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .zolo_blog_element_title a{ color:'.$box_hover_text_color.'!important;}';

$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .zolo_blog_element_categories_list:after{background:'.$box_hover_text_color.'!important;}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item:hover .zolo_blog_element_meta_wrap{border-color:'.$box_hover_text_color.'!important;}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .zolo_blog_element_content{min-height:'.$min_height.'px;}';
$shortcode_css .= '.zolo_blog_element_area.zolo_blog_element_'.$c.' .zolo_blog_element_item .zolo_blog_element_thumb:after{opacity:'.$opacity.';'.$background_color_scheme.'}';
	}


apcore_save_plugin_dyn_styles( $shortcode_css ); ?>

<?php			
wp_reset_query();
$demolp_output = ob_get_clean();
echo $demolp_output;
