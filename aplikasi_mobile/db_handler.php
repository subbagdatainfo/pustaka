<?php

/**
 * Class to handle all db operations
 * This class will have CRUD methods for database tables
 *
 * @author Heri Dwi Prasetia
 */
class DbHandler {

    private $conn;

    function __construct() {
        require_once dirname(__FILE__) . '/db_connect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

	/**
     * Fetching location data
     * @return array location
     */
	public function data() {
		$stmt = $this->conn->prepare("SELECT id, buku_icon, nama_buku, nama_file , date_created, foto_sampul, description, ketersediaan, nama_penulis, nama_penerbit FROM pustaka");
		if ($stmt->execute()) {
			$stmt->bind_result($id, $buku_icon, $nama_buku, $nama_file, $date_created, $foto_sampul, $description, $ketersediaan, $nama_penulis, $nama_penerbit);
			$pustaka['buku'] = array();
			while($stmt->fetch()){
				$location = array();
				$location["id"] = $id;
				$location["buku_icon"] = $buku_icon;
				$location["nama_buku"] = $nama_buku;
				$location["nama_file"] = $nama_file;
				$location["date_created"] = $date_created;
				$location["foto_sampul"] = $foto_sampul;
				$location["description"] = $description;
				$location["ketersediaan"] = $ketersediaan;
				$location["nama_penulis"] = $nama_penulis;
				$location["nama_penerbit"] = $nama_penerbit;
				array_push($pustaka['buku'],$location);
			}
			$stmt->close();
			return $pustaka;
		} else {
			return NULL;
		}
	}

	/**
     * Fetching detail location
     * @param $id location
     * @return array location
     */
	public function search($id) {
		$stmt = $this->conn->prepare("SELECT * FROM pustaka WHERE nama_buku LIKE "."'%".$cari."%'");
		$stmt->bind_param("i", $id);
		
		if ($stmt->execute()) {
			$stmt->bind_result($id, $date_created, $date_edited, $latitude, $longitude, $nama, $keterangan, $foto);
			$lokasi['tempat'] = array();
			while($stmt->fetch()){
				$location = array();
				$location["id"] = $id;
				$location["date_created"] = $date_created;
				$location["date_edited"] = $date_edited;
				$location["latitude"] = $latitude;
				$location["longitude"] = $longitude;
				$location["nama"] = $nama;
				$location["keterangan"] = $keterangan;
				$location["foto"] = $foto;
				array_push($lokasi['tempat'],$location);
			}
			$stmt->close();
			return $lokasi;
		} else {
			return NULL;
		}
	}

	/**
     * Fetching foto location
     * @param $id location
     * @return array location
     */
	public function getFotoLocation($id) {
		$stmt = $this->conn->prepare("SELECT foto FROM lokasi WHERE id = ?");
		$stmt->bind_param("i", $id);
		
		if ($stmt->execute()) {
			$stmt->bind_result($foto);
			while($stmt->fetch()){
				$data = $foto;
			}
			$stmt->close();
			return $data;
		} else {
			return NULL;
		}
	}
}
?>
