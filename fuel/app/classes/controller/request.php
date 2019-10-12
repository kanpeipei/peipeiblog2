<?php
class Controller_Request extends Controller_Template
{

	public function action_index()
	{
		if(Session::get('login_id')){
			$data['requests'] = Model_Request::find('all',array('order_by' => array('updated_at' => 'desc')));
			foreach($data['requests'] as $request)
			{
				$data['users'][$request->user_id] = Model_User::find($request->user_id);
			}

			$this->template->title = "Top";
			$this->template->content = View::forge('request/index', $data);
		}
		else{
			Response::redirect('user/login');
		}

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('request');

		if ( ! $data['request'] = Model_Request::find($id))
		{
			Session::set_flash('error', 'Could not find request #'.$id);
			Response::redirect('request');
		}

		$this->template->title = "Top";
		$this->template->content = View::forge('request/view', $data);

	}

	public function action_create()
	{
		if(Session::get('login_id'))
		{
			if (Input::method() == 'POST')//Add new Createボタンが押された時のみtrue
			{
				$val = Model_Request::validate('create');

				if ($val->run())
				{
					$request = Model_Request::forge(array(
						'user_id' => Session::get('login_id'),
						'body' => Input::post('body'),
						'ip' => Input::ip() //ブラウザからの情報からIPアドレスを取得
					));

					if ($request and $request->save())//ここでDBに保存している
					{
						Session::set_flash('success', 'Added request #'.$request->id.'.');

						Response::redirect('request');
					}

					else
					{
						Session::set_flash('error', 'Could not save request.');
					}
				}
				else
				{
					Session::set_flash('error', $val->error());
				}
			}

			$this->template->title = "Write";
			$this->template->content = View::forge('request/create');
		}
		else{
			Response::redirect('user/login');
		}

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('request');

		if ( ! $request = Model_Request::find($id))
		{
			Session::set_flash('error', 'Could not find request #'.$id);
			Response::redirect('request');
		}

		$val = Model_Request::validate('edit');

		if ($val->run())
		{
			$request->body = Input::post('body');
			$request->ip = Input::ip();

			if ($request->save())
			{
				Session::set_flash('success', 'Updated request #' . $id);

				Response::redirect('request');
			}

			else
			{
				Session::set_flash('error', 'Could not update request #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$request->body = $val->validated('body');
				$request->ip = $val->validated('ip');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('request', $request, false);
		}

		$this->template->title = "Requests";
		$this->template->content = View::forge('request/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('request');

		if ($request = Model_Request::find($id))
		{
			$request->delete();

			Session::set_flash('success', 'Deleted request #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete request #'.$id);
		}

		Response::redirect('request');

	}

}
