<?php
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use Cake\ORM\TableRegistry;

class DmiMmrCategoriesTable extends Table{
	
	var $name = "DmiMmrCategories";

	public function getMisgradingCategoriesList(){
		return $this->find('list', array('keyField'=>'id','valueField' => 'misgrade_category_name', 'conditions' => array('OR' => array('delete_status IS NULL', 'delete_status =' => 'no')), 'order' => array('id')))->toArray();
	}

	public function getMisgradingCategory($id){
		return $this->find('all')->where(['id' => $id,'OR' => [['delete_status IS NULL'], ['delete_status' => 'N']]])->first();
	}
	
}

?>