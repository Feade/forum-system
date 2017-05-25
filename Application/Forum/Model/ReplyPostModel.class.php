<?php
namespace Forum\Model;

use Think\Model;

class ReplyPostModel extends Model
{
	protected $trueTableName='tfor_reply';

	protected $_validate=array(
		array('for_text','require','回复内容必须')
	);

	/**
	 * 用户删除回贴
	 * 标记flag=0
	 * @return [type] [description]
	 */
	public function deleteMember()
	{
		$condition['for_num']=$_GET['delete_reply_num'];
		$flag['for_flag']=0;
		$flag['for_text']="<font color='red'>用户已删除该回复信息</font>";
		return $this->where($condition)->field('for_text,for_flag')->save($flag)?0:1;
	}
	/**
	 * 用户修改回贴
	 * @return [type] [description]
	 */
	public function alterMember()
	{
		$condition['for_num']=$_GET['alter_reply_num'];
		return $this->where($condition)->field('for_text')->save($_POST)?0:1;
	}
}