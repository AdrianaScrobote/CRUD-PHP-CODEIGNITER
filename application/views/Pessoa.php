<?php //print_r(base_url()); die(); ?>

<head>
    <link rel="stylesheet" href="<?php echo base_url() . "includes/bootstrap/css/bootstrap.min.css"; ?>">
    <link rel="stylesheet" href="<?php echo base_url() . "includes/bootstrap/css/internas.css" ?>">
    <script>var base_url = '<?php echo base_url();?>' </script> 

    <?php 
        //carrega scripts necessários
        $CI = & get_instance();
        if(!empty($CI->js)){
            foreach ($CI->js as $script){
                echo '<script src="'.base_url().$script.'"></script>';
            }
        }
    ?>

    <meta charset="UTF-8">
    <title>CRUD PHP</title>
</head>
    
<body id="body"> 
    <div class="row">

        <form id='formPessoa' action="<?php echo(base_url() . "Pessoa/gravarPessoa");?>" method="post">
            <div class="form-group">
                <h2 class="mb-3"><?= isset($pessoaid) ? "EDIÇÃO PESSOA" : "CADASTRO PESSOA" ?></h2>
                <input type="hidden" id="pessoaid" name="pessoaid" value="<?= isset($pessoaid) ? $pessoaid : ''; ?>">
                
                <br/>
                
                <div class="row" style="width:100%;">
                    <div class="col-md-10 mb-3">
                        <label for="nome">Pessoa</label>
                        <input  id="nome" name="nome" type="text" class="form-control" placeholder="" value="<?= isset($nome) ? $nome : ''; ?>"></input>
                    </div>
                </div>
                <div class="row" style="width:100%;">
                    <div class="col-md-4 mb-3">
                        <label for="sexo">Sexo</label>
                        <select  id="sexo" name="sexo" type="text" class="form-control" placeholder="">
                            <option value=''>Selecione</option>
                            <option value='F' <?= isset($sexo) && $sexo == 'F' ? 'selected' : ''; ?>>Feminino</option>
                            <option value='M' <?= isset($sexo) && $sexo == 'M' ? 'selected' : ''; ?>>Masculino</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cidade">Cidade</label>
                        <input  id="cidade" name="cidade" type="text" class="form-control" placeholder="" value="<?= isset($cidade) ? $cidade : ''; ?>"></input>
                    </div>
                </div>
                <div class="row" style="width:100%;">
                    <div class="col-md-6 mb-3">
                        <label for="email">E-mail</label>
                        <input  id="email" name="email" type="text" class="form-control" placeholder="" value="<?= isset($email) ? $email : ''; ?>"></input>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="senha">Senha</label>
                        <input  id="senha" name="senha" type="password" class="form-control" placeholder="" value="<?= isset($senha) ? $senha : ''; ?>"></input>
                    </div>
                </div>
                
                <br/>
                <div class="row" style="width:100%;">
                    <div class="col-md-4 mb-2">
                        <br/>
                        <button id="gravarPessoa" type="submit" class="btn btn-dark btn-lg float-right col-md-4 mb-1">Gravar</button>
                        <button id="voltar" type="button" class="btn btn-dark btn-lg float-right col-md-4 mb-1" style="margin-left: 15px">Voltar</button>
                    </div>
                </div>
            </div>  
        </form>
    </div>
    
</body>
