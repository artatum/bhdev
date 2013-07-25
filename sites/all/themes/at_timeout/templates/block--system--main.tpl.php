<?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
  <div class="block-title-wrapper">
    <h2<?php print $title_attributes; ?>><?php print $block->subject; ?></h2>
  </div>
<?php endif; ?>
<?php print render($title_suffix); ?>
<?php print $content ?>
