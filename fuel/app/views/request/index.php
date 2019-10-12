<?php if ($requests): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<!-- <th>Body</th> -->
			<!-- <th>Ip</th> -->
			<!-- <th>&nbsp;</th> -->
		</tr>
	</thead>
	<tbody>
<?php foreach ($requests as $item): ?>
		<tr class="post__bar">
			<td>
				<?php echo Html::anchor('user/profile/'.$item->user_id, $users[$item->user_id]["name"] ); ?>
				<br>
				<?php echo $item->body; ?>
			</td>
			<td>
				<br>
				<?php echo $item->updated_at; ?>
			</td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('request/edit/'.$item->id, '<i class="icon-wrench"></i> 編集', array('class' => 'btn btn-default btn-sm')); ?>		<?php echo Html::anchor('request/delete/'.$item->id, '<i class="icon-trash icon-white"></i> 削除', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>投稿がありません。</p>

<?php endif; ?>
<!-- <p>
	<?php echo Html::anchor('request/create', '投稿する', array('class' => 'btn btn-success')); ?>

</p> -->
