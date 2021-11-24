<?php
require_once("./models/MainManager.model.php");

class VisiteurManager extends MainManager
{

    public function getCommentaire()
    {
        $req = $this->getBdd()->prepare("SELECT commentaires.id,login,commentaire,date, id_utilisateur from utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $datas;
    }
}
