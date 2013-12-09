<?php

$ticketinfo = $_GET['tickets'];

$reservation = new Reservation($ticketinfo);

echo json_encode($reservation);

class Reservation {
	
	const PRICEADULT = 50;
	const PRICECHILD = 20;
	const PRICEELDER = 30;
	
	public $nadult = 0;
	public $nchild = 0;
	public $nelder = 0;
	public $totalprice = 0;
	
	public function __construct($reservationdata) {
		foreach($reservationdata as $individual) {
			if ($individual["age"] > 65) {
				$this->nelder += 1;
			} else if ( $individual["age"] > 18) {
				$this->nadult += 1;
			} else {
				$this->nchild += 1;
			}
		}
		$this->totalprice = 
			$this->nadult * Reservation::PRICEADULT +
			$this->nchild * Reservation::PRICECHILD +
			$this->nelder * Reservation::PRICEELDER;
	}
}

?>