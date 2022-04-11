<?php
namespace app\models;
use app\core\Model;

class Tblfilmes extends Model{

    public function lista(){
        $sql = "SELECT * FROM tblfilmes";
        $qry = $this->db->query($sql);
        return $qry->fetchAll(\PDO::FETCH_OBJ);
          
    }

    public function inserir($tblfilmes){
        $sql = " INSERT INTO tblfilmes set
        filme        =:filme,
        preco        =:preco,
        tempo        =:tempo,
        sessao       =:sessao,
        artistas     =:artistas,
        diretor      =:diretor,
        sinopse      =:sinopse,
        dia          =:dia
      ";

        $qry=$this->db->prepare($sql);

        $qry->bindValue(":filme", $tblfilmes->filme);
        $qry->bindValue(":preco", $tblfilmes->preco);
        $qry->bindValue(":tempo", $tblfilmes->tempo);
        $qry->bindValue(":sessao", $tblfilmes->sessao);
        $qry->bindValue(":artistas", $tblfilmes->artistas);
        $qry->bindValue(":diretor", $tblfilmes->diretor);
        $qry->bindValue(":sinopse", $tblfilmes->sinopse);
        $qry->bindValue(":dia", $tblfilmes->dia);
        $qry->execute();

        return $this->db->lastInsertId();
       
    }

    public function getTblfilmes($id){
        $sql = "SELECT * FROM tblfilmes where idfilme = $id";
        $qry = $this->db->query($sql);
        return $qry->fetch(\PDO::FETCH_OBJ);
    }

    public function editar($tblfilmes){
        $sql = " UPDATE tblfilmes set
        filme         =:filme,
        preco         =:preco,
        tempo         =:tempo,
        sessao        =:sessao,
        artistas      =:artistas,
        diretor       =:diretor,
        sinopse       =:sinopse,
        dia           =:dia
        WHERE idfilme =: id
      ";

        $qry=$this->db->prepare($sql);

        $qry->bindValue(":filme", $tblfilmes->filme);
        $qry->bindValue(":preco", $tblfilmes->preco);
        $qry->bindValue(":tempo", $tblfilmes->tempo);
        $qry->bindValue(":sessao", $tblfilmes->sessao);
        $qry->bindValue(":artistas", $tblfilmes->artistas);
        $qry->bindValue(":diretor", $tblfilmes->diretor);
        $qry->bindValue(":sinopse", $tblfilmes->sinopse);
        $qry->bindValue(":dia", $tblfilmes->dia);
        $qry->bindValue(":id", $tblfilmes->idfilme);
        $qry->execute();

        return $tblfilmes->idfilme;
       
    }

    public function excluir($id){
        $sql = "DELETE FROM tblfilmes where idfilme = $id";
        $qry = $this->db->query($sql);
    }


    

}