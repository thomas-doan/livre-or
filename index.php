<?php
session_start();

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once("./controllers/Toolbox.class.php");
require_once("./controllers/Securite.class.php");
require_once("./controllers/Visiteur/Visiteur.controller.php");
require_once("./controllers/Utilisateur/Utilisateur.controller.php");
require_once("./controllers/Administrateur/Administrateur.controller.php");
$visiteurController = new VisiteurController();
$utilisateurController = new UtilisateurController();
$administrateurController = new AdministrateurController();

try {
    if (empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }

    switch ($page) {
        case "accueil":
            $visiteurController->accueil();
            break;
        case "login":
            $visiteurController->login();



            break;
        case "validation_login":
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $utilisateurController->validation_login($login, $password);
            } else {
                Toolbox::ajouterMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
                header('Location: ' . URL . "login");
            }
            break;
        case "creerCompte":
            $visiteurController->creerCompte();
            break;
        case "validation_creerCompte":
            if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['mail'] && !empty($_POST['nom']) && !empty($_POST['prenom']))) {

                if ($_POST['password'] == $_POST['confirm_password']) {
                    $login = Securite::secureHTML($_POST['login']);
                    $prenom = Securite::secureHTML($_POST['prenom']);
                    $nom = Securite::secureHTML($_POST['nom']);
                    $password = Securite::secureHTML($_POST['password']);
                    $mail = Securite::secureHTML($_POST['mail']);
                    $utilisateurController->validation_creerCompte($login, $prenom, $nom, $password, $mail);
                } else {
                    Toolbox::ajouterMessageAlerte("le Mdp n'est pas identique", Toolbox::COULEUR_ROUGE);
                    header("Location: " . URL . "creerCompte");
                }
            } else {
                Toolbox::ajouterMessageAlerte("Les 6 informations sont obligatoires !", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "creerCompte");
            }
            break;

        case "livreOr":
            $visiteurController->livreOr();


            break;
        case "compte":
            if (!Securite::estConnecte()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "login");
            } elseif (!Securite::checkCookieConnexion()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous reconnecter !", Toolbox::COULEUR_ROUGE);
                setcookie(Securite::COOKIE_NAME, "", time() - 3600);
                unset($_SESSION["profil"]);
                header("Location: " . URL . "login");
            } else {
                Securite::genererCookieConnexion(); //regénération du cookie
                switch ($url[1]) {
                    case "ajout_like_livreOr":
                        $utilisateurController->set_like($_POST['id_com']);
                        break;

                    case "suppr_like_livreOr":
                        $utilisateurController->unset_like($_POST['id_com']);
                        break;


                    case "profil":
                        $utilisateurController->profil();
                        break;
                    case "page_poster_commentaire":
                        $utilisateurController->page_poster_commentaire();
                        break;
                    case "validation_postCommentaire":
                        $utilisateurController->poster_com(Securite::secureHTML($_POST['id']), Securite::secureHTML($_POST['message']));

                        break;
                    case "deconnexion":
                        $utilisateurController->deconnexion();
                        break;
                    case "validation_modificationLogin":
                        $utilisateurController->validation_modificationLogin(Securite::secureHTML($_POST['login']));

                        break;
                    case "validation_modificationPrenom":
                        $utilisateurController->validation_modificationPrenom(Securite::secureHTML($_POST['prenom']));
                        break;
                    case "validation_modificationNom":
                        $utilisateurController->validation_modificationNom(Securite::secureHTML($_POST['nom']));
                        break;
                    case "validation_modificationMail":
                        $utilisateurController->validation_modificationMail(Securite::secureHTML($_POST['mail']));
                        break;
                    case "modificationPassword":
                        $utilisateurController->modificationPassword();
                        break;
                    case "validation_modificationPassword":
                        if (!empty($_POST['ancienPassword']) && !empty($_POST['nouveauPassword']) && !empty($_POST['confirmNouveauPassword'])) {
                            $ancienPassword = Securite::secureHTML($_POST['ancienPassword']);
                            $nouveauPassword = Securite::secureHTML($_POST['nouveauPassword']);
                            $confirmationNouveauPassword = Securite::secureHTML($_POST['confirmNouveauPassword']);
                            $utilisateurController->validation_modificationPassword($ancienPassword, $nouveauPassword, $confirmationNouveauPassword);
                        } else {
                            Toolbox::ajouterMessageAlerte("Vous n'avez pas renseigné toutes les informations", Toolbox::COULEUR_ROUGE);
                            header("Location: " . URL . "compte/modificationPassword");
                        }
                        break;
                    case "suppressionCompte":
                        $utilisateurController->suppressionCompte();
                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }
            }
            break;
        case "administration":
            if (!Securite::estConnecte()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "Login");
            } elseif (!Securite::estAdministrateur()) {
                Toolbox::ajouterMessageAlerte("Vous n'avez le droit d'être ici", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "accueil");
            } else {
                switch ($url[1]) {
                    case "droits":
                        $administrateurController->droits();
                        break;

                    case "coms":
                        $administrateurController->coms();
                        break;

                    case "validation_modificationCom":
                        $administrateurController->validation_modificationAdminCom($_POST['comId'], $_POST['modifCom']);
                        break;

                    case "validation_supprCom":
                        $administrateurController->validation_modificationSupprAdminCom($_POST['SupprComId']);
                        break;

                    case "validation_modificationLogin":
                        $administrateurController->validation_modificationAdminLogin($_POST['login'], $_POST['newLogin']);
                        break;

                    case "validation_modificationPrenom":
                        $administrateurController->validation_modificationAdminPrenom($_POST['login'], $_POST['prenom']);
                        break;

                    case "validation_modificationNom":
                        $administrateurController->validation_modificationAdminNom($_POST['login'], $_POST['nom']);
                        break;

                    case "validation_modificationMail":
                        $administrateurController->validation_modificationAdminMail($_POST['login'], $_POST['mail']);
                        break;

                    case "validation_modificationRole":
                        $administrateurController->validation_modificationRole($_POST['login'], $_POST['role']);
                        break;
                    default:
                        throw new Exception("La page n'existe pas");
                }
            }
            break;
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $visiteurController->pageErreur($e->getMessage());
}
