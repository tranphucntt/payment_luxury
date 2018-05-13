<?php $cols = 3; ?>

<div class="mkdf-grid-row mkdf-footer-top-three-cols">
	<?php for($i = 1; $i <= $cols; $i++) : ?>
		<div class="mkdf-grid-col-4">
			<?php if(is_active_sidebar('footer_column_'.$i)) :
				dynamic_sidebar('footer_column_'.$i);
			endif; ?>
		</div>
	<?php endfor; ?>
</div>