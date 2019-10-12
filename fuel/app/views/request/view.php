<h2>Viewing <span class='muted'>#<?php echo $request->id; ?></span></h2>

<p>
	<strong>Body:</strong>
	<?php echo $request->body; ?></p>
<p>
	<strong>Ip:</strong>
	<?php echo $request->ip; ?></p>

<?php echo Html::anchor('request/edit/'.$request->id, 'Edit'); ?> |
<?php echo Html::anchor('request', 'Back'); ?>