/
/*
function getHab($srv){
    $sql = "SELECT *  FROM habilitacoes_has_utilizador WHERE ";
    $stmt = $srv->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getReceitasByIds($pdo, $ids) {
    $sql = "SELECT habilitacoes_has_utilizador.*, habilitacoes.* FROM habilitacoes_has_utilizador INNER JOIN habilitacoes ON habilitacoes_has_utilizador.Habilitacoes_ID_habilitacoes = habilitacoes.ID_habilitacoes WHERE  Utilizador_ID_utilizador IN (".$ids.")";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);



}
function EstablishDBCon()
{
$pdo = include_once 'config';
    return $pdo;
}

*/




