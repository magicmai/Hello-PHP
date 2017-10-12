<?php 

class newsModel {

	public $_table = 'news';

	function count() {
		$sql = 'SELECT count(*) FROM ' . $this->_table;
		return DB::findResult($sql, 0, 0);
	}

	public function getnewsinfo ($id) {
		if (empty($id)) {
			return array();
		} else {
			$id = intval($id);  // 防止注入
			$sql = 'SELECT * FROM ' . $this->_table . ' WHERE id = ' . $id;
			return DB::findOne($sql);
		}
	}

	function newssubmit ($data) {
		extract($data);
		if (empty($title) || empty($content)) {
			return 0;  // 请填写标题内容
		} 
		$title = addslashes($title);
		$content = addslashes($content);
		$author = addslashes($author);
		$source = addslashes($source);
		$data = array(
			'title'=>$title,
			'content'=>$content,
			'author'=>$author,
			'source'=>$source,
			'dateline'=>time()
		);
		if ($_POST['id'] != '') {
			DB::update($this->_table, $data, 'id='.$id);
			return 2;  // 修改成功
		} else {
			DB::insert($this->_table, $data);
			return 1;  // 添加成功
		}
	}

	function findAll_orderby_dateline () {
		$sql = 'SELECT * FROM ' . $this->_table . ' ORDER BY dateline DESC';  // 倒序排列
		return DB::findAll($sql);
	}

	function del_by_id ($id) {
		return DB::del($this->_table, 'id='.$id);
	}

	function get_news_list () {
		$data = $this->findAll_orderby_dateline();  // findAll_orderby_dateline 这个方法后台管理列表也用了
		foreach($data as $k=>$news) {
			$data[$k]['content'] = mb_substr(strip_tags($data[$k]['content']), 0, 200);
			$data[$k]['dateline'] = date('Y-m-d H:i:s', $data[$k]['dateline']);
		}
		return $data;
	}

	function get_news($id) {
		$data = $this->findOne_by_id($id);
		$data['dateline'] = date('Y-m-d H:i:s', $data['dateline']);
	}

}



 ?>