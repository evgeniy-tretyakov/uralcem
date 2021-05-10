<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
    <?php print $row; ?>
  </div>
<?php endforeach; ?>

<?php if ((count($rows) === 7) || count($rows) === 4): ?>
	<div class="views-row views-row-8 views-row-even views-row-very-last extra-text-block">
		<?php if ($is_admin): ?><!-- BLOCK::Услуги Текстовый блок (главная) --><?php endif ?>
		<?php
			$block = _block_get_renderable_array(_block_render_blocks(array(block_load('block', 16))));
			print drupal_render($block);
		?>
	</div>
<?php endif ?>