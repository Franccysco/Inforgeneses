<?php
class Usuario_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'usuarios';
    }

    /**
     * Atualiza senha do usuario
     *
     * @param integer $idUsuario ID do registro a ser atualizado
     *
     * @param string $novaSenha senha a ser atualizada
     * 
     * @param string $senhaAntiga senha a ser verificada antes de atualizar para nova
     *
     * @return boolean
     */

    public function atualizaSenha($idUsuario, $novaSenha, $senhaAntiga)
    {
        if (is_null($idUsuario) || !isset($novaSenha) || !isset($senhaAntiga)) {return false;}

        $usuario = $this->getById($idUsuario);

        if ($usuario['senha'] == $senhaAntiga) {
            $usuario['senha'] = $novaSenha;
            $this->atualizar($idUsuario, $usuario);
            return true;
        } else {
            return false;
        }

    }


    /**
     * Atualiza senha do usuario
     *
     * @param string $matricula matricula do usuario a ser verificada
     * 
     * @param string $senha senha a ser verificada
     *
     * @return boolean
     */

    public function login($matricula, $senha)
    {
        if (!isset($matricula) || !isset($senha)) {return false;}

        $this->db->where('matricula',$matricula);
        $this->db->where('senha', $senha);
        $this->db->where('status', 1);
        $usuario = $this->db->get($this->table)->result();

        if (count($usuario) == 1) {
            $data['usuarioLogado'] = $usuario[0];
            
            return $data;
        } else {
            return null;
        }

    }



}
