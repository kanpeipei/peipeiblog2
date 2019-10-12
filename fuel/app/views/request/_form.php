<!-- Formタグを作成（属性も指定） -->
<?php echo Form::open(array("class"=>"form-horizontal")); ?>


	<fieldset>
		<div class="form-group">
			<!-- フォームの上にくっついてる文字 -->
			<!-- <?php echo Form::label('Body', 'body', array('class'=>'control-label')); ?> -->
				<?php echo Form::input('body', Input::post('body', isset($request) ? $request->body : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'新しい投稿を書いてみよう')); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', '投稿', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>