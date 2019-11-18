<?php
 
class PessoaLib {

    function __construct(){
        $CI =& get_instance(); 
    }
    
    function montarPessoas($dados = null){

        $html = '';
        if($dados){
            $html = '<h4>Resultados da busca</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                    ';

            foreach($dados as $dado){
                $html .= "
                    <tr>
                        <td>$dado->pessoaid</td>
                        <td>$dado->nome</td>
                        <td>$dado->email</td>
                        <td align='right'>
                            <button type='button' class='btn btn-default btn-lg editarPessoa' data-id='".$dado->pessoaid."'>
                                <span class='glyphicon glyphicon-pencil'></span>
                            </button>
                            <button type='button' class='btn btn-default btn-lg excluirPessoa' data-id='".$dado->pessoaid."'>
                                <span class='glyphicon glyphicon-remove'></span>
                            </button>
                        </td>
                    </tr>
                ";
            }

            $html .= "</tbody>
                </table> ";

        }
        else{
            $html .= "<h4>Nenhum resultado foi encontrado</h4>";
        }
        return $html;
    }
}