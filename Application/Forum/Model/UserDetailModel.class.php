<?php
namespace Forum\Model;

use Think\Model;

class UserDetailModel extends Model
{
	protected $trueTableName='tfor_detail';

	// protected $_validate=array(
	// 	array('for_id','require','用户ID必须'),
	// 	array('for_name','require','用户昵称必须'),
	// 	array('for_name','1,20','有效用户昵称字数为1-20！',0,'length'),
	// 	array('for_QQ','5,15','有效QQ号为5-15位！',0,'length'),
	// 	array('for_WeChat','6,20','有效微信号位6-20位！',0,'length'),
	// 	array('for_TEL','11','请输入11位数有效手机号码！',0,'length'),
	// 	array('for_Email','0,30','邮箱地址输入超出最大位数！',0,'length'),
	// 	array('for_hometown','0,30','家乡输入超出最大位数！',0,'length'),
	// 	array('for_signature','0,50','请控制个性签名在50字以内！',0,'length')
	// );
	
	public function alterMember()
	{
		$condition['for_id']=$_SESSION['name'];
	    return $this->where($condition)->field('for_name,for_head,for_sex,for_qq,for_wechat,for_tel,for_email,for_hometown,for_constellation,for_signature')->save($_POST)?0:1;
	}
}