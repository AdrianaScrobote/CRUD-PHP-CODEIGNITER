<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of Home
 *
 * @author Scrobote
 */
class Pessoa extends CI_Controller{
    
    public $js = array('includes/bootstrap/js/jquery-3-3-1.js', 'includes/bootstrap/js/bootstrap.min.js', 'includes/bootstrap/js/bootbox.js');

    public function __construct(){
        parent::__construct();
        $this->load->model('PessoaModel', 'pessoa');
        $this->load->library('pessoalib');
    }


    /* INICIO TELA BUSCAR PESSOAS */

    //carrega tela de buscar pessoas
    function index(){
        array_push($this->js, 'includes/js/Pessoa.js');

        $this->load->view('buscarPessoa');
        
    }  


    //busca pessoas
    //se nenhuma pessoa for filtrada, trará as 50 primeiras pessoas que encontrar
    function buscarPessoas(){
        
        extract($this->input->post());

        //remove caracteres especiais
        $busca = str_replace(array('"', '%', '\'', ';', ',', '<', '>'), '', $busca);
        $result = $this->pessoa->buscarPessoa($busca);
        
        $result = $this->pessoalib->montarPessoas($result);

        print(json_encode($result));
    }   
    
    
    //exclui uma pessoa
    function excluir(){
        
        extract($this->input->post());
        $result = $this->pessoa->excluirPessoa($id);
        print(json_encode($result));
    }   
    /* FIM TELA BUSCAR PESSOAS */



    /* INICIO TELA SALVAR/EDITAR PESSOA */

    //carrega tela de cadastro de uma pessoa
    function cad_pessoa($pessoaid = null){
        array_push($this->js, 'includes/js/Pessoa.js');

        $dados = null;
        if($pessoaid){
            $dados = $this->getPessoa($pessoaid);
            $dados = $dados[0];
        }

        $this->load->view('Pessoa', $dados);
    }
    

    //busca dados de uma pessoa
    function getPessoa($pessoaid = null){        
        $result = $this->PessoaModel->buscarPessoa($pessoaid);
        return $result;
    }


    //salva uma pessoa
    function gravarPessoa(){
        $dados = $this->input->post();

        // objeto para retorno
        $obj = new stdClass();
        $msg = '<br><div class="alert alert-%s" role="alert"><i class="fa fa-%s-circle"></i> %s</div>';

        $result = $this->pessoa->gravarPessoa($dados);

        if($result){
            $obj->id = $result;
            $obj->msg = sprintf($msg, 'success', 'check', 'Dados salvos com sucesso!');
        }
        else{
            $obj->id = false;
            $obj->msg = sprintf($msg, 'danger', 'check', 'Ocorreu um erro ao salvar os dados!');
        }

        print(json_encode($obj));     
    }
    /* FIM TELA SALVAR/EDITAR PESSOA */



    
}
