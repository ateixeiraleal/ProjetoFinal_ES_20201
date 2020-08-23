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
                <h2 class='titulo'>MÓDULO DE EDIÇÃO</h2>
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
                                <input type='text' name='cCodigoImagem' value='".$registro['imagem']."' hidden>
                            </td>
                            <td>
                                Cod. PET: ´".$registro['codigoPet']."´ | 
                                <input type='text' name='cCodigoPet' maxlength='4' size='5' value='".$registro['codigoPet']."' hidden>
                                Cod. DOADOR: ´".$registro['idUsuario']."´
                                <input type='text' name='cIdUsuario' maxlength='4' size='5' value='".$registro['idUsuario']."' hidden><br><br><br>
                                Foto: <input type='file' name='cImagem'><br><br>
                                Nome: <input type='text' name='cNome' value='".$registro['nome']."' maxlength='45' size='50'><br><br>";
                                if($registro['tipo'] === 'cachorro'){
                                    echo "Espécie: <input type='radio' name='cTipo' value='cachorro' checked> Cachorro
                                    <input type='radio' name='cTipo' value='gato'> Gato <br><br>";
                                }else {
                                    echo "Espécie: <input type='radio' name='cTipo' value='cachorro'> Cachorro
                                    <input type='radio' name='cTipo' value='gato' checked> Gato <br><br>";
                                }
                                if($registro['sexo'] === 'M'){
                                    echo "Sexo: <input type='radio' name='cSexo' value='M' checked> Macho
                                    <input type='radio' name='cSexo' value='F'> Fêmea <br>";
                                }else {
                                    echo "Sexo: <input type='radio' name='cSexo' value='M'> Macho
                                    <input type='radio' name='cSexo' value='F' checked> Fêmea <br>";
                                }echo "
                                <input type='submit' name='LGform1' class='btnSubmit' value='CONFIRMAR'>
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