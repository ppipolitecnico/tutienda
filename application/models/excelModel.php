  <?php
if (!defined ('BASEPATH')) exit ('No direct access allowed');
    class excelModel extends CI_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function add_data($servicios)
    {
        $this->load->database();

        $this->db->insert('tblservicios',$servicios);
        return $this->db->insert_id();

    }
}

?>