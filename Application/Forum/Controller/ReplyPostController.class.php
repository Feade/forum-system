<?php
namespace Forum\Controller;

use Think\Controller;

class ReplyPostController extends BaseController
{
	/**
	 * 显示回复详情
	 * 添加回复
	 * @return [type] [description]
	 */
    public function index()
    {
        if(IS_POST)
        {
	        $this->islogin();
        	$_POST['for_id']=$_SESSION['name'];
    		$main['for_num']=$_POST['for_fatherid'];
			$addJoin=M('tfor_main')->where($main)->field('for_join,for_floor')->find();
			$addJoin['for_join']+=1;
			$addJoin['for_floor']+=1;
			M('tfor_main')->where($main)->setField($addJoin);
			$_POST['for_floor']=$addJoin['for_floor'];
    		$this->addDate(D('ReplyPost'));

        }
        else
        {
        	$class=M('tfor_class');
            $list=$class->field('for_class')->select();
            $this->assign('list',$list);
	        $main['for_num']=$_GET['for_num'];
	        $main['for_flag']=1;
	        $MainPost=D('MainPost')->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where($main)->find();
	        $MainPost['for_text']=htmlspecialchars_decode($MainPost['for_text']);
	        $reply['for_fatherid']=$_GET['for_num'];
	        $reply['for_flag']=1;
	        $ReplyPost=D('ReplyPost')->join('LEFT JOIN tfor_detail ON tfor_reply.for_id = tfor_detail.for_id')->where($reply)->select();
	        for ($i=0; $i < count($ReplyPost,0); $i++)
	        {
	        	$ReplyPost[$i]['for_text']=htmlspecialchars_decode($ReplyPost[$i]['for_text']);
	        }
	        $this->assign('ReplyPost',$ReplyPost);
	        $this->assign('MainPost',$MainPost);
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
    }
    /**
     * 修改回帖状态值
     * @param  [int] $flag [1：展示；0：用户回帖回收站；2-9：用户彻底删除]
     * @return null
     */
    protected function alterStatus($flag)
    {
        $this->islogin();
        $ReplyPost=M('tfor_reply')->join('LEFT JOIN tfor_detail ON tfor_reply.for_id = tfor_detail.for_id')->where('for_flag=%d and tfor_reply.for_id=%d',$flag,$_SESSION['name'])->select();
       	for ($i=0; $i < count($ReplyPost,0); $i++)
       	{
	    	$ReplyPost[$i]['for_text']=htmlspecialchars_decode($ReplyPost[$i]['for_text']);
	    }
        $this->assign('list_post',$ReplyPost);
        $this->display();
    }
    /**
     * 用户已发回帖
     * @return null
     */
    public function myReply()
    {
        $this->alterStatus(1);
    }
    /**
     * 用户回贴回收站
     * @return [type] [description]
     */
    public function recovery()
    {
        $this->alterStatus(0);
    }
    /**
     * 用户更改回帖
     * @return null
     */
    public function alterReply()
    {
        $this->islogin();
        if(IS_POST)
        {
            $this->alterDate(D('ReplyPost'));
        }
        else
        {
            $class=M('tfor_class');
            $list=$class->field('for_class')->select();
            $this->assign('list',$list);
            $who['for_num']=$_GET['alter_main_num'];
            $ReplyPost=D('ReplyPost')->where($who)->field('for_title,for_class,for_text')->find();
            $this->assign('for_num',$who['for_num']);
            $this->assign('ReplyPost',$ReplyPost);
            $this->display();
        }
    }
    /**
     * 用户删除回贴
     * @return [type] [description]
     */
    public function deleteReply()
    {
        $this->islogin();
        if($_GET['delete_true']==0)
        {
            $this->deleteDate(D('ReplyPost'));
        }
    }
    /**
     * 用户恢复已删回贴
     * @return [type] [description]
     */
    public function backReply()
    {
        $this->islogin();
        if($_GET['back_true']==2)
        {
            $who['for_num']=$_GET['back_reply_num'];
            $flag['for_flag']=1;
            $status=D('ReplyPost')->where($who)->field('for_flag')->save($flag)?0:1;
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