<!-- formタグを生成 -->
<?php echo Form::open(array("class"=>"form-join")); ?>

    <fieldset>

        <div class="join__form__group">
            名前<?php echo Form::input('name', Input::post('name', isset($user) ? $user->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
        </div>
        <?php if($error['join']==='email'): ?>
            <p class="error">※このメールアドレスは使用されています。</p>
        <?php endif; ?>
        <div class="join__form__group">
            メールアドレス<?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
        </div>
        <div class="join__form__group">
            パスワード<?php echo Form::password('password', Input::post('password', isset($user) ? $user->password : ''),array('class' => 'col-md-4 form-control', 'placeholder'=>'')); ?>
        </div>
        <div class="join__form__group">
            生年月日<br>
            <br>
                年<br>
                <select class="col-md-4 form-control" name="birthday_year" >
                <?php for($i=2020;$i>=1900;$i--): ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?></select>
                月<br>
                <select class="col-md-4 form-control" name="birthday_month" >
                <?php for($i=1;$i<=12;$i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?></select>
                日<br>
                <select class="col-md-4 form-control" name="birthday_day" >
                <?php for($i=1;$i<=31;$i++): ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php endfor; ?></select>
        </div>
        <?php if($error['join']==='error'): ?>
            <p class="error">※入力が不足しています。</p>
        <?php endif; ?>

        <div class="join__form__group">
			<label class='control-label'></label>
			<?php echo Form::submit('submit', '登録', array('class' => 'btn btn-primary')); ?>
		</div>

    </fieldset>

<?php echo Form::close(); ?>
