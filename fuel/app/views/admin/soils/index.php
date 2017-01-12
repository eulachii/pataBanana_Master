<h2>Listing Soils</h2>
<br>
<?php if ($soils): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Type</th>
			<th>Description</th>
			<th>Image</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($soils as $item): ?>		<tr>

			<td><?php echo $item->type; ?></td>
			<td><?php echo $item->description; ?></td>
			<td><?php echo $item->image; ?></td>
			<td>
				<?php echo Html::anchor('admin/soils/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('admin/soils/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/soils/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Soils.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/soils/create', 'Add new Soil', array('class' => 'btn btn-success')); ?>

</p>
