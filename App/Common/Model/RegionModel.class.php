<?php
namespace Common\Model;
use Think\Model;
/*****
 *		Node模型
 *		editor	wxy
 *		date		2015-5-6 13:34:57
 *****/
class RegionModel extends Model {
    /**
     * @return mixed
     */
   public function getRegionList(){
       return $this->select();
   }
}
?>