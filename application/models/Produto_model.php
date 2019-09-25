<?php
class Produto_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'produtos';
    }

    public function getprecoVista($id_produto)
    {
        if (is_null($id_produto)) {return false;}

        $this->db->select('preco_vista');
        $this->db->where('id', $id_produto);

        $query = $this->db->get($this->table);


        if ($query->num_rows() > 0) {
            $array = $query->row_array();
            return $preco_vista = $array['preco_vista'];
        } else {
            return null;
        }

    }

      public function getprecoPrazo($id_produto)
    {
        if (is_null($id_produto)) {return false;}

        $this->db->select('preco_prazo');
        $this->db->where('id', $id_produto);

        $query = $this->db->get($this->table);


        if ($query->num_rows() > 0) {
            $array = $query->row_array();
            return $preco_prazo = $array['preco_prazo'];
        } else {
            return null;
        }

    }

}
