<h1>Page de gestion des commentaires des utilisateurs</h1>
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>commentaire</th>
            <th>id_utilisateur</th>

        </tr>
        <?php foreach ($coms as $com) {
        ?>
            <tr>
                <td><?= $com['id'] ?>

                </td>
                <td><?= $com['commentaire'] ?>
                    <div>
                        <form method="POST" action="<?= URL; ?>administration/validation_modificationCom">
                            <div class="row">

                                <div class="col-8">
                                    <input type="hidden" name="comId" value="<?= $com['id'] ?>" />
                                    <input type="text" class="form-control" name="modifCom" value="<?= $com['commentaire'] ?>" />
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-success" id="btnValidModifCom" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                        </svg>
                                    </button>
                        </form>
                        <form method="POST" action="<?= URL; ?>administration/validation_supprCom">
                            <input type="hidden" name="SupprComId" value="<?= $com['id'] ?>" />
                            <button type="submit" class="btn btn-danger">Suppr</button>
                        </form>
                    </div>
                    </div>

                    </div>
                </td>
                <td><?= $com['id_utilisateur'] ?>
                </td>


            </tr>
        <?php
        } ?>
    </thead>
</table>