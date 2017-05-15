<?php
namespace Forum\Controller;

use Think\Controller;

class MainPostController extends BaseController
{
	/**
	 * 主贴首页(时间顺序)
	 * @return [type] [description]
	 */
    public function index()
    {
		$class=M('tfor_class');
		$list=$class->field('for_class')->select();
		$this->assign('list',$list);

		$MainPost=M('tfor_main')->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where('for_flag=1')->order('for_num desc,for_time')->select();
		for ($i=0; $i < count($MainPost,0); $i++)
		{ 
            $MainPost[$i]['for_text']=htmlspecialchars_decode($MainPost[$i]['for_text']);
        }
		$this->assign('list_post',$MainPost);
		if($_SESSION['name'])
		{
			$user['for_id']=$_SESSION['name'];
			$head=M('tfor_detail')->where($user)->field('for_head')->find();
			$this->assign('userHead',$head);
			$this->display();
		}
		else
		{	
			$head['for_head']='login.jpg';	
			$this->assign('userHead',$head);
			$this->display();
		}
    }

	/**
	 * 主贴首页-按类别显示(时间顺序)
	 * @return [type] [description]
	 */
    public function order()
    {
		$class=M('tfor_class');
		$list=$class->field('for_class')->select();
		$this->assign('list',$list);

		$order['for_class']=$_GET['for_class'];
		$order['for_flag']=1;
		$MainPost=M('tfor_main')->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where($order)->order('for_num desc,for_time')->select();
		for ($i=0; $i < count($MainPost,0); $i++)
		{ 
            $MainPost[$i]['for_text']=htmlspecialchars_decode($MainPost[$i]['for_text']);
        }
		$this->assign('list_post',$MainPost);
		if($_SESSION['name'])
		{
			$user['for_id']=$_SESSION['name'];
			$head=M('tfor_detail')->where($user)->field('for_head')->find();
			$this->assign('userHead',$head);
			$this->display();
		}
		else
		{	
			$head['for_head']='login.jpg';	
			$this->assign('userHead',$head);
			$this->display();
		}
    }

    /**
     * 添加主题帖
     */
    public function addMain()
    {
    	$this->islogin();
    	if(IS_POST)
    	{
	    	$_POST['for_id']=$_SESSION['name'];
	    	$this->addDate(D('MainPost'));
    	}
    	else
		{
			$list=M('tfor_class')->field('for_class')->select();
			$this->assign('list',$list);
			$this->display();
		}
    }

    public function deleteMain()
    {
    	
    }

}