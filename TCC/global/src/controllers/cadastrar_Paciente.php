<?php
require dirname(__DIR__, 3) . "/global/src/DAO/PacienteDAO.php";


function cadastrar_paciente($id_usuario, $conexao)
{
    $pacienteDAO = new PacienteDAO($conexao);
    $resultPaciente = $pacienteDAO->inicializarPaciente($id_usuario);
    return $resultPaciente;
}