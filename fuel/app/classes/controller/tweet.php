<?php

class Controller_Tweet extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );//?
		$this->template->title = 'Peipei Blog';//template.phpの$titleに代入される
		$this->template->content = View::forge('tweet/index', $data);//viewプログラムを呼び出し$contentに代入される（第二引数に渡したいデータの配列を入れる）
	}
	public function action_about()
	{
		$this->template->title = 'Peipei Blog';//template.phpの$titleに代入される
		$data["title"] = $this->template->title;//$this->template->titleはtemplate.phpでしか使えないから$data連想配列に入れて渡す
		$this->template->content = View::forge('tweet/about', $data);//viewプログラムを呼び出し$contentに代入される（第二引数に渡したいデータの配列を入れる）
	}


}
