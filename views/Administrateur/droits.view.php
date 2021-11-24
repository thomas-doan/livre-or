<h1>Page de gestion des droits des utilisateurs</h1>
<table class="table">
    <thead>
        <tr>
            <th>Login</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Email</th>

            <th>Rôle</th>
        </tr>
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <tr>
                <td><?= $utilisateur['login'] ?>

                    <div>
                        <form method="POST" action="<?= URL; ?>administration/validation_modificationLogin">
                            <div class="row">

                                <div class="col-5">
                                    <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                                    <input type="text" class="form-control" name="newLogin" value="<?= $utilisateur['login'] ?>" />

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



                </td>
                <td><?= $utilisateur['prenom'] ?>
                    <div>
                        <form method="POST" action="<?= URL; ?>administration/validation_modificationPrenom">
                            <div class="row">

                                <div class="col-5">
                                    <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
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
                </td>
                <td><?= $utilisateur['nom'] ?>

                    <div>
                        <form method="POST" action="<?= URL; ?>administration/validation_modificationNom">
                            <div class="row">

                                <div class="col-5">
                                    <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                                    <input type="text" class="form-control" name="nom" value="<?= $utilisateur['nom'] ?>" />

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


                </td>
                <td><?= $utilisateur['mail'] ?>

                    <div>
                        <form method="POST" action="<?= URL; ?>administration/validation_modificationMail">
                            <div class="row">

                                <div class="col-8">
                                    <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                                    <input type="text" class="form-control" name="mail" value="<?= $utilisateur['mail'] ?>" />

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



                </td>

                <td>
                    <?php if ($utilisateur['role'] === "administrateur") : ?>
                        <?= $utilisateur['role'] ?>
                    <?php else : ?>
                        <form method="POST" action="<?= URL ?>administration/validation_modificationRole">
                            <input type="hidden" name="login" value="<?= $utilisateur['login'] ?>" />
                            <select class="form-select" name="role" onchange="confirm('confirmez vous la modification ?') ? submit() : document.location.reload()">
                                <option value="utilisateur" <?= $utilisateur['role'] === "utilisateur" ? "selected" : "" ?>>Utilisateur</option>
                                <option value="Sutilisateur" <?= $utilisateur['role'] === "Sutilisateur" ? "selected" : "" ?>>Super Utilisateur</option>
                                <option value="administrateur" <?= $utilisateur['role'] === "administrateur" ? "selected" : "" ?>>Administrateur</option>
                            </select>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </thead>
</table>