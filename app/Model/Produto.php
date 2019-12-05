<?php

namespace App\Model;

use App\Core\Model;

class Produto extends Model
{
    private $id;
    private $nome;
    private $precodecusto;
    private $precodevenda;
    private $status;
    private $fornecedor;
    private $categoria;
    private $medicao;
    
    public function getId()
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    
    public function getFornecedor()
    {
        return $this->fornecedor;
    }
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    
    public function getMedicao()
    {
        return $this->medicao;
    }
    public function setMedicao($medicao)
    {
        $this->medicao = $medicao;
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
    public function getPrecodecusto()
    {
        return $this->precodecusto;
    }
    public function setPrecodecusto($precodecusto): void
    {
        $this->precodecusto = $precodecusto;
    }

    /**
     * @return mixed
     */
    public function getPrecodevenda()
    {
        return $this->precodevenda;
    }
    public function setPrecodevenda($precodevenda): void
    {
        $this->precodevenda = $precodevenda;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function getAllProdutos()
    {
        $sql = "SELECT p.id, f.nome as nomeFornecedor, c.nome as nomeCategoria, m.descricao as descricaoMedicao, p.nome, p.precodecusto, p.precodevenda, p.status
                FROM produtos as p
                INNER JOIN categorias as c
                ON p.idCategorias = c.id
                INNER JOIN fornecedores as f
                ON p.idFornecedores = f.id
                INNER JOIN medicoes as m
                ON p.idMedicoes = m.id               
                ";
               
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', 'A');
        $stmt->execute();
        
        //var_dump($stmt->fetchAll(), $sql);exit;
        return $stmt->fetchAll();
    }

    public function getOnlyProdutos()
    {
        $sql = "SELECT * FROM produtos";
               
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', 'A');
        $stmt->execute();
        
        //var_dump($stmt->fetchAll(), $sql);exit;
        return $stmt->fetchAll();
    }

    public function getUnitProdutos($id)
    {
        //var_dump($id);exit;
        $sql = "SELECT p.id, f.nome as nomeFornecedor , f.id as idFornecedor , c.nome as nomeCategoria, c.id as idCategoria, 
                       m.descricao as descricaoMedicao, m.id as idMedicao, p.nome, p.precodecusto, p.precodevenda, p.status
            FROM produtos as p
            INNER JOIN categorias as c
            ON p.idCategorias = c.id
            INNER JOIN fornecedores as f
            ON p.idFornecedores = f.id
            INNER JOIN medicoes as m
            ON p.idMedicoes = m.id               
            WHERE p.id = :id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
        //var_dump($stmt->fetch(), $sql);exit;
        return $stmt->Fetch();
    }

    public function addProdutos()
    {
        
        $sql = "INSERT INTO produtos (idFornecedores, idCategorias, idMedicoes, nome, precodecusto, precodevenda, status) 
                VALUES(:idFornecedor, :idCategoria, :idMedicao, :nome, :precodecusto, :precodecusto, :status)";
                
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':precodecusto', $this->getPrecodecusto());
        $stmt->bindValue(':precodevenda', $this->getPrecodevenda());
        $stmt->bindValue(':idFornecedor', $this->getFornecedor());
        $stmt->bindValue(':idCategoria', $this->getCategoria());
        $stmt->bindValue(':idMedicao', $this->getMedicao());
        $stmt->bindValue(':status', 'A');
        
        $stmt->execute();
    }

    public function updateProdutos()
    {
        //var_dump($_POST);exit;
        $sql = "UPDATE produtos 
        SET idFornecedores = :idFornecedores, idCategorias = :idCategorias, idMedicoes = :idMedicoes, 
            nome = :nome, precodecusto = :precodecusto, precodevenda = :precodevenda  
        WHERE (id = :id)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getId());
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':precodecusto', $this->getPrecodecusto());
        $stmt->bindValue(':precodevenda', $this->getPrecodevenda());
        $stmt->bindValue(':idFornecedores', $this->getFornecedor());
        $stmt->bindValue(':idCategorias', $this->getCategoria());
        $stmt->bindValue(':idMedicoes', $this->getMedicao());
        //$stmt->bindValue(':status', 'A');

        //var_dump($sql, $this);exit;
        $stmt->execute();
    }

    public function deleteFornecedores($id)
    {
        $sql = "UPDATE produtos SET status = :status WHERE (id = :id)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':status', 'I');
        $stmt->execute();
    }


}