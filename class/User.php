<?php
class User {
	private $iduser;
	private $deslogin;
	private $despassword;
	private $dtregistration;

	public function getIdUser() {
		return $this->iduser;
	}
	public function setIdUser($value) {
		$this->iduser = $value;
	}

	public function getDesLogin() {
		return $this->deslogin;
	}
	public function setDesLogin($value) {
		$this->deslogin = $value;
	}

	public function getDesPassword() {
		return $this->despassword;
	}
	public function setDesPassword($value) {
		$this->despassword = $value;
	}

	public function getDtRegistration() {
		return $this->dtregistration;
	}
	public function setDtRegistration($value) {
		$this->dtregistration = $value;
	}

	public function loadById($id) {
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_users WHERE iduser = :ID", array(
			":ID" => $id,
		));
		if (count($results) > 0) {
			$row = $results[0];
			$this->setIdUser($row['iduser']);
			$this->setDesLogin($row['deslogin']);
			$this->setDesPassword($row['despassword']);
			$this->setDtRegistration(new DateTime($row['dtregistration']));
		}
	}

	public static function getList() {
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_users ORDER BY deslogin;");
	}

	public static function search($login) {
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_users WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(':SEARCH' => "%" . $login . "%",
		));
	}

	public function login($login, $password) {
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN AND despassword = :PASSWORD", array(":LOGIN" => $login, ":PASSWORD" => $password,
		));
		if (count($results) > 0) {
			$row = $results[0];
			$this->setIdUser($row['iduser']);
			$this->setDesLogin($row['deslogin']);
			$this->setDesPassword($row['despassword']);
			$this->setDtRegistration(new DateTime($row['dtregistration']));
		} else {
			throw new Exception("Login and/or Password incorrect");

		}
	}

	public function __toString() {
		return json_encode(array(
			"iduser" => $this->getIdUser(),
			"deslogin" => $this->getDesLogin(),
			"despassword" => $this->getDesPassword(),
			"dtregistration" => $this->getDtRegistration()->format("d/m/Y H:i:s"),
		));
	}
}
