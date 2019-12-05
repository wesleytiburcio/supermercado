<?php

namespace App\Model;

use App\Core\Model;

class Venda extends Model
{
    private $id;
    private $data;
    private $total;
    private $valorpago;
    private $troco;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getData()
    {
        return $this->data;
    }
    public function setData($data): void
    {
        $this->data = $data;
    }

    public function getTotal()
    {
        return $this->total;
    }
    public function setTotal($total): void
    {
        $this->total = $total;
    }

    public function getValorpago()
    {
        return $this->valorpago;
    }
    public function setValorpago($valorpago): void
    {
        $this->valorpago = $valorpago;
    }

    public function getTroco()
    {
        return $this->troco;
    }
    public function setTroco($troco): void
    {
        $this->troco = $troco;
    }

    public function getAllVendas()
    {
        $sql = "SELECT * FROM vendas";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();        
    }

    public function addVendas()
    {
        $sql = "INSERT INTO vendas (data, total, valorpago, troco) 
                VALUES(:data, :total, :valorpago, :troco)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':data', $this->getData());
        $stmt->bindValue(':total', $this->getTotal());
        $stmt->bindValue(':valorpago', $this->getValorpago());
        $stmt->bindValue(':troco', $this->getTroco());

        $stmt->execute();
    }

    public function getUnitVendas($id)
    {
        $sql = "SELECT * FROM vendas WHERE id = :id  ";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function updateVendas()
    {
        $sql = "UPDATE vendas 
        SET data = :data, total = :total, valorpago = :valorpago, troco = :troco  
        WHERE (id = :id)";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':data', $this->getData());
        $stmt->bindValue(':total', $this->getTotal());
        $stmt->bindValue(':valorpago', $this->getValorpago());
        $stmt->bindValue(':troco', $this->getTroco());
        //$stmt->bindValue(':status', 'A');

        //var_dump($sql, $this);exit;
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM vendas WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }



}

?>