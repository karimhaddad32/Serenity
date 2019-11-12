<?php
class AddressController extends Controller {

	public function index() {
	
		$theAddress = $this->model('Address');
		$theAddress->profile_id = 1;//$_SESSION['user_id'];
		$theAddresses = $theAddress->getAll();

		$this->view('Address/index', $theAddresses);
	}

	public function create() {

		if(!isset($_POST['action'])) {

			$this->view('Address/create');

		} else {

			$address = $this->model('Address');
			$address->profile_id = 1;//$_SESSION['user_id'];
        	$address->description = $_POST['description'];
        	$address->street_address = $_POST['street_address'];
        	$address->city = $_POST['city'];
        	$address->province = $_POST['province'];
        	$address->postal_code = $_POST['postal_code'];
        	$address->country_id = 1;//$_POST['country_id'];

			$address->create();

			header('location:/Address/index');
		}
	}

	public function edit($address_id) {

		$theAddress = $this->model('Address')->find($address_id);

		if(!isset($_POST['action'])) {

			$this->view('Address/edit', $theAddress);

		} else {

			$theAddress->profile_id = $_SESSION['user_id'];
        	$theAddress->description = $_POST['description'];
        	$theAddress->street_address = $_POST['street_address'];
        	$theAddress->city = $_POST['city'];
        	$theAddress->province = $_POST['province'];
        	$theAddress->postal_code = $_POST['postal_code'];
        	$theAddress->country_id = $_POST['country_id'];

			$thePerson->update();

			header('location:/Address/index');
		}
	}




	public function delete($address_id) {

		$theAddress = $this->model('Address')->find($address_id);

		if(!isset($_POST['action'])){

			$this->view('address/delete', $address_id);

		} else {

			$theAddress->delete();

			header('location:/address/index');
		}

	}
}
?>
