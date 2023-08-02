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
    $lotNo = $forms_data['lot_no_tf_no_m_no'];
    $dateSampling = $forms_data['date_of_sampling'];
    $dateofPacking = $forms_data['date_of_packing'];
    $gradeAsign = $forms_data['grade'];
    $packetSize = $forms_data['packet_size'];
    $packetSizeUnit = $forms_data['packet_size_unit'];
    $totalNoOfPackets = $forms_data['total_no_of_packets'];
    $totalQtyQuintal = $forms_data['total_qty_graded_quintal'];
    $estimatedValue = $forms_data['estimated_value'];
    $agmarkReplicaFrom = $forms_data['agmark_replica_from'];
    $agmarkReplicaTo = $forms_data['agmark_replica_to'];
    $agmarkReplicaTotal = $forms_data['agmark_replica_total'];
    $replicaCharges = $forms_data['replica_charges'];
    $laboratoryName = $forms_data['laboratory_name'];
    $reportNo = $forms_data['report_no'];
    $reportDate = $forms_data['report_date'];
    $remarks = $forms_data['remarks'];

		$newEntity = $this->newEntity(array(
								
				'customer_id'=>$customer_id,
				'commodity' =>$commodity,
				'lotno' => $lotNo,
				'datesampling' => $dateSampling,
				'dateofpacking' => $dateofPacking,
				'gradeasign' => $gradeAsign,
				'packetsize' => $packetSize,
				'packetsizeunit' => $packetSizeUnit,
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
								
			if($this->save($newEntity)){
				return true;
			}
	}
	
		
}
