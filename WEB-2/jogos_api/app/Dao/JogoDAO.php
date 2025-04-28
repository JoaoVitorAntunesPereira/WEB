<?php


namespace App\Dao;

use App\Controller\JogoGeneroController;
use App\Util\Connection;
use App\Mapper\JogoMapper;
use App\Model\Jogo;
use App\Model\Genero;
use App\Dao\JogoGeneroDAO;
use App\Model\ClassificacaoIndicativa;

use \Exception;

class JogoDAO{
    private $conn;
    private $jogoMapper;

    public function __construct() {
        $this->conn = Connection::getConnection();
        $this->jogoMapper = new JogoMapper(); 
    }

    public function list(){
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, c.descricao descricao_classificacao, c.id id_classificacao FROM jogo j JOIN classificacao_indicativa c ON(c.id = j.id_classificacao)";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        //$jogos = $this->jogoMapper->mapFromDatabaseArrayToObjectArray($result);
        $jogos = $this->mapJogos($result);
        return $jogos;
    }

    private function mapJogos($registros){
        $jogos = array();

        foreach ($registros as $value) {
            $jogo = new Jogo();
            $classInd = new ClassificacaoIndicativa();
            $jogoGeneroDao = new JogoGeneroDAO();
            $generoArray = [];
            $jogoPlataformaDao = new JogoPlataformaDAO();
            $plataformaArray = [];


            $jogo->setId($value["id"]);
            $jogo->setTitulo($value["titulo"]);
            $jogo->setDataLancamento($value["data_lancamento"]);
            $jogo->setDesenvolvedor($value["desenvolvedor"]);
            $jogo->setDistribuidora($value["distribuidora"]);
            $jogo->setPaisLancamento($value["pais_lancamento"]);
            $classInd->setId($value["id_classificacao"]);
            $classInd->setDescricao($value["descricao_classificacao"]);
            $jogo->setClassInd($classInd);
        
            foreach ($jogoGeneroDao->list($value["id"]) as $genero) {
                array_push($generoArray, $genero->getGenero()->getNome());
            }

            foreach ($jogoPlataformaDao->list($value["id"]) as $plataforma) {
                array_push($plataformaArray, $plataforma->getPlataforma()->getNome());
            }

            $jogo->setGeneros($generoArray);
            $jogo->setPlataformas($plataformaArray);
            array_push($jogos, $jogo);
        }
        return $jogos;
    }

    public function insert(Jogo $jogoObj){
        $sql = "INSERT INTO jogo (titulo, data_lancamento, desenvolvedor, distribuidora, id_classificacao, pais_lancamento) 
                VALUES (:titulo, :data_lancamento, :desenvolvedor, :distribuidora, :id_classificacao, :pais_lancamento)";
    
        $stmtJogo = $this->conn->prepare($sql);
        $stmtJogo->bindValue(":titulo", $jogoObj->getTitulo());
        $stmtJogo->bindValue(":data_lancamento", $jogoObj->getDataLancamento());
        $stmtJogo->bindValue(":desenvolvedor", $jogoObj->getDesenvolvedor());
        $stmtJogo->bindValue(":distribuidora", $jogoObj->getDistribuidora());
        $stmtJogo->bindValue(":id_classificacao", $jogoObj->getClassInd()->getId());
        $stmtJogo->bindValue(":pais_lancamento", $jogoObj->getPaisLancamento());
        $stmtJogo->execute();
    
        $id = $this->conn->lastInsertId();
        $jogoObj->setId($id);
        return $jogoObj;
    }
    

    public function searchId(Jogo $jogoObj){
        $conn = Connection::getConnection();

        $nome = $jogoObj->getTitulo();
        $dataLancamento = $jogoObj->getDataLancamento();
        $desenvolvedor = $jogoObj->getDesenvolvedor();
        $distribuidora = $jogoObj->getDistribuidora();
        $classInd = $jogoObj->getclassInd()->getId();
        $pais_lancamento = $jogoObj->getPaisLancamento();

        $sql = "SELECT id  FROM jogo WHERE titulo = ? AND data_lancamento = ? AND desenvolvedor = ? AND distribuidora = ? AND id_classificacao = ? AND pais_lancamento = ?";

        $stm = $conn->prepare($sql);
        $stm->execute(array($nome, $dataLancamento, $desenvolvedor, $distribuidora, $classInd, $pais_lancamento));

        $result = $stm->fetch();
        return $result ? $result['id'] : null; 
    }

    public function delete(int $id){
        $conn = Connection::getCOnnection();

        $sql = "DELETE FROM jogo WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id));
    }

    public function searchById(int $id){
        $conn = Connection::getConnection();

        $sql = "SELECT j.*, c.descricao descricao_classificacao, c.id id_classificacao FROM jogo j JOIN classificacao_indicativa c ON(c.id = j.id_classificacao) WHERE j.id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id));

        $result = $stm->fetchAll();

        $jogo = $this->mapJogos($result);

        return $jogo;
    }

    public function edit(Jogo $jogoObj) {
        $conn = Connection::getConnection();

        $sql = "UPDATE jogo SET titulo = ?, data_lancamento = ?, desenvolvedor = ?, distribuidora = ?, id_classificacao = ?, pais_lancamento = ? WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([
            $jogoObj->getTitulo(),
            $jogoObj->getDataLancamento(),
            $jogoObj->getDesenvolvedor(),
            $jogoObj->getDistribuidora(),
            $jogoObj->getClassInd()->getId(),
            $jogoObj->getPaisLancamento(),
            $jogoObj->getId()
        ]);
    }
}