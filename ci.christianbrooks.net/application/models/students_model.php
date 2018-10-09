<?
class Students_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function File_upload($data)
	{
		$this->db->insert('users',$data);
		if($qry){
			echo "file upload";
		}
		else
			echo "not uploaded";
		
			
	}
	public function insert($first, $last, $email, $image)
	{
		//echo $first."<br>".$last."<br>".$email."<br>";
		$this->db->set("FIRST_NAME", $first);
		$this->db->set("LAST_NAME", $last);
		$this->db->set("EMAIL", $email);
		$this->db->set("IMAGE", $image);
		$this->db->insert("users");
		return $this->db->insert_id();
		//echo "insert command called";
	}
	public function getImage($id)
	{
		$this->db->select("IMAGE");
		$this->db->where("ID", $id);
		return $this->db->get("users")->result();
	}
	public function select($limit = 10)
	{
		$this->db->select("FIRST_NAME, LAST_NAME, EMAIL, IMAGE");
		return $this->db->get("users", $limit)->result();
	}
	public function selectByID($id)
	{
		
	}
	public function selectByLastName($last)
	{
		$this->db->select("FIRST_NAME, LAST_NAME, EMAIL, IMAGE");
		$this->db->like("LAST_NAME", $last);
		return $this->db->get("users")->result();
	}
}
?>