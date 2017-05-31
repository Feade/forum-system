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
        $count=M('tfor_main')->where('for_flag=1')->order('for_time desc')->count();
        $Page=getpage($count,20);
        $MainPost=M('tfor_main')->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where('for_flag=1')->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();


        $circular=M('tfor_circular')->field('for_num,for_title')->order('for_time desc')->limit(5)->select();
        $this->assign('circular',$circular);
        $this->assign('list_post',$MainPost);
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
    public function searchCircular()
    {
        $class=M('tfor_class');
        $list=$class->field('for_class')->select();
        $this->assign('list',$list);
        if(IS_POST || $_GET)
        {
            if(IS_POST){$condition=$_POST;} 
            else if($_GET){$condition=$_GET;} 

            $searchLike="%".$condition['for_title']."%";
            $searchCircular['for_title']=array('like',$searchLike);
            $count =M('tfor_circular')->where($searchCircular)->count();
            if($count)
            {
                $Page =getpage($count,10);
                foreach ($condition as $key => $val) 
                {
                    $Page->parameter[$key] = $val;            
                }
                $circular=M('tfor_circular')->where($searchCircular)->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('circular',$circular);
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
            else
            {
                $this->error('没有查询到相关数据！请重新搜索...',U("Forum/MainPost/circular"));
            }
        }
        else
        {
            $this->error('搜索内容为空！',U("Forum/MainPost/circular"));
        }

    }
    public function showCircular()
    {
        $class=M('tfor_class');
        $list=$class->field('for_class')->select();
        $this->assign('list',$list);
        $condition['for_num']=$_GET['for_num'];
        $circular=M('tfor_circular')->where($condition)->find();
        $this->assign('circular',$circular);
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
     * 用户查看通告详情
     * @return [type] [description]
     */
    public function circular()
    {
        $class=M('tfor_class');
        $list=$class->field('for_class')->select();
        $this->assign('list',$list);

        $count =M('tfor_circular')->count();
        $Page =getpage($count,10);
        $circular=M('tfor_circular')->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('circular',$circular);
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
    /**
     * 查看主贴(评论数或点赞数顺序)
     * @return [type] [description]
     */
    public function hotMain()
    {
        $circular=M('tfor_circular')->field('for_num,for_title')->order('for_time desc')->limit(5)->select();
        $this->assign('circular',$circular);
        if($_GET['hot']==1)
        {
            $class=M('tfor_class');
            $list=$class->field('for_class')->select();
            $this->assign('list',$list);

            $order['for_flag']=1;
            $orderMain =M('tfor_main');
            $count =$orderMain->where($order)->count();
            $Page =getpage($count,10);

            $MainPost=$orderMain->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where($order)->order('for_join desc,for_up desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list_post',$MainPost);
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
        else if($_GET['hot']==2)
        {
            $class=M('tfor_class');
            $list=$class->field('for_class')->select();
            $this->assign('list',$list);

            $order['for_flag']=1;
            $orderMain =M('tfor_main');
            $count =$orderMain->where($order)->count();
            $Page =getpage($count,10);

            $MainPost=$orderMain->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where($order)->order('for_time desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list_post',$MainPost);
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
        else
        {
              $class=M('tfor_class');
            $list=$class->field('for_class')->select();
            $this->assign('list',$list);

            $order['for_flag']=1;
            $orderMain =M('tfor_main');
            $count =$orderMain->where($order)->count();
            $Page =getpage($count,10);

            $MainPost=$orderMain->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where($order)->order('for_up desc,for_join desc')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list_post',$MainPost);
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
	

    public function order()
    {
		$class=M('tfor_class');
		$list=$class->field('for_class')->select();
		$this->assign('list',$list);

		$order['for_class']=$_GET['for_class'];
		$order['for_flag']=1;
        $orderMain =M('tfor_main');
        $count =$orderMain->where($order)->count();
        $Page =getpage($count,10);

		$MainPost=$orderMain->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->where($order)->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list_post',$MainPost);
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
    /**
     * 搜索主贴
     * @return [type] [description]
     */
    public function searchMain()
    {
        $class=M('tfor_class');
        $list=$class->field('for_class')->select();
        $this->assign('list',$list);

        if(IS_POST) $con=$_POST;
        else $con=$_GET;

        $searchTitle = "%".$con['for_title']."%";
        $title['for_title']=array('like',$searchTitle);
        $flag['for_flag']=1;
        $searchMain =M('tfor_main');
        $count =$searchMain->where($title)->where($flag)->count();

        if($count)
        {
            $Page =getpage($count,10);
            foreach ($con as $key => $val) {
                $Page->parameter[$key] = $val;            
            }
            $show =$Page->show();// 分页显示输出
            $MainPost=$searchMain->where($title)->where($flag)->order('for_num desc,for_time')->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list_post',$MainPost);
            $this->assign('page',$show);

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
        else
        {
            $this->error("没有查询到相关数据！");
        }

    }
    /**
     * 拼接字符串
     * @param  [number] $str [日期]
     * @return [string]      [拼接的字符串]
     */
    protected function stitch($str)
    {
        if(strlen($str)==1)
        {
            $ret="0".$str;
            return $ret;
        }
        return $str;
    }
    /**
     * 条件模糊搜索主帖
     * @param  [type] $model     [列表]
     * @param  [type] $condition [条件]
     * @return [type]            [description]
     */
    protected function findMain($model , $postValue, $condition)
    {
        if($postValue)
        {
            return $model->where($condition);
        }
        return $model;
    }
     /**
     * 主贴高级搜索
     * @return [type] [description]
     */
    public function moreSearch()
    {
        // $this->isLoginadm();
        $class=M('tfor_class');
        $list=$class->field('for_class')->select();
        $this->assign('list',$list);

        if(IS_POST || $_GET)
        {
            if(IS_POST){$condition=$_POST;} 
            else if($_GET){$condition=$_GET;} 

            if($condition['for_title'])
            {
                $searchTemp="%".$condition['for_title']."%";
                $searchTitle['for_title']=array('like',$searchTemp);
                // echo $searchTemp."**";
            }
            if($condition['for_id'])
            {
                $searchTemp="%".$condition['for_id']."%";
                $searchID['tfor_main.for_id']=array('like',$searchTemp);
                // echo $searchTemp."**";
            }
            if($condition['for_class'])
            {
                $searchTemp="%".$condition['for_class']."%";
                $searchClass['for_class']=array('like',$searchTemp);
                // echo $searchTemp."**";
            }
            if($condition['for_text'])
            {
                $searchTemp="%".$condition['for_text']."%";
                $searchText['for_text']=array('like',$searchTemp);
                // echo $searchTemp."**";
            }
            if($condition['for_year'] || $condition['for_month'] || $condition['for_day'] || $condition['for_hour'])
            {
                $time=1;
            }
            else
            {
                $time=0;
            }
            if($time==1)
            {
                if($condition['for_year'])
                {
                    $searchTemp="%".$condition['for_year'];
                    if($condition['for_month'])
                    {
                        $searchTemp=$searchTemp."-".$this->stitch($condition['for_month']);
                        if($condition['for_day'])
                        {
                            $searchTemp=$searchTemp."-".$this->stitch($condition['for_day']);
                            if($condition['for_hour'])
                            {
                                $searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
                                if($condition['for_minute'])
                                {
                                    $searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
                                }
                            }
                        }
                    }
                }
                else
                {
                    if($condition['for_month'])
                    {
                        $searchTemp="%".$this->stitch($condition['for_month']);
                        if($condition['for_day'])
                        {
                            $searchTemp=$searchTemp."-".$this->stitch($condition['for_day']);
                            if($condition['for_hour'])
                            {
                                $searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
                                if($condition['for_minute'])
                                {
                                    $searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
                                }
                            }
                        }
                    }
                    else
                    {
                        if($condition['for_day'])
                        {
                            $searchTemp="%".$this->stitch($condition['for_day']);
                            if($condition['for_hour'])
                            {
                                $searchTemp=$searchTemp." ".$this->stitch($condition['for_hour']);
                                if($condition['for_minute'])
                                {
                                    $searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
                                }
                            }
                        }
                        else
                        {
                            if($condition['for_hour'])
                            {
                                $searchTemp="%".$this->stitch($condition['for_hour']);
                                if($condition['for_minute'])
                                {
                                    $searchTemp=$searchTemp.":".$this->stitch($condition['for_minute']);
                                }
                            }
                        }
                    }
                }
                $searchTemp=$searchTemp."%";
                $searchTime['for_time']=array('like',$searchTemp);
            }

            $flag['for_flag']=array('eq',1);


            $searchMain =M('tfor_main');
            $count=$this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($searchMain,$condition['for_title'],$searchTitle),$condition['for_id'],$searchID),$condition['for_class'],$searchClass),$condition['for_text'],$searchText),$time,$searchTime),1,$flag)->count();
    // echo $count."**";
            if($count)
            {
                $Page =getpage($count,10);
                foreach ($condition as $key => $val) 
                {
                    $Page->parameter[$key] = $val;            
                }
                
                $MainPost=$this->findMain($this->findMain($this->findMain($this->findMain($this->findMain($searchMain->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id'),$condition['for_title'],$searchTitle),$condition['for_id'],$searchID),$condition['for_class'],$searchClass),$condition['for_text'],$searchText),$time,$searchTime)->where($flag)->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();
    // echo count($MainPost,0);
                $this->assign('list_post',$MainPost);
                $this->assign('page',$Page->show());
                $this->display();
                
            }
            else
            {
                $this->error("没有查询到相关数据！");
            }       
        }
        else
        {
            $flag['for_flag']=array('eq',1);

            $count=M('tfor_main')->where($flag)->count();
            $Page =getpage($count,10);
            $MainPost=M('tfor_main')->where($flag)->join('LEFT JOIN tfor_detail ON tfor_main.for_id = tfor_detail.for_id')->order('for_num desc,for_time')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list_post',$MainPost);
            $this->assign('page',$Page->show());
            $this->display();
        }
    }
    /**
     * 添加主题帖
     */
    public function addMain()
    {
    	$this->islogin();
    	$user['for_id']=$_SESSION['name'];
		$head=M('tfor_detail')->where($user)->field('for_head')->find();
		$this->assign('userHead',$head);
    	if(IS_POST)
    	{
	    	$_POST['for_id']=$_SESSION['name'];
            $this->updateUserValue($_POST['for_id'],5,0);
	    	$this->addDate(D('MainPost'));
    	}
    	else
		{
			$list=M('tfor_class')->field('for_class')->select();
			$this->assign('list',$list);
			$this->display();
		}
    }
}