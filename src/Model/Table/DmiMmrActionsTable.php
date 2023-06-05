<?php
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use Cake\ORM\TableRegistry;

class DmiMmrActionsTable extends Table{
	
	var $name = "DmiMmrActions";
	
	public function getMisgradingActionList(){
		return $this->find('list', array('keyField'=>'id','valueField' => 'misgrade_action_name', 'conditions' => array('OR' => array('delete_status IS NULL', 'delete_status =' => 'no')), 'order' => array('id')))->toArray();
	}

	public function getMisgradingAction($id){
		return $this->find('all')->where(['id' => $id,'OR' => [['delete_status IS NULL'], ['delete_status' => 'N']]])->first();
	}
}

?>