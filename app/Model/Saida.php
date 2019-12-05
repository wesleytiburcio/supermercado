<?php

namespace App\Model;

use App\Core\Model;

class Saida extends Model
{
    private $id;
    private $produto;
    private $venda;
    private $valorvenda;
    private $quantidade;
    private $data;

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
    public function getVenda()
    {
        return $this->venda;
    }
    public function setVenda($venda): void
    {
        $this->venda = $venda;
    }

    /**
     * @return mixed
     */
    public function getValorvenda()
    {
        return $this->valorvenda;
    }
    public function setValorvenda($valorvenda): void
    {
        $this->valorvenda = $valorvenda;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }
    public function setQuantidade($quantidade): void
    {
        $this->quantidade = $quantidade;
    }
    
    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    public function setData($data): void
    {
        $this->data = $data;
    }

    public function getAllSaidas()
    {
        $sql = "SELECT sa.id, prod.nome as nomeProduto, ven.total as totalVenda, sa.valorvenda, sa.quantidade, sa.data 
                FROM saidas as sa
                INNER JOIN produtos as prod
                ON sa.idProdutos = prod.id
                INNER JOIN vendas as ven
                ON sa.idVendas = ven.id ";
        
        $stmt = $this->db->prepare($sql);
        
        $stmt->execute();
        //var_dump($stmt); exit;
        return $stmt->FetchAll();
    }

    public function getUnitSaidas($id)
    {
        $sql = "SELECT * FROM saidas WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        return $stmt->Fetch();
    }

    public function addSaidas()
    {
        //var_dump($this).exit;
        $sql = "INSERT INTO saidas (idProdutos, idVendas, valorvenda, quantidade, data) 
                VALUES(:idProdutos, :idVendas, :valorvenda, :quantidade, :data)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':idProdutos', $this->getProduto());
        $stmt->bindValue(':idVendas', $this->getVenda());
        $stmt->bindValue(':valorvenda', $this->getValorvenda());
        $stmt->bindValue(':quantidade', $this->getQuantidade());
        $stmt->bindValue(':data', $this->getData());
    
       //var_dump($this, $sql);exit;
        $stmt->execute();
    }

    public function updateSaidas()
    {
        $sql = "UPDATE saidas 
                SET id = :id, idProdutos = :idProdutos, idVendas = :idVendas, valorvenda = :valorvenda, quantidade = :quantidade, data = :data 
                WHERE (id = :id)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':idProdutos', $this->getProduto());
        $stmt->bindValue(':idVendas', $this->getVenda());
        $stmt->bindValue(':valorvenda', $this->getValorvenda());
        $stmt->bindValue(':quantidade', $this->getQuantidade());
        $stmt->bindValue(':data', $this->getData());

        $stmt->execute();
    }

    public function deleteSaidas($id)
    {
        $sql = "DELETE FROM saidas WHERE (id = :id)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);
        
        $stmt->execute();
    }
}
