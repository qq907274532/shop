<?php
if(file_exists("Data/conf/db.php")){
	$db=include "Data/conf/db.php";
}else{
	$db=array();
}

$config= array(
	
	'URL_MODEL'=>'2',
	'COMM_TITLE'=>'易名轩管理系统',
	'PAGE_NUMBER'=>'15',
	/* 系统变量名称设置 */
	'VAR_MODULE'            =>  'g',     // 默认模块获取变量
	'VAR_CONTROLLER'        =>  'm',    // 默认控制器获取变量
	'VAR_ACTION'            =>  'c',    // 默认操作获取变量
	'MODULE_ALLOW_LIST' => array (
                'Home',
                'Manager',
                
        ),
        'DEFAULT_MODULE' => 'Manager' ,
    'LOAD_EXT_CONFIG' => 'verify',    
	
);

return  array_merge($config,$db);