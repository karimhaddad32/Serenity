<?php

class Profile_style extends Model {
	public $profile_style_id;
	public $profile_id;
    public $background_image_id;
    public $font_color_id;
    public $font_style_id;

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll() {
        $stmt = self::$_connection->prepare("SELECT * FROM Profile_style");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile_style');
		return $stmt->fetchAll();
    }

    public function find() {
        $stmt = self::$_connection->prepare("SELECT * FROM Profile_style WHERE profile_style_id = :profile_style_id");
        $stmt->execute(['profile_style_id'=>$profile_style_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Profile_style');
        return $stmt->fetch();
    }

    public function insert() {
	    $stmt = self::$_connection->prepare("INSERT INTO Profile_style(profile_id, background_image_id,font_color_id , font_style_id) VALUES(:profile_id,:background_image_id,:font_color_id,:font_style_id)");
        $stmt->execute(['profile_id'=>$this->profile_id,
         'background_image_id'=>$this->background_image_id,'font_color_id'=>$this->font_color_id,'font_style_id'=>$this->font_style_id]);
    }

    public function delete() {
        $stmt = self::$_connection->prepare("DELETE FROM Profile_style WHERE profile_style_id = :profile_style_id AND profile_id = : profile_id");
        $stmt->execute(['profile_style_id'=>$this->profile_style_id, 'profile_id'=>$this->profile_id]);
    }

    public function update() {
        $stmt = self::$_connection->prepare("UPDATE Profile_style SET background_image_id = :background_image_id, font_color_id = :font_color_id,font_style_id = :font_style_id  WHERE profile_id = :profile_id AND profile_style_id = :profile_style_id ");
        $stmt->execute(['background_image_id'=>$this->background_image_id,
         'font_color_id'=>$this->font_color_id, 'font_style_id'=>$this->font_style_id,'profile_id'=>$this->profile_id,'profile_style_id'=>$this->profile_style_id]);
    }

}

?>