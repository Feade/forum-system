<?php
namespace Forum\Controller;

use Think\Controller;

class OperateController extends BaseController
{
	/**
	 * 主贴点赞
	 * @return [type] [description]
	 */
	public function mainUp()
	{
		$this->islogin();
		$up['for_id']=$_SESSION['name'];
		$up['for_num']=$_GET['for_num'];
		$mainUp=M('tfor_operate1')->where($up)->field('for_up,for_report,for_down')->find();
		if($mainUp)
		{
			if($mainUp['for_up']==1 || $mainUp['for_down']==1)
			{
				$this->error('一贴一赞(踩)！');
			}
			else if($mainUp['for_report']==1)
			{
				$this->error('您都举报了，还给点赞~_~ ! <br>系统一致决定，不同意...');
			}
			else
			{
				$up['for_up']=1;
				M('tfor_operate1')->save($up);
				$main['for_num']=$up['for_num'];
				$addUp=M('tfor_main')->where($main)->field('for_up')->find();
				$addUp['for_up']+=1;
				M('tfor_main')->where($main)->setField($addUp);
				$this->success('点赞 成功！');
			}
		}
		else
		{
			$up['for_up']=1;
			M('tfor_operate1')->add($up);
			$main['for_num']=$up['for_num'];
			$addUp=M('tfor_main')->where($main)->field('for_up')->find();
			$addUp['for_up']+=1;
			M('tfor_main')->where($main)->setField($addUp);
			$this->success('点赞 成功！');
		}
	}
	/**
	 * 主贴踩
	 * @return [type] [description]
	 */
	public function mainDown()
	{
		$this->islogin();
		$up['for_id']=$_SESSION['name'];
		$up['for_num']=$_GET['for_num'];
		$mainUp=M('tfor_operate1')->where($up)->field('for_up,for_down')->find();
		if($mainUp)
		{
			if($mainUp['for_up']==1 || $mainUp['for_down']==1)
			{
				$this->error('一贴一赞(踩)！');
			}
			else
			{
				$up['for_down']=1;
				M('tfor_operate1')->save($up);
				$main['for_num']=$up['for_num'];
				$addDown=M('tfor_main')->where($main)->field('for_down')->find();
				$addDown['for_down']+=1;
				M('tfor_main')->where($main)->setField($addDown);
				$this->success('投掷板砖 成功！');
			}
		}
		else
		{
			$up['for_down']=1;
			M('tfor_operate1')->add($up);
			$main['for_num']=$up['for_num'];
			$addDown=M('tfor_main')->where($main)->field('for_down')->find();
			$addDown['for_down']+=1;
			M('tfor_main')->where($main)->setField($addDown);
			$this->success('投掷板砖 成功！');
		}
	}
	/**
	 * 主贴举报
	 * @return [type] [description]
	 */
	public function mainReport()
	{
		$this->islogin();
		$up['for_id']=$_SESSION['name'];
		$up['for_num']=$_GET['for_num'];
		$mainUp=M('tfor_operate1')->where($up)->field('for_up,for_report')->find();
		if($mainUp)
		{
			if($mainUp['for_report']==1)
			{
				$this->error('亲，举报一次就好啦！');
			}
			else if($mainUp['for_up']==1)
			{
				$this->error('您都赞了，还要举报~_~ ! <br>系统一致决定，不同意...');
			}
			else
			{
				$up['for_report']=1;
				M('tfor_operate1')->save($up);
				$main['for_num']=$up['for_num'];
				$addReport=M('tfor_main')->where($main)->field('for_report')->find();
				$addReport['for_report']+=1;
				M('tfor_main')->where($main)->setField($addReport);
				$this->success('举报 成功！');
			}
		}
		else
		{
			$up['for_report']=1;
			M('tfor_operate1')->add($up);
			$main['for_num']=$up['for_num'];
			$addReport=M('tfor_main')->where($main)->field('for_report')->find();
			$addReport['for_report']+=1;
			M('tfor_main')->where($main)->setField($addReport);
			$this->success('举报 成功！');
		}
	}



	/**
	 * 回帖点赞
	 * @return [type] [description]
	 */
	public function replyUp()
	{
		$this->islogin();
		$up['for_id']=$_SESSION['name'];
		$up['for_num']=$_GET['for_num'];
		$replyUp=M('tfor_operate2')->where($up)->field('for_up,for_report,for_down')->find();
		if($replyUp)
		{
			if($replyUp['for_up']==1 || $replyUp['for_down']==1)
			{
				$this->error('一贴一赞(踩)！');
			}
			else if($replyUp['for_report']==1)
			{
				$this->error('您都举报了，还给点赞~_~ ! <br>系统一致决定，不同意...');
			}
			else
			{
				$up['for_up']=1;
				M('tfor_operate2')->save($up);
				$reply['for_num']=$up['for_num'];
				$addUp=M('tfor_reply')->where($reply)->field('for_up')->find();
				$addUp['for_up']+=1;
				M('tfor_reply')->where($reply)->setField($addUp);
				$this->success('点赞 成功！');
			}
		}
		else
		{
			$up['for_up']=1;
			M('tfor_operate2')->add($up);
			$reply['for_num']=$up['for_num'];
			$addUp=M('tfor_reply')->where($reply)->field('for_up')->find();
			$addUp['for_up']+=1;
			M('tfor_reply')->where($reply)->setField($addUp);
			$this->success('点赞 成功！');
		}
	}
	/**
	 * 回帖踩
	 * @return [type] [description]
	 */
	public function replyDown()
	{
		$this->islogin();
		$up['for_id']=$_SESSION['name'];
		$up['for_num']=$_GET['for_num'];
		$replyUp=M('tfor_operate2')->where($up)->field('for_up,for_down')->find();
		if($replyUp)
		{
			if($replyUp['for_up']==1 || $replyUp['for_down']==1)
			{
				$this->error('一贴一赞(踩)！');
			}
			else
			{
				$up['for_down']=1;
				M('tfor_operate2')->save($up);
				$reply['for_num']=$up['for_num'];
				$addDown=M('tfor_reply')->where($reply)->field('for_down')->find();
				$addDown['for_down']+=1;
				M('tfor_reply')->where($reply)->setField($addDown);
				$this->success('投掷板砖 成功！');
			}
		}
		else
		{
			$up['for_down']=1;
			M('tfor_operate2')->add($up);
			$reply['for_num']=$up['for_num'];
			$addDown=M('tfor_reply')->where($reply)->field('for_down')->find();
			$addDown['for_down']+=1;
			M('tfor_reply')->where($reply)->setField($addDown);
			$this->success('投掷板砖 成功！');
		}
	}
	/**
	 * 回帖举报
	 * @return [type] [description]
	 */
	public function replyReport()
	{
		$this->islogin();
		$up['for_id']=$_SESSION['name'];
		$up['for_num']=$_GET['for_num'];
		$replyUp=M('tfor_operate2')->where($up)->field('for_up,for_report')->find();
		if($replyUp)
		{
			if($replyUp['for_report']==1)
			{
				$this->error('亲，举报一次就好啦！');
			}
			else if($replyUp['for_up']==1)
			{
				$this->error('您都赞了，还要举报~_~ ! <br>系统一致决定，不同意...');
			}
			else
			{
				$up['for_report']=1;
				M('tfor_operate2')->save($up);
				$reply['for_num']=$up['for_num'];
				$addReport=M('tfor_reply')->where($reply)->field('for_report')->find();
				$addReport['for_report']+=1;
				M('tfor_reply')->where($reply)->setField($addReport);
				$this->success('举报 成功！');
			}
		}
		else
		{
			$up['for_report']=1;
			M('tfor_operate2')->add($up);
			$reply['for_num']=$up['for_num'];
			$addReport=M('tfor_reply')->where($reply)->field('for_report')->find();
			$addReport['for_report']+=1;
			M('tfor_reply')->where($reply)->setField($addReport);
			$this->success('举报 成功！');
		}
	}
}