<?php
namespace app\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class DmiMmrRoMoCommentsTable extends Table {

	public function saveCommentDetails($customer_id,$sample_code,$comment_by,$comment_to,$htmlencoded_comment,$available_to) {
		
		$dataArray = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'sample_code'=>$sample_code,
			'comment_by'=>$comment_by,
			'comment_to'=>$comment_to,
			'comment_date'=>date('Y-m-d H:i:s'),
			'comment'=>$htmlencoded_comment,
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'available_to'=>$available_to
		));

		if($this->save($dataArray)){
			return true;
		}
	}

}

?>