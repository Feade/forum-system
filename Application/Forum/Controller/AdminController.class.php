<?php
namespace Forum\Controller;

use Think\Controller;

class MainPostController extends BaseController
{
	/**
	 * 后台管理首页
	 * @return [type] [description]
	 */
    public function index()
    {
		$this->display();
    }
}