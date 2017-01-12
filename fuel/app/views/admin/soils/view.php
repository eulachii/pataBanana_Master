<h2>Viewing #<?php echo $soil->id; ?></h2>

<p>
	<strong>Type:</strong>
	<?php echo $soil->type; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $soil->description; ?></p>
<p>
	<strong>Image:</strong>
	<?php echo $soil->image; ?></p>

<?php echo Html::anchor('admin/soils/edit/'.$soil->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/soils', 'Back'); ?>