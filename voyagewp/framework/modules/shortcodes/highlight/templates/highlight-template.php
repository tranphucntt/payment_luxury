<?php
/**
 * Highlight shortcode template
 */
?>

<span class="mkdf-highlight" <?php voyage_mikado_inline_style($highlight_style); ?>>
	<?php echo esc_html($content); ?>
</span>