<?php
// $login_id = Session::get('login_id'); 
// if($login_id):?>
<?php
//  $user = Model_User::find($login_id); ?>

<h1><?php echo $user->name ?></h1><br>
メールアドレス
<h2><?php echo $user->email ?></h2><br>
誕生日
<h2><?php echo $user->birthday_year ?>年<?php echo $user->birthday_month ?>月<?php echo $user->birthday_day ?>日</h2>
<p><?php echo $user->comment ?></p>

<?php 
// else: ?>
<?php 
// Response::redirect('user/login'); ?>


<?php
// 1 endif;?>
