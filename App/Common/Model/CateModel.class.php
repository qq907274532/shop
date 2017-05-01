<?php
namespace Common\Model;
use Think\Model;
/*****
 *		Node模型
 *		editor	wxy
 *		date		2015-5-6 13:34:57
 *****/
class CateModel extends Model {
	const STATUS_ENABLE="1";
	const STATUS_DISABLE="2";
	public static $STATUS_MAP=array(
		self::STATUS_ENABLE=>'启用',
		self::STATUS_DISABLE=>'禁用',
		);
	protected $_validate = array(
      array('cate','require','分类名称必须填写'), 
    
   );
}
?>