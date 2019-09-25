<?php
class Venda_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'vendas';
    }

    public function getVendas()
    {
        $this->db->select('vendas.id,data, quantidade, valor_total, produtos.descricao, clientes.nome');
        $this->db->from('vendas');
        $this->db->join('produtos', 'vendas.produtos_id = produtos.id');
        $this->db->join('clientes', 'vendas.clientes_id = clientes.id');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }

    }

}
