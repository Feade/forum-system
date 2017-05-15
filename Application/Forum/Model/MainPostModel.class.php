<?php
namespace Forum\Model;

use Think\Model;

class MainPostModel extends Model
{
	protected $trueTableName='tfor_main';

	protected $_validate=array(
		array('for_title','require','标题必须'),
		array('for_class','require','类别必须'),
		array('for_text','require','内容必须')
	);
	
	/**
	 * 用户删除主贴
	 * 标记flag=0
	 * @return [type] [description]
	 */
	public function deleteMember()
	{
		$condition['for_num']=$_GET['delete_main_num'];
		$flag['for_flag']=0;
		return $this->where($condition)->field('for_flag')->save($flag)?0:1;
	}
	/**
	 * 用户修改主贴
	 * @return [type] [description]
	 */
	public function alterMember()
	{
		$condition['for_num']=$_GET['alter_main_num'];
		return $this->where($condition)->field('for_title,for_class,for_text')->save($_POST)?0:1;
	}
}