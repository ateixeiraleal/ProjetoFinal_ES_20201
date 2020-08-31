<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\pessoaJuridicaDAO.php';
include_once '..\Persistence\pessoaFisicaDAO.php';
include_once '..\Persistence\petDAO.php';
include_once '..\Persistence\adocaoDAO.php';

// instanciando uma conexão e retornando os dados desta conexão.
$conexao = new Connection();
$conexao = $conexao->getConnection();

// criando a classe que fará as operações no BD.
$adocaoDAO = new AdocaoDAO();
$resultado = $adocaoDAO->consultar($conexao);

// se a quantidade de linhas for maior que zero há dados a serem processados.
if($resultado->num_rows > 0){
    echo "<html>
        <head>
            <link href='..\CSS\style.css' rel='stylesheet' type='text/css'/>
            <title>Pet For Friend</title>
        </head>
        <body>
            <div class='fundoTela'>
                <h2 class='titulo'>MÓDULO DE CONSULTAS</h2>
                <h2 class='subtitulo'>Adoções</h2>
                <table>
                    <tr>
                        <th>id</th>
                        <th>Data</th>
                        <th>Pet</th>
                        <th>Doador</th>
                        <th>Adotante</th>
                    </tr>";
                    // retira a # do endereço do diretório.
                    $diretorio = substr("..\img\pets\#", 0, -1);
                    // enquanto houverem linhas para serem processadas pega uma a uma, joga na variável registro e imprima os campos respectivos.
                    while($registro = $resultado->fetch_assoc()){
                        echo "<tr>
                            <td>" .$registro['id']. "</td>
                            <td>" .$registro['data']. "</td>
                            <td>" .$registro['pet']. "</td>
                            <td>" .$registro['doador']. "</td>
                            <td>" .$registro['adotante']. "</td>
                            <td>
                                <a href='buscarAdocaoLink.php?id=".$registro['id']."'>
                                    <img id='img_icon' alt='Exibir' src='..\img\icons\icon_view.png'>	
                                </a>
                                <a href='confirmarAlteracaoAdocao.php?id=".$registro['id']."'>
                                    <img id='img_icon' alt='Alterar' src='..\img\icons\icon_edit.png'>
                                </a>
                                <a href='confirmarExclusaoAdocao.php?id=".$registro['id']."'>
                                    <img id='img_icon' alt='Excluir' src='..\img\icons\icon_delete.png'>
                                </a>
                            </td>
                        </tr>";
                    }
                echo "</table>";
            echo "</div";
        echo "</body>";
    echo "</html>";
}else{
    echo "Não existem adoções cadastradas!";
}