<div class="text-center">
    <h3>Profil de <?= $utilisateur['login'] ?></h3>
    <div>

        <div id="login">
            Login : <?= $utilisateur['login'] ?>
        </div>

        <div id="modificationLogin" class="">
            <form method="POST" action="<?= URL; ?>compte/validation_modificationLogin">
                <div class="row">
                    <label for="login" class="col-2 col-form-label">Modification</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="login" value="<?= $utilisateur['login'] ?>" />
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" id="btnValidModifLogin" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div id="mail">
            Mail : <?= $utilisateur['mail'] ?>
        </div>


        <div id="modificationMail" class="">
            <form method="POST" action="<?= URL; ?>compte/validation_modificationMail">
                <div class="row">
                    <label for="mail" class="col-2 col-form-label">Modification</label>
                    <div class="col-8">
                        <input type="mail" class="form-control" name="mail" value="<?= $utilisateur['mail'] ?>" />
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" id="btnValidModifMail" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div id="prenom">
            prenom : <?= $utilisateur['prenom'] ?>
        </div>


        <div id="modificationPrenom" class="">
            <form method="POST" action="<?= URL; ?>compte/validation_modificationPrenom">
                <div class="row">
                    <label for="prenom" class="col-2 col-form-label">Modification</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="prenom" value="<?= $utilisateur['prenom'] ?>" />
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" id="btnValidModifPrenom" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div id="nom">
            nom : <?= $utilisateur['nom'] ?>
        </div>





        <div id="modificationNom" class="">
            <form method="POST" action="<?= URL; ?>compte/validation_modificationNom">
                <div class="row">
                    <label for="nom" class="col-2 col-form-label">Modification</label>
                    <div class="col-8">
                        <input type="text" class="form-control" name="nom" value="<?= $utilisateur['nom'] ?>" />
                    </div>
                    <div class="col-2">
                        <button class="btn btn-success" id="btnValidModifNom" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>










        <div>
            <a href="<?= URL ?>compte/modificationPassword" class="btn btn-warning">Changer le mot de passe</a>
            <button id="btnSupCompte" class="btn btn-danger">Supprimer son compte</button>
        </div>
        <div id="suppressionCompte" class="d-none m-2">
            <div class="alert alert-danger">
                Veuillez confirmer la suppression du compte.
                <br />
                <a href="<?= URL ?>compte/suppressionCompte" class="btn btn-danger">Je Souhaite supprimer mon compte définitivement !</a>
            </div>
        </div>
    </div>