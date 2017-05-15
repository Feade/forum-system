<?php
namespace Forum\Controller;

use Think\Controller;

class UserDetailController extends BaseController
{
    /**
     * 用户个人中心
     * @return null
     */
    public function index()
    {
        $this->islogin();
        $class=M('tfor_class');
        $list=$class->field('for_class')->select();
        $this->assign('list',$list);
        $who['for_id']=$_SESSION['name'];
        $UserDetail=D('UserDetail')->where($who)->find();
        $this->assign('UserDetail',$UserDetail);
        $this->display();
    }

    /**
     * 查看用户个人详细信息
     * @return [type] [description]
     */
    public function show()
    {
        $this->islogin();
        $who['for_id']=$_GET['ID'];
        $UserDetail=D('UserDetail')->where($who)->find();
        $this->assign('UserDetail',$UserDetail);
        $this->display();
    }

	/**
	 * 修改用户个人详细信息
	 * @return [type] [description]
	 */
    public function modify()
    {
        $this->islogin();
        if(IS_POST)
	    {
            $config=array(
                'maxSize' => 1024*300,
                'exts' => array('jpg','gif','png','jpeg','ico'),
                'rootPath' => './Public/Forum/image',
                'savePath' => './',
                'subName' => $_SESSION['name'],
                'saveExt' => 'png',
            );
            $photo=new \Think\Upload($config);
            $info=$photo->uploadOne($_FILES['for_head']);
            if(!$info)
            {
                $this->alterDate(D('UserDetail'));
            }
            else
            {
                $_POST['for_head']=$_SESSION['name'].'/'.$info['savename'];
                $this->alterDate(D('UserDetail'));
            }
	    }
	    else
		{
			$who['for_id']=$_SESSION['name'];
			$UserDetail=D('UserDetail')->where($who)->field('for_name,for_head,for_sex,for_QQ,for_WeChat,for_TEL,for_Email,for_hometown,for_constellation,for_signature')->find();
			$this->assign('UserDetail',$UserDetail);
			$this->assign('ID',$who['for_id']);
			$this->display();
		}
    }
    /**
     * 修改主帖状态值
     * @param  [int] $flag [1：展示；0：用户回收站；2-9：用户彻底删除]
     * @return null
     */
    protected function alterStatus($flag)
    {
        $this->islogin();
        $class=M('tfor_class');
        $list=$class->field('for_class')->select();
        $this->assign('list',$list);
        $MainPost=M('tfor_main')->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where('for_flag=%d and tfor_main.for_id=%d',$flag,$_SESSION['name'])->select();
        for ($i=0; $i < count($MainPost,0); $i++)
        {
            $MainPost[$i]['for_text']=htmlspecialchars_decode($MainPost[$i]['for_text']);
        }
        $this->assign('list_post',$MainPost);
        $this->display();
    }
    /**
     * 用户已发主帖
     * @return null
     */
    public function myPost()
    {

        $this->alterStatus(1);
    }
    /**
     * 用户主贴回收站
     * @return [type] [description]
     */
    public function recovery()
    {
        $this->alterStatus(0);
    }
    /**
     * 用户更改主帖
     * @return null
     */
    public function alterPost()
    {
        $this->islogin();
        if(IS_POST)
        {
            $this->alterDate(D('MainPost'));
        }
        else
        {
            $class=M('tfor_class');
            $list=$class->field('for_class')->select();
            $this->assign('list',$list);
            $who['for_num']=$_GET['alter_main_num'];
            $MainPost=D('MainPost')->where($who)->field('for_title,for_class,for_text')->find();
            $MainPost['for_text']=htmlspecialchars_decode($MainPost['for_text']);
            $this->assign('for_num',$who['for_num']);
            $this->assign('MainPost',$MainPost);
            $this->display();
        }
    }
    /**
     * 用户删除主贴
     * @return [type] [description]
     */
    public function deletePost()
    {
        $this->islogin();
        if($_GET['delete_true']==0)
        {
            $this->deleteDate(D('MainPost'));
        }
    }
    /**
     * 用户恢复已删主贴
     * @return [type] [description]
     */
    public function backPost()
    {
        $this->islogin();
        if($_GET['back_true']==2)
        {
            $who['for_num']=$_GET['back_main_num'];
            $flag['for_flag']=1;
            $status=D('MainPost')->where($who)->field('for_flag')->save($flag)?0:1;
            if(!$status)
            {
                $this->success('恢复成功');
            }
            else
            {
                $this->error('恢复失败');
            }
        }
    }
}