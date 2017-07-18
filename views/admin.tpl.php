<div class="wrap">
	<h2><?php echo __('YourChoice MailPro', 'yourchoice-mailpro') . " " . __('Settings', 'yourchoice-mailpro'); ?></h2>
	<a href="options-general.php?page=mailpro&amp;basic=1"><?php echo __('edit basic settings', 'yourchoice-mailpro'); ?></a>
	<form action="options.php" method="post">
		<?php settings_fields('ycmp_options'); ?>
		<?php do_settings_sections('ycmp'); ?>
		<input name="Submit" type="submit" value="<?php esc_attr_e(__('Save Changes', 'yourchoice-mailpro')); ?>" />
	</form>
</div>
