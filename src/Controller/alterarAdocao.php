<?php
include_once '..\Persistence\connection.php';
include_once '..\Persistence\adocaoDAO.php';

    $adocao = $_POST['cAdocao']; // codigo da aldoção não muda.
    $oldPet = $_POST['cOldPet'];
    $oldAdotante = $_POST['cOldAdotante'];
    $newPet = $_POST['cNewPet'];
    $newAdotante = $_POST['cNewAdotante'];

    // instanciando uma conexão e retornando os dados desta conexão.
    $conexao = new Connection();
    $conexao = $conexao->getConnection();

    // instancia nova adocao e chama a função que irá alterar os dados do pet.
    $adocaodao = new AdocaoDAO();
    $resultado = $adocaodao->alterar($adocao, $oldPet, $oldAdotante, $newPet, $newAdotante, $conexao);

?> 