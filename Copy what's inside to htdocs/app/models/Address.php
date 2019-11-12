<?php
class Address extends Model{
    public $address_id;
    public $profile_id;
    public $description;
    public $street_address;
    public $city;
    public $province;
    public $postal_code;
    public $country_id;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Address WHERE profile_id = :profile_id");
        $stmt->execute(['profile_id' => $this->profile_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');
		return $stmt->fetchAll();
    }

    public function find($address_id) {
        $stmt = self::$_connection->prepare("SELECT * FROM Address WHERE address_id = :address_id");
        $stmt->execute(['address_id' => $address_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');
        return $stmt->fetch();
    }

    public function create() {
	    $stmt = self::$_connection->prepare("INSERT INTO Address(profile_id, description, street_address, city, province, postal_code, country_id)
                                                  VALUES (:profile_id, :description, :street_address, :city, :province, :postal_code, :country_id)");
        $stmt->execute(
            ['profile_id' => $this->profile_id,
             'description' => $this->description,
             'street_address' => $this->street_address,
             'city' => $this->city,
             'province' => $this->province,
             'postal_code' => $this->postal_code,
             'country_id' => $this->country_id]);
    }

    public function edit() {
        $stmt = self::$_connection->prepare("UPDATE Address

                                                SET description    = :description,
                                                    street_address = :street_address,
                                                    city           = :city,
                                                    province       = :province,
                                                    postal_code    = :postal_code,
                                                    country_id     = :country_id

                                              WHERE profile_id     = :profile_id;");
        $stmt->execute(
            ['description' => $this->description,
             'street_address' => $this->street_address,
             'city' => $this->city,
             'province' => $this->province,
             'postal_code' => $this->postal_code,
             'country_id' => $this->country_id,
             'profile_id' => $this->profile_id]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Address WHERE address_id = :address_id");
        $stmt->execute(['address_id'=>$address_id]);
    }
}
?>