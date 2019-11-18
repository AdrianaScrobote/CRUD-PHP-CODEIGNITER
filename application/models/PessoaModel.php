<?php

class PessoaModel extends CI_Model{

    function __construct(){
        parent::__construct();
        $CI =& get_instance(); 
        $this->db = $CI->load->database('cad', TRUE);
    }


    function buscarPessoa($busca){

        $where = ' nome like "%' . $busca . '%"';
        if(is_numeric($busca)){
            $where .= ' or pessoaid = ' .$busca; 
        }

        $sql = 'select 
                    pessoaid,
                    nome,
                    sexo,
                    cidade,
                    email,
                    senha
                from pessoa where' . $where . ' limit 50';

        $query = $this->db->query($sql);
        return $query->result();
    }
    

    function gravarPessoa($dados = null){

        $dados['dtcad'] = date("Y-m-d H:i:s");   

        //edição
        if($dados['pessoaid']){
            $pessoaid = $dados['pessoaid'];
            unset($dados['pessoaid']);
            
            $this->db->where('pessoaid', $pessoaid);
            $this->db->update('pessoa', $dados);
            if($this->db->affected_rows() > 0){
                return $pessoaid;
            }
            else{
                return false;
            }
        }
        //insert
        else{
            $this->db->insert('pessoa', $dados);
            return $this->db->insert_id();
        }        
    }

    
    function excluirPessoa($pessoaid = null){
        if($pessoaid){
            return $this->db->delete('pessoa', array('pessoaid' => $pessoaid));
        }
        else{
            return false;
        }
    }

}