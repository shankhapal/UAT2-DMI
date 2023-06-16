<?php
	
namespace app\Model\Table;
use Cake\ORM\Table;
use App\Model\Model;
use App\Controller\AppController;
use App\Controller\CustomersController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;

class DmiMmrSuspendedFirmsLogsTable extends Table{

	var $name = "DmiMmrSuspendedFirmsLogs";

	public function saveLog($customer_id,$newpath,$pdfversion) {
		
		$dataArray = $this->newEntity(array(

			'customer_id'=>$customer_id,
			'created'=>date('Y-m-d H:i:s'),
			'user_email_id'=>$_SESSION['username'],
			'pdf_file'=>$newpath,
			'date'=>date('Y-m-d H:i:s'),
			'pdf_version'=>$pdfversion,
			'sample_code'=>$_SESSION['sample_code']
		));

		if($this->save($dataArray)){

			$DmiMmrSuspensions = TableRegistry::getTableLocator()->get('DmiMmrSuspensions');
			if($DmiMmrSuspensions->saveSuspesion($customer_id,$newpath)){
				return true;
			}
		}
	}
}

?>