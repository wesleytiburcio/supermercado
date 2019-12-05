<?php


namespace App\Model;


use App\Core\Model;

class Medicao extends Model
{
    private $sigla;
    private $descricao;
    private $status;

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

    /**
     * @return mixed
     */
    public function getSigla()
    {
        return $this->sigla;
    }
    public function setSigla($sigla): void
    {
        $this->sigla = $sigla;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setDescricao($descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getAllMedicoes()
    {
        $sql = "SELECT * FROM medicoes WHERE status = :status";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', 'A');
        $stmt->execute();

        //$categorias = $stmt->FetchAll();
        //return $categorias;
        return $stmt->FetchAll();
    }
    public function getUnitMedicoes($id)
    {
        $sql = "SELECT * FROM medicoes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();

        //$dados = $stmt->Fetch();
        //return $dados;
        return $stmt->Fetch();
    }

    public function addMedicoes($sigla, $descricao)
    {
        $sql = "INSERT INTO medicoes (sigla, descricao) VALUES(:sigla, :descricao)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':sigla', $sigla);
        $stmt->bindValue(':descricao', $descricao);

        $stmt->execute();
    }

    public function updateMedicoes($id, $sigla, $descricao)
    {
        $sql = "UPDATE medicoes SET sigla = :sigla, descricao = :descricao WHERE (id = :id)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':sigla', $sigla);
        $stmt->bindValue(':descricao', $descricao);

        $stmt->execute();
    }

    public function deleteMedicoes($id)
    {
        $sql = "UPDATE medicoes SET status = :status WHERE (id = :id)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':status', 'I');
        $stmt->execute();
    }

}