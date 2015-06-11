<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
class table_bg_setting extends discuz_table {
	public function __construct() {
		$this->_table = 'bg_setting';
		$this->_pk = '';

		parent::__construct();
	}
	public function insert($fid,$color,$imgurl,$XR,$YR,$XC,$posts,$fixed){
		return DB::insert($this->_table,array('fid'=>$fid,'color'=>$color,'imgurl'=>$imgurl,'xrepeat'=>$XR,'yrepeat'=>$YR,'xcenter'=>$XC,'posts'=>$posts,'fixed'=>$fixed));
		}
	public function fetch_by_value($fid){
		return DB::fetch_first("SELECT * FROM %t WHERE fid = %s", array($this->_table,$fid));
		}
	public function update_by_value($id,$fid,$color,$imgurl,$XR,$YR,$XC,$posts,$fixed){
		return DB::query("UPDATE %t SET imgurl = '$imgurl',color= '$color',fid = '$fid',xrepeat = '$XR',yrepeat = '$YR',xcenter = '$XC',posts = '$posts',fixed = '$fixed' WHERE id = %s", array($this->_table,$id));
		}
	public function fetch_by_all(){
		return DB::fetch_all("SELECT * FROM %t", array($this->_table));
		}
	public function delete_by_id($id){
		return DB::delete($this->_table,"id = '$id'");
		}
	}

?>