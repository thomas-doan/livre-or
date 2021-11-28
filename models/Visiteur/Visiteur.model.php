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

    public function getLikes()
    {
        $req = $this->getBdd()->prepare("SELECT fk_id_commentaires, COUNT(fk_id_commentaires) as nbr_likes from intermediaire_like  WHERE fk_id_commentaires IN (
SELECT id FROM commentaires) GROUP BY fk_id_commentaires");
        $req->execute();
        $datas_likes = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $datas_likes;
    }

    public function check_like()
    {

        $req = $this->getBdd()->query("SELECT * FROM intermediaire_like");
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        return $resultat;
    }
}
