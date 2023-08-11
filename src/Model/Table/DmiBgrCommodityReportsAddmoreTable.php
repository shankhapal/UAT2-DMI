<?php 
	namespace app\Model\Table;
	use Cake\ORM\Table;
	use App\Model\Model;
	use Cake\ORM\TableRegistry;
	use App\Controller\AppController;
	use App\Controller\CustomersController;
	
	class DmiBgrCommodityReportsAddmoreTable extends Table{
	
	var $name = "DmiBgrCommodityReportsAddmore";
	
	public function saveCommodityWiseReport($forms_data){
		
		
		$customer_id = $_SESSION['packer_id'];

		$commodity = $forms_data['commodity'];
    $lotNo = $forms_data['lotno'];
    $dateSampling = $forms_data['datesampling'];
    $dateofPacking = $forms_data['dateofpacking'];
    $gradeAsign = $forms_data['grade'];
    $packetSize = $forms_data['packetsize'];
    $totalNoOfPackets = $forms_data['totalnoofpackets'];
    $totalQtyQuintal = $forms_data['totalqtyquintal'];
    $estimatedValue = $forms_data['estimatedvalue'];
    $agmarkReplicaFrom = $forms_data['agmarkreplicafrom'];
    $agmarkReplicaTo = $forms_data['agmarkreplicato'];
    $agmarkReplicaTotal = $forms_data['agmarkreplicatotal'];
    $replicaCharges = $forms_data['replicacharges'];
    $laboratoryName = $forms_data['laboratoryname'];
    $reportNo = $forms_data['reportno'];
    $reportDate = $forms_data['reportdate'];
    $remarks = $forms_data['remarks'];

		if(!empty($forms_data['record_id'])){

			$newEntity = $this->newEntity(array(
				'id'=>$forms_data['record_id'],
				'customer_id'=>$customer_id,
				'commodity' =>$commodity,
				'lotno' => $lotNo,
				'datesampling' => $dateSampling,
				'dateofpacking' => $dateofPacking,
				'gradeasign' => $gradeAsign,
				'packetsize' => $packetSize,
				'totalnoofpackets' => $totalNoOfPackets,
				'totalqtyquintal' => $totalQtyQuintal,
				'estimatedvalue' => $estimatedValue,
				'agmarkreplicafrom' => $agmarkReplicaFrom,
				'agmarkreplicato' => $agmarkReplicaTo,
				'agmarkreplicatotal' => $agmarkReplicaTotal,
				'replicacharges' => $replicaCharges,
				'laboratoryname' => $laboratoryName,
				'reportno' => $reportNo,
				'reportdate' => $reportDate,
				'remarks' => $remarks,
				'created'=>date('Y-m-d H:i:s'),
				'modified'=>date('Y-m-d H:i:s')
			));
		}else{
			$newEntity = $this->newEntity(array(
								
				'customer_id'=>$customer_id,
				'commodity' =>$commodity,
				'lotno' => $lotNo,
				'datesampling' => $dateSampling,
				'dateofpacking' => $dateofPacking,
				'gradeasign' => $gradeAsign,
				'packetsize' => $packetSize,
				'totalnoofpackets' => $totalNoOfPackets,
				'totalqtyquintal' => $totalQtyQuintal,
				'estimatedvalue' => $estimatedValue,
				'agmarkreplicafrom' => $agmarkReplicaFrom,
				'agmarkreplicato' => $agmarkReplicaTo,
				'agmarkreplicatotal' => $agmarkReplicaTotal,
				'replicacharges' => $replicaCharges,
				'laboratoryname' => $laboratoryName,
				'reportno' => $reportNo,
				'reportdate' => $reportDate,
				'remarks' => $remarks,
				'created'=>date('Y-m-d H:i:s'),
				'modified'=>date('Y-m-d H:i:s')
			));
		}
		
								
			if($this->save($newEntity)){
				return true;
			}
	}
	
	


	public function getBgrData($id){
		
		$query = $this->find()
		->where(['id'=>$id,'delete_status IS NULL']);
		return $editData = $query->first();

	}

	public function deleteBgrData($id){
		
		$newEntity = $this->newEntity(array(
				'id'=>$id,
				'delete_status'=>'yes',
				'modified'=>date('Y-m-d H:i:s')
			));

			if($this->save($newEntity)){
				return true;
			}
	}
		
}
