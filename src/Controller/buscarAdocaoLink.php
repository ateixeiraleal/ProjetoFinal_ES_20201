<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\adocaoDAO.php';
include_once '..\Persistence\petDAO.php';
include_once '..\Persistence\pessoaFisicaDAO.php';
include_once '..\Persistence\pessoaJuridicaDAO.php';

$id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

// instanciando uma conexão e retornando os dados desta conexão.
$conexao = new Connection();
$conexao = $conexao->getConnection();

// criando a classe que fará as operações no BD.
$adocaodao= new AdocaoDAO();
$resultado = $adocaodao->buscarCodigo($id, $conexao);

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
                <h2 class='titulo'>MÓDULO DE CONSULTAS</h2>
                <h2 class='subtitulo'>|| Adoção nº: ".$registro['id']." || Data: ".$registro['data']." ||</h2>
                <table>
                    <tr>
                        <th>Pet</th>
                        <th>Doador</th>
                        <th>Adotante</th>
                    </tr>
                    <tr>
                    <td>";
                        $pet= new PetDAO();
                        $r1 = $pet->consultarPetCodigo($registro['pet'], $conexao);
                        if($r1->num_rows > 0){
                            $diretorio = substr("..\img\pets\#", 0, -1);
                            $registroPet = $r1->fetch_assoc();
                            echo "<img src='".$diretorio."".$registroPet['imagem']."' width='200' height='200'><br>
                            <u><strong>ID: ".$registroPet['codigoPet']."</strong></u><br><br>
                            NOME: ".$registroPet['nome']."<br>
                            Espécie: ".$registroPet['tipo']."<br>
                            SEXO: ".$registroPet['sexo']."";
                        }
                    echo "</td>
                    <td>";
                        $doador= new PessoaJuridicaDAO();
                        $r2 = $doador->consultarCodigo($registro['doador'], $conexao);
                        if($r2->num_rows > 0){
                            $registroPJ = $r2->fetch_assoc();
                            echo "<u><strong>ID: ".$registroPJ['idUsuario']."</strong></u><br><br>
                            CNPJ: ".$registroPJ['cnpj']."<br>
                            NOME: ".$registroPJ['nome']."<br>
                            E-MAIL: ".$registroPJ['email']."";
                        }
                    echo "</td>
                    <td>";
                        $adotante= new PessoaFisicaDAO();
                        $r3 = $adotante->consultarCodigo($registro['adotante'], $conexao);
                        if($r3->num_rows > 0){
                            $registroPF = $r3->fetch_assoc();
                            echo "<u><strong>ID: ".$registroPF['idUsuario']."</strong></u><br><br>
                            CPF: ".$registroPF['cpf']."<br>
                            NOME: ".$registroPF['nome']."<br>
                            E-MAIL: ".$registroPF['email']."";
                        }
                    echo "</td>
                                    </tr>
                    <tr>
                    <td></td>
                                            <td><a href='confirmarAlteracaoAdocao.php?id=".$registro['id']."'>
                                                    <button class='btnSubmit'>ALTERAR</button></a>
                                            </td>
                                            <td><a href='confirmarExclusaoAdocao.php?id=".$registro['id']."'>
                                                    <button class='btnSubmit'>EXCLUIR</button></a>
                                            </td>
                                    </tr>
                </table>
            </div>
        </body>
    </html>";
}else{
    echo "Não existem pets cadastrados!";
}
