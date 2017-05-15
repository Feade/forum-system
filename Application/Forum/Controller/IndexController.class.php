<?php
namespace Forum\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    public function index()
    {
		if(session('login')=='is_login')
		{
			$this->display();
		}
		else
		{
			$this->success('请登录 ',U('Forum/Login/login'));
		}
    }
}