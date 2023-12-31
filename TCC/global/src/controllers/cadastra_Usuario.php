<?php
session_start();
require_once dirname(__DIR__, 3) . "/global/connection/conn.php";
require_once dirname(__DIR__, 3) . "/global/src/models/Usuario.php";
require_once dirname(__DIR__, 3) . "/global/src/DAO/UsuarioDAO.php";
require_once dirname(__DIR__, 3) . "/global/src/DAO/MedicoDAO.php";
require_once dirname(__DIR__, 3) . "/global/src/controllers/cadastrar_Paciente.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['sobrenome']) && !empty($_POST['email']) && !empty($_POST['senha_crypt'])) {

        $pdo = new Database();
        $name = $_POST['name'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha_crypt = md5($_POST['senha_crypt']);

        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $medicoDAO = new MedicoDAO($pdo->getConnection());
        $resultUsuario = $usuarioDAO->efetuarRegistro($name, $email, $sobrenome, $senha_crypt);
        if ($resultUsuario) {
            if (isset($_POST['campo1'])) {
                $crm =  $_POST['campo1'];
                $resultMedico = $medicoDAO->inserirMedico(($name . " " . $sobrenome),$crm,$resultUsuario);
                if ($resultMedico) {
                    header("Location:../view/public/login.php");
                } else {
                    header("Location:../view/public/cadastro.php?erro=4");
                    exit();
                }
            } else {
                $paciente = cadastrar_paciente($resultUsuario, $pdo->getConnection());
                if ($paciente) {
                    header("Location:../view/public/login.php");
                } else {
                    header("Location:../view/public/cadastro.php?erro=4");
                    exit();
                }
            }
        } else {
            header("Location:../view/public/cadastro.php?erro=4");
        }
        exit();
    } else {
        header("Location:../view/public/cadastro.php?erro=4");
        exit();
    }
}