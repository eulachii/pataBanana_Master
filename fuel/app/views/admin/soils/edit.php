<h2>Editing Soil</h2>
<br>

<?php echo render('admin/soils/_form'); ?>
<p>
	<?php echo Html::anchor('admin/soils/view/'.$soil->id, 'View'); ?> |
	<?php echo Html::anchor('admin/soils', 'Back'); ?></p>
