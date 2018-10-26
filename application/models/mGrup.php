<?php defined('BASEPATH') Or Exit('No direct script access allowed');

class mGrup extends CI_Model{

	var $table = 'kategori';
	var $column_order = array('kategori',null); 
	var $column_search = array('kategori'); 
	var $order = array('id' => 'desc');

	public function __construct(){
		parent:: __construct();

		$this->load->helper('cookie');
		$this->load->helper('date');
		$this->load->database();
	}

	/**
	* Modifikasi kode disini ya 
	*/
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	} 

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
	
    //fungsi simpan
    public function screate()
    {
        $json = array();
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        
        if($this->form_validation->run()){
            $this->kategori = $this->input->post('kategori');
            $res = $this->db->insert('kategori', $this);

            if ($res){
                $insert_id = $this->db->insert_id();
                $json = array(
                        'type' => 'success',
						'message' =$this->db->get_where('kategori',['id' => $insert_id])->row_array()
				);
            }else{
				$json = array(
					'type' => 'error',
					'message' => 'sory. data cant be save'
				);
			}
        }else{
			$json = array(
					'type' =>'error',
					'message' => validation_errors()
			);
		}
		header('Content-Type: application/json');
		echo json_encode($json);
    }
	
	public function supdate()
	{
		$json = array();
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		if($this->form_validation->run()){
			$id	= $this->input->post('id');
			$data['kategori']	=$this->input->post('kategori')
			$update_id =$this->db->update('kategori', $data,array('id'=>$id));
			if ($update_id){
                $json = array(
                        'type' => 'success',
						'message' =$this->db->get_where('kategori',['id' => $insert_id])->row_array()
				);
            }else{
				$json = array(
					'type' => 'error',
					'message' => 'sory. data cant be save'
				);
			}
		}else{
			$json = array(
				'type' =>'error',
				'message' => validation_errors()
			);
		}
		header('Content-Type: application/json');
		echo json_encode($json);
	}

	public function sdelete()
	{
		$json = array();
		$id = $this->input->post('id');

		if ($id = 0){
			$res = $this->db->delete('kategori',['id' => $id]);
			if($res != FALSE){
				$json = array(
					'type' => 'sukses',
					'message' => 'Data berhasil di hapus'
				);
			}else{
				$json = array(
					'type' => 'sukses',
					'message' => 'Data tidak berhasil di hapus'
				);
			}
		}else {
			$json = array(
				'type' => 'sukses',
				'message' => 'Data tidak berhasil di hapus'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($json);
	}
}