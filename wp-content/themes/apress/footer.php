<?php
include get_template_directory().'/framework/variables/variables-footer.php';

if ($footer_layout_style == 'footer_fixed'){
	echo '<div class="zolo_footer_fixed_content_mar"></div>';
}
?>
</div>
<!--zolo_content_bg_area End-->
</div>
<!--zolo_main_content_area End-->
<?php 
if($back_to_top !== 'hide_backtotop'){	
	if($back_to_top == 'sticky_backtotop' || $back_to_top == 'sticky_on_scroll_backtotop'){ 
		echo '<a href="#" class="'.esc_attr($back_to_top.' '.$back_to_top_style).' back-to-top"><i class="ap-chevron-up"></i></a>';
	}
}
?>
<?php
apress_action( 'before_footer' );
apress_action( 'footer' );
apress_action( 'after_footer' );
?>

<!--Footer Area End-->
</div>
</div>
<?php apress_action( 'extended_sidebar_end');?>


<?php wp_footer(); ?>
</body>
</html>