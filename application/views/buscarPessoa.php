<head>
    <link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="includes/bootstrap/css/internas.css">
    <script>var base_url = '<?php echo base_url();?>' </script>      

    <?php 
        //carrega scripts necessários
        
        $CI = & get_instance();
        if(!empty($CI->js)){
            foreach ($CI->js as $script){
                echo '<script src="'.$script.'"></script>';
            }
        }
    ?>

    <meta charset="UTF-8">
    <title>CRUD PHP</title>
</head>
    
<body id="body"> 
    <div class="row">

            <form id='formBuscar' action="" method="post">
                <div class="form-group">
                    <h2 class="mb-3">CRUD CODEIGNITER</h2>
                    
                    <br/>
                    
                    <div class="row" style="width:100%;">
                        <div class="col-md-7 mb-6">
                            <label for="busca">Pessoa</label>
                            <input  id="busca" name="busca" type="text" class="form-control" placeholder="Informe ID ou nome"></input>
                        </div>
                        <div class="col-md-4 mb-3" align="right">
                            <br/>
                            <button id="buscar" type="submit" class="btn btn-dark btn-lg float-right col-md-4 mb-1">Buscar</button>
                            <button id="novo" type="submit" class="btn btn-dark btn-lg float-right col-md-4 mb-1" style="margin-left: 15px">Novo</button>
                        </div>
                    </div>
                    
                    <br/>

                    <div class="row" style="width:100%;">
                        <div class="col-md-10 mb-3" id="resultBusca"></div>
                    </div>
                </div>  
            </form>
       
    </div>
    
</body>
