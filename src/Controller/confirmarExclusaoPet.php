<?php
include_once '..\Persistence\connection.php';
include_once '..\Model\pet.php';
include_once '..\Persistence\petDAO.php';

$codigoPet = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

// instanciando uma conexão e retornando os dados desta conexão.
$conexao = new Connection();
$conexao = $conexao->getConnection();

// criando a classe que fará as operações no BD.
$petdao = new PetDAO();
$resultado = $petdao->consultarPETcodigo($codigoPet, $conexao);

// se a quantidade de linhas for maior que zero há dados a serem processados.
if($resultado->num_rows > 0){
    $diretorio = substr("..\img\pets\#", 0, -1);
    $registro = $resultado->fetch_assoc();
    echo "<html>
        <head>
            <link href='..\CSS\style.css' rel='stylesheet' type='text/css'/>
            <title>Pet For Friend</title>
        </head>
        <body>
            <div class='fundoTela'>
                <h2 class='titulo'>MÓDULO DE EXCLUSÃO</h2>
                <h2 class='subtitulo'>".$registro['nome']."</h2>
                <form action='..\Controller\confirmarAlterarPet.php' method='POST' name='f1' autocomplete='off' enctype='multipart/form-data'>
                    <table>
                        <tr>
                            <th>Foto</th>
                            <th>Dados</th>
                        </tr>
                        <tr>
                            <td>
                                <img src='".$diretorio."".$registro['imagem']."' width='200' height='200'><br>
                            </td>
                            <td>
                                PET: ".$codigoPet."
                                DOADOR: ".$registro['doador']." <br><br><br>
                                Nome: ".$registro['nome']." <br><br>
                                Espécie ".$registro['tipo']." <br><br>
                                Sexo: ".$registro['sexo']." <br><br>
                                <a class='btnSubmit' href='excluirPet.php?id=".$codigoPet."'>CONFIRMAR</a>
                                <a class='btnCancelar' href='consultarPets.php' target='home_iframe'>CANCELAR</a> <br><br>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </body>
    </html>";
}else echo "Não existem pets cadastrados!";

?> 