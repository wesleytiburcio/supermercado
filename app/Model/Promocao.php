<?php

namespace App\Model;

use App\Core\Model;

class Promocao extends Model
{
    private $id;
    private $nome;
    private $produto;
    private $porcentagem;
    private $status;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getProduto()
    {
        return $this->produto;
    }
    public function setProduto($produto): void
    {
        $this->produto = $produto;
    }

    /**
     * @return mixed
     */
    public function getPorcentagem()
    {
        return $this->porcentagem;
    }
    public function setPorcentagem($porcentagem): void
    {
        $this->porcentagem = $porcentagem;
    }
    
    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    public function getAllPromocoes()
    {
        $sql = "SELECT prom.id, prom.nome, prom.porcentagem, prom.status, prod.nome as nomeProduto
            FROM promocoes as prom
            INNER JOIN produtos as prod
            ON prom.idProdutos = prod.id
            WHERE prom.status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', 'A');
        $stmt->execute();
        //var_dump($stmt); exit;
        return $stmt->FetchAll();
    }

    public function getUnitPromocoes($id)
    {
        $sql = "SELECT * FROM promocoes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        return $stmt->Fetch();
    }

    public function addPromocoes()
    {
        //var_dump($this).exit;
        $sql = "INSERT INTO promocoes (nome, porcentagem, idProdutos, status) 
                VALUES(:nome, :porcentagem, :idProduto, :status)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':porcentagem', $this->getPorcentagem());
        $stmt->bindValue(':idProduto', $this->getProduto());
        $stmt->bindValue(':status', 'A');       
       //var_dump($this, $sql);exit;
        $stmt->execute();
    }

    public function updatePromocoes($id, $nome)
    {
        $sql = "UPDATE promocoes SET nome = :nome WHERE (id = :id)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);

        $stmt->execute();
    }

    public function deletePromocoes($id)
    {
        $sql = "UPDATE promocoes SET status = :status WHERE (id = :id)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':status', 'I');
        $stmt->execute();
    }
}
