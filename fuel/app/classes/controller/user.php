<?php
class Controller_User extends Controller_Template
{

	public function action_profile($user_id = null)
	{
		if($login_id = Session::get('login_id')){
			if(is_null($user_id)){
				$data['user'] = Model_User::find($login_id);
				$this->template->title = "My Profile";
			}
			else{
				$data['user'] = Model_User::find($user_id);
				$this->template->title = "Profile";
			}
			$this->template->content = View::forge('user/profile', $data);
		}
		else{
			Response::redirect('user/login');
		}
	}
	public function action_join()
	{
        $data['error']['join'] = 'null';

		if (Input::method() == 'POST')//登録ボタンが押された時のみtrue
		{
			$val = Model_User::validate('join');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'name' => Input::post('name'),
					'email' => Input::post('email'),
					'password' => Input::post('password'),
					'birthday_year' => Input::post('birthday_year'),
					'birthday_month' => Input::post('birthday_month'),
					'birthday_day' => Input::post('birthday_day'),
				));

				$accounts = Model_User::find('all');
				$overlap = 0;//アカウントデータの被りの有無
				foreach($accounts as $account)
				{
					if($account->email===$user->email)
					{
						$data['error']['join'] = 'email';
						$overlap = 1;
					}
				}

				if ($user and $user->save() and $overlap===0)//ここでDBに保存している
				{
                    Session::set_flash('success', 'Added request #'.$user->id.'.');

                    Session::set('login_id', $user->id);

                    Response::redirect('user/profile');
				}

				else
				{
					Session::set_flash('error', 'Could not save request.');
				}
			}
			else
			{
                Session::set_flash('error', $val->error());
                $data['error']['join'] = 'error';
            }
		}

		$this->template->title = "New Account";
		$this->template->content = View::forge('user/join', $data);

	}
	public function action_login()
	{
        $data['error']['login'] = 'null';//エラーを格納する配列の初期化

		if (Input::method() == 'POST')//ログインボタンが押された時のみtrue
		{
            $login_email = Input::post('email');
            $login_password = Input::post('password');

			if ($login_email && $login_password)
			{

                $users = Model_User::find('all', array('where'=> array(array('email','=', $login_email), array('password','=',$login_password))));

				foreach($users as $user)
				{
					$user_id = $user->id;
				}

                if($users)
                {
                    Session::set_flash('success', 'Added request #'.$user_id.'.');
                    Session::set('login_id', $user_id);
                    Response::redirect('request');
                }
                else
                {
                    $data['error']['login'] = 'error';
                }
			}
			else
			{
                $data['error']['login'] = 'blank';
            }
		}

		$this->template->title = "Login";
		$this->template->content = View::forge('user/login', $data);

	}

}
