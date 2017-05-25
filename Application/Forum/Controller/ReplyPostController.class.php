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
            if($_POST['for_text'])
            {
            	$_POST['for_id']=$_SESSION['name'];
        		$main['for_num']=$_POST['for_fatherid'];
    			$addJoin=M('tfor_main')->where($main)->field('for_join,for_floor')->find();
    			$addJoin['for_join']+=1;
    			$addJoin['for_floor']+=1;
    			M('tfor_main')->where($main)->setField($addJoin);
    			$_POST['for_floor']=$addJoin['for_floor'];
               
                $who=M('tfor_main')->where($main)->field('for_id')->find();
                $this->updateUserValue($who['for_id'],1,0);

                $this->updateUserValue($_POST['for_id'],1,0);
        		$this->addDate(D('ReplyPost'));
            }
            else
            {
                $this->error("回复内容不能为空！<br>即将跳转到主页...",U("Forum/MainPost/index"));
            }

        }
        else
        {
        	$class=M('tfor_class');
            $list=$class->field('for_class')->select();
            $this->assign('list',$list);
	        $mainNum['for_num']=$_GET['for_num'];
	        $main['for_flag']=1;
            $main['for_flag']=3;
            $main['_logic'] = 'OR';
	        $MainPost=D('MainPost')->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where($mainNum)->where($main)->find();
	        $MainPost['for_text']=htmlspecialchars_decode($MainPost['for_text']);
	        $reply['for_fatherid']=$_GET['for_num'];
	        $count=D('ReplyPost')->where($reply)->count();
            $Page=getpage($count,10);
	        $ReplyPost=D('ReplyPost')->join('LEFT JOIN tfor_detail ON tfor_reply.for_id = tfor_detail.for_id')->where($reply)->limit($Page->firstRow.','.$Page->listRows)->select();
	        for ($i=0; $i < count($ReplyPost,0); $i++)
	        {
	        	$ReplyPost[$i]['for_text']=htmlspecialchars_decode($ReplyPost[$i]['for_text']);
	        }
	        $this->assign('ReplyPost',$ReplyPost);
	        $this->assign('MainPost',$MainPost);
            $this->assign('page',$Page->show());
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
        $count=D('ReplyPost')->where('for_flag=%d and tfor_reply.for_id=%d',$flag,$_SESSION['name'])->count();
        if($count)
        {
            $Page=getpage($count,10);
            $ReplyPost=M('tfor_reply')->join('LEFT JOIN tfor_detail ON tfor_reply.for_id = tfor_detail.for_id')->where('for_flag=%d and tfor_reply.for_id=%d',$flag,$_SESSION['name'])->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();
           	for ($i=0; $i < count($ReplyPost,0); $i++)
           	{
    	    	$temp=M('tfor_main')->where('for_num=%d',$ReplyPost[$i]['for_fatherid'])->field('for_title')->find();
                $ReplyPost[$i]['for_title']=$temp['for_title'];
            }
            $this->assign('page',$Page->show());
            $this->assign('list_post',$ReplyPost);
            $user['for_id']=$_SESSION['name'];
            $head=M('tfor_detail')->where($user)->field('for_head')->find();
            $this->assign('userHead',$head);
            $this->display();
        }
        else
        {
            $this->error('未查询到相关数据！',U("Forum/UserDetail/index"));
        }
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
     * 用户彻底删除回贴
     * @return [type] [description]
     */
    public function deleteCompletely()
    {
        $this->islogin();
        // echo $_GET['delete_reply_num'];
        if($_GET['delete_true']==2)
        {
            $condition['for_num']=$_GET['delete_reply_num'];
            $flag['for_flag']=2;
            $stuts=D('ReplyPost')->where($condition)->field('for_flag')->save($flag);
            if($stuts)
            {
                $this->success('成功删除！');
            }
            else
            {
                $this->error('删除失败！');
            }
        }
    }
}