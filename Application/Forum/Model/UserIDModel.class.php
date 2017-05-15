<?php
namespace Forum\Model;

use Think\Model;

class UserIDModel extends Model
{
	protected $trueTableName='tfor_user';

	// protected $_validate=array(
	// 	array('for_id','require','用户ID必须'),
	// 	array('for_password','require','密码必须'),
	// 	array('for_password','6,20','密码长度不正确',0,'length')
	// );
	/**
	 * 修改密码
	 * @return [type] [description]
	 */
}