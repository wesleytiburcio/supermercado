<?php

namespace App\Model;


use App\Core\Model;

class Categoria extends Model
{
    private $nome;
    private $status;

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getAllCategorias()
    {
        $sql = "SELECT * FROM categorias WHERE status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', 'A');
        $stmt->execute();

        //$categorias = $stmt->FetchAll();
        //return $categorias;
        return $stmt->FetchAll();
    }
    public function getUnitCategorias($id)
    {
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        //$dados = $stmt->Fetch();
        //return $dados;
        return $stmt->Fetch();
    }

    public function addCategorias($nome)
    {
        $sql = "INSERT INTO categorias (nome) VALUES(:nome)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);

        $stmt->execute();
    }

    public function updateCategorias($id, $nome)
    {
        $sql = "UPDATE categorias SET nome = :nome WHERE (id = :id)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);

        $stmt->execute();
    }

    public function deleteCategorias($id)
    {
        $sql = "UPDATE categorias SET status = :status WHERE (id = :id)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':status', 'I');
        $stmt->execute();
    }


}