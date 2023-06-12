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

				$CustomersController = new CustomersController;
				$current_version = $CustomersController->Customfunctions->currentVersion($customer_id);
				
				
				if(isset($_SESSION['edit_sample_id'])){ 
					
					$hide_edit_id = array('id !='=>$_SESSION['edit_sample_id']);
					$edit_id = $_SESSION['edit_sample_id'];
				}else{
					$hide_edit_id = array('id IS NOT NULL');
					$edit_id = '';
				}

				//get commodity list added on 09/06/2023 by shankhpal
				$DmiFirms = TableRegistry::getTableLocator()->get('DmiFirms');
				$firm_details = $DmiFirms->firmDetails($customer_id);
				$MCommodity = TableRegistry::getTableLocator()->get('MCommodity');
				$MCommodityCategory = TableRegistry::getTableLocator()->get('MCommodityCategory');
		

				$sub_commodity_array = explode(',',(string) $firm_details['sub_commodity']); #For Deprecations
		
				if (!empty($firm_details['sub_commodity'])) {
					
					$i=0;
					foreach ($sub_commodity_array as $sub_commodity_id)
					{
						$fetch_commodity_id = $MCommodity->find('all',array('conditions'=>array('commodity_code IS'=>$sub_commodity_id)))->first();
						$commodity_id[$i] = $fetch_commodity_id['category_code'];
						$sub_commodity_data[$i] =  $fetch_commodity_id;
						$i=$i+1;
					}

					$unique_commodity_id = array_unique($commodity_id);

					$commodity_name_list = $MCommodityCategory->find('all',array('conditions'=>array('category_code IN'=>$unique_commodity_id, 'display'=>'Y')))->toArray();
					
				}

				$added_sample_details = $this->find('all', array('conditions'=>array('OR'=>$hide_edit_id, 'customer_id IS'=>$customer_id,'delete_status IS NULL','version'=>$current_version),'order'=>'id'))->toArray();
				
				$find_sample_details = $this->find('all',array('conditions'=>array('id IS'=>$edit_id,'version'=>$current_version)))->first();				
				return array($find_sample_details,$added_sample_details,$sub_commodity_array);

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

		public function saveSampleDetails($commodity_name,$pack_size,$lot_no,$date_of_packing,$best_before,$replica_si_no,$current_version){
								
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
									'version'=>$current_version,
									'created'=>date('Y-m-d H:i:s'),
									'modified'=>date('Y-m-d H:i:s')
								
								)); 
								
								if($this->save($newEntity)){
									
									return true;
									
								}
								
								
							}


	}

?>
