<?php
namespace app\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\TableRegistry;

class DmiMmrRoMoCommentsTable extends Table {

	public function saveCommentDetails($sample_code,$customer_id,$username,$comment_to_email_id,$htmlencoded_comment,$from_user) {
		
		$dataArray = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'sample_code'=>$sample_code,
			'comment_by'=>$username,
			'comment_to'=>$comment_to_email_id,
			'comment_date'=>date('Y-m-d H:i:s'),
			'comment'=>$htmlencoded_comment,
			'created'=>date('Y-m-d H:i:s'),
			'modified'=>date('Y-m-d H:i:s'),
			'available_to'=>$from_user
		));

		if($this->save($dataArray)){
			return true;
		}
	}

}

?>