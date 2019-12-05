<?php


namespace App\Model;


use App\Core\Model;

class Fornecedor extends Model
{
    private $nome;
    private $email;
    private $telefone;
    private $status;

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
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

    public function getAllFornecedores()
    {
        $sql = "SELECT * FROM fornecedores WHERE status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', 'A');
        $stmt->execute();

        //$categorias = $stmt->FetchAll();
        //return $categorias;
        return $stmt->FetchAll();
    }
    public function getUnitFornecedores($id)
    {
        $sql = "SELECT * FROM fornecedores WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        //$dados = $stmt->Fetch();
        //return $dados;
        return $stmt->Fetch();
    }

    public function addFornecedores($nome, $email, $telefone)
    {
        $sql = "INSERT INTO fornecedores (nome, email, telefone) VALUES(:nome, :email, :telefone)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':telefone', $telefone);

        $stmt->execute();
    }

    public function updateFornecedores($id, $nome, $email, $telefone)
    {
        $sql = "UPDATE fornecedores SET nome = :nome, email = :email, telefone = :telefone  WHERE (id = :id)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':telefone', $telefone);

        $stmt->execute();
    }

    public function deleteFornecedores($id)
    {
        $sql = "UPDATE fornecedores SET status = :status WHERE (id = :id)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':status', 'I');
        $stmt->execute();
    }

}