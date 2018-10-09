<?
class Students_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function insert($first, $last, $email)
	{
		//echo $first."<br>".$last."<br>".$email."<br>".$birthday."<br>";
		$this->db->set("FIRST_NAME", $first);
		$this->db->set("LAST_NAME", $last);
		$this->db->set("EMAIL", $email);
		$this->db->insert("Students");
		return $this->db->insert_id();
		//echo "insert command called";
	}
	public function select($limit = 10)
	{
		$this->db->select("FIRST_NAME, LAST_NAME, EMAIL");
		return $this->db->get("Students", $limit)->result();
	}
	public function selectByID($id)
	{
		$this->db->select("FIRST_NAME, LAST_NAME, EMAIL");
		$this->db->where("ID", $id);
		return $this->db->get("Students")->result();
	}
	public function selectByLastName($last)
	{
		$this->db->select("FIRST_NAME, LAST_NAME, EMAIL");
		$this->db->like("LAST_NAME", $last);
		return $this->db->get("Students")->result();
	}
}
?>