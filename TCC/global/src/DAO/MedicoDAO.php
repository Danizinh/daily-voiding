<?php
class MedicoDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarMedico()
    {
        $sql = "SELECT * FROM medico";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirMedico($medico)
    {
        $sql = "INSERT INTO medico(id,CRM,id_usuario)
        VALUES (:id,:CRM,:id_usuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $medico['id']);
        $stmt->bindValue(':CRM', $medico['CRM']);
        $stmt->bindValue(':id_usuario', $medico['id_usuario']);

        if ($stmt->execute()) {
            return "200 OK";
        }
    }
    public function atualizarMedico($medico)
    {
        $sql = "UPDATE medico SET CRM = :CRM,id_usuario =:id_usuario WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $medico['id']);
        $stmt->bindValue(':CRM', $medico['CRM']);
        $stmt->bindValue(':id_usuario', $medico['id_usuario']);
        $stmt->execute();
    }
    public function excluirMedico($id)
    {
        $sql = "DELETE FROM medico WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
}
