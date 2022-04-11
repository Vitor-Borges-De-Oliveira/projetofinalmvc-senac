<?php
namespace app\controllers;
use app\core\Controller;
use app\models\Tblfilmes;

class TblfilmesController extends Controller{
    
   public function index(){

      //instância do Model criada
        $objTblfilmes = new Tblfilmes();
        $dados["lista"] = $objTblfilmes->lista();
        $dados["view"] = "Tblfilmes/index";
         //echo "<pre>";
         //print_r($dados);
         //exit;
         $this->load("template",$dados);
       
   } 

   public function edit($id){
      $objTblfilmes = new Tblfilmes();
      $dados["tblfilmes"] = $objTblfilmes->getTblfilmes($id);
      $dados["view"] = "Tblfilmes/Create";
      //echo "<pre>";
      //print_r($dados);
      //exit;

      $this->load("template",$dados);

   }

   //Criar método create
   public function create(){
      $dados["view"] = "Tblfilmes/Create";
      $this->load("template",$dados);
       
   }

   public function salvar(){
    
      $objTblfilmes = new Tblfilmes();
      $tblfilmes = new \stdClass();
      $tblfilmes->filme          = $_POST["filme"];
      $tblfilmes->preco          = $_POST["preco"];
      $tblfilmes->tempo          = $_POST["tempo"];
      $tblfilmes->sessao         = $_POST["sessao"];
      $tblfilmes->artistas       = $_POST["artistas"];
      $tblfilmes->diretor        = $_POST["diretor"];
      $tblfilmes->sinopse        = $_POST["sinopse"];
      $tblfilmes->dia            = $_POST["dia"];
      $tblfilmes->idfilme        =($_POST["idfilme"]) ? $_POST["idfilme"] : NULL;
      


      if($tblfilmes->idfilme) {

            $objTblfilmes->editar($tblfilmes);
           } else {
         $objTblfilmes->inserir($tblfilmes);
      }
     header("location:".URL_BASE."tblfilmes");
         

   }
  
   public function excluir($id){
      $objTblfilmes = new Tblfilmes();
      $objTblfilmes->excluir($id);
      header("location:".URL_BASE."tblfilmes");


   }

}
