<?php

	namespace app\Model\Table;
	use Cake\ORM\Table;
	use App\Model\Model;
	use App\Controller\AppController;
	use App\Controller\CustomersController;
	use Cake\ORM\TableRegistry;

	class DmiCheckSamplesTable extends Table{

		var $name = "DmiCheckSamples";
			   
		public function RoutineInspectionSampleDetails(){

			
				if(strpos(base64_decode($_SESSION['username']), '@') !== false){//for email encoding
					$customer_id = $_SESSION['customer_id'];
				}else{
					$customer_id = $_SESSION['username'];
				}
				
				if(isset($_SESSION['edit_sample_id'])){ 
					
					$hide_edit_id = array('id !='=>$_SESSION['edit_sample_id']);
					$edit_id = $_SESSION['edit_sample_id'];
				}else{
					$hide_edit_id = array('id IS NOT NULL');
					$edit_id = '';
				}

				$added_sample_details = $this->find('all', array('conditions'=>array('OR'=>$hide_edit_id, 'customer_id IS'=>$customer_id,'delete_status IS NULL'),'order'=>'id'))->toArray();
				
				$find_sample_details = $this->find('all',array('conditions'=>array('id IS'=>$edit_id)))->first();
			
				return array($find_sample_details,$added_sample_details);

		}

		
		public function editSampleDetails($record_id,$commodity_name,$pack_size,$lot_no,$date_of_packing,$best_before,$replica_si_no){
			
			$newEntity = $this->newEntity(array(
				'id'=>$record_id,
				'commodity_name'=>$commodity_name,
				'pack_size'=>$pack_size,
				'lot_no'=>$lot_no,
				'best_before'=>$best_before,
				'date_of_packing'=>$date_of_packing,
				'replica_si_no'=>$replica_si_no,
				'modified'=>date('Y-m-d H:i:s')
			
			)); 
			
			if($this->save($newEntity)){				
				return true;				
			}			
		}

		public function deleteSampleDetails($record_id){
			
			$newEntity = $this->newEntity(array(
				'id'=>$record_id,
				'delete_status'=>'yes',
				'modified'=>date('Y-m-d H:i:s')
			
			));
			
			if($this->save($newEntity)){
				
				return true;
				
			}
			
			
		}

		public function saveSampleDetails($commodity_name,$pack_size,$lot_no,$date_of_packing,$best_before,$replica_si_no){
								
								if(strpos(base64_decode($_SESSION['username']), '@') !== false){//for email encoding
									$customer_id = $_SESSION['customer_id'];
								}else{
									$customer_id = $_SESSION['username'];
								}
																	
								$customer_once_no = $_SESSION['once_card_no'];
								
								$newEntity = $this->newEntity(array(
								
									'customer_id'=>$customer_id,
									'commodity_name'=>$commodity_name,
									'pack_size'=>$pack_size,
									'lot_no'=>$lot_no,
									'best_before'=>$best_before,
									'date_of_packing'=>$date_of_packing,
									'replica_si_no'=>$replica_si_no,
									'created'=>date('Y-m-d H:i:s'),
									'modified'=>date('Y-m-d H:i:s')
								
								)); 
								
								if($this->save($newEntity)){
									
									return true;
									
								}
								
								
							}


	}

?>
