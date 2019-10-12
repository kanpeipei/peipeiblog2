<!-- formタグを生成 -->
<?php echo Form::open(array("class"=>"form-login")); ?>

    <fieldset>
        <div class="login__form__group">
            メールアドレス<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
        </div>
        <div class="login__form__group">
            パスワード<?php echo Form::password('password', Input::post('password', isset($user) ? $user->password : ''),array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
        </div>
        <?php if($error['login']==='blank'): ?>
            <p class="error">※入力が不足しています。</p>
        <?php endif; ?>
        <?php if($error['login']==='error'): ?>
            <p class="error">※ログイン情報が見つかりません。</p>
        <?php endif; ?>

        <div class="login__form__group">
			<label class='control-label'></label>
			<?php echo Form::submit('submit', 'ログイン', array('class' => 'btn btn-primary')); ?>
		</div>

    </fieldset>

<?php echo Form::close(); ?>

<div class="new__account">
    <a class="" href="/sunday/user/join">新しいアカウントを作る</a>
</div>
