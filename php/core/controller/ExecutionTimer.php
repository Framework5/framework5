<?php

/*
* 
* @author tmatthews (tmatthewsdev@gmail.com)
*/

class ExecutionTimer {
	
	private $startTime;
	private $endTime;
	private $logTime = false;
	
	public function __construct() {
		
		
	}
	
	public function __destruct() {
		if ($this->logTime) $this->logExecTime();
	}
	
	
	
	public function claculateExecTime($log = false) {
		if (!isset($this->execStartTime)) {
			$this->execStartTime = microtime(true);
		}else{
			throw new Exception("The script execution timer has already been started");
		}
		
		if ($log) $this->logExecTime = true;
		
		return true;
	}
	
	
	
	public function getExecTime() {
		if (isset($this->execStartTime)) {
			$this->execEndTime = microtime(true);
			$total = $this->execEndTime - $this->execStartTime;
			return $total;
		}
		else {
			throw new Exception("The script execution timer was not started");
		}
	}
	


	private function logExecTime() {
		$total = $this->getExecTime();
		echo "logExecTime: $total";
		
	}
}

?>