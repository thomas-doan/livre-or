<main>


    <div class="switch_commentaire">
        <?php if (!Securite::estConnecte()) : ?>
            <div>
                <p>Connectez-vous pour écrire votre commentaire</p>

            </div>

        <?php else : ?>
            <div class="poster_com">
                <a href="<?= URL; ?>compte/page_poster_commentaire"><button> Cliquer pour poster </button></a>

            </div>

        <?php endif; ?>

        <?php if (in_array("21", $check_likes)) {
            echo "ok" . "<br>";
        }

        var_dump($check_likes[2]) ?>

    </div>



    <?php
    foreach ($total_commentaires as $com) {
        $time = $com['date'];
        $date = date_create("$time");
        $date_formate = date_format($date, 'd-m-Y');
        $com['id'];



        if (Securite::estConnecte() && $_SESSION['profil']["id"] == $com['id_utilisateur']) {
    ?>
            <div class="container_post_connecter">
                <div class="info_utilisateur_post">
                    <p><?php echo "<b>" . $com['login'] . "</b>" . ' vient de poster le :' . " $date_formate"; ?></p>
                </div>
                <div class="info_com">
                    <p><?= $com['commentaire']; ?></p>
                    <p><?= $com['id']; ?></p>


                </div>
                <?php

                foreach ($res_like as $value) {
                    if ($com['id'] == $value['fk_id_commentaires']) { ?>
                        <div>
                            <p> Nombre de Like : <?= $value['nbr_likes']; ?></p>
                        </div>

                <?php }
                } ?>

                <div>
                    <form method="POST" action="<?= URL; ?>compte/ajout_like_livreOr">
                        <input type="hidden" name="id_com" value="<?= $com['id'] ?>" />
                        <button type="submit">LIKE</button>
                    </form>

                </div>
            </div>


        <?php } elseif (Securite::estConnecte()) { ?>
            <div class="container_post">
                <div class="info_utilisateur_post">
                    <p><?php echo "<b>" . $com['login'] . "</b>" . ' vient deefFEZFEZ poster le :' . " $date_formate"; ?></p>
                </div>
                <div class="info_com">
                    <p><?= $com['commentaire']; ?></p>
                    <p><?= $com['id']; ?></p>


                </div>


                <?php


                foreach ($res_like as $value) {
                    if ($com['id'] == $value['fk_id_commentaires']) { ?>
                        <div>
                            <p> Nombre de Like : <?= $value['nbr_likes']; ?></p>
                        </div>

                <?php }
                } ?>


                <div>

                    <form method="POST" action="<?= URL; ?>compte/ajout_like_livreOr">

                        <input type="hidden" name="id_com" value="<?= $com['id'] ?>" />
                        <button type="submit">LIKE</button>
                    </form>
                </div>
            </div>




        <?php } else { ?>

            <div class="container_post">
                <div class="info_utilisateur_post">
                    <p><?php echo "<b>" . $com['login'] . "</b>" . ' vient de poster le :' . " $date_formate"; ?></p>
                </div>
                <div class="info_com">
                    <p><?= $com['id']; ?></p>
                </div>
                <?php

                foreach ($res_like as $value) {
                    if ($com['id'] == $value['fk_id_commentaires']) { ?>
                        <div>
                            <p> Nombre de Like : <?= $value['nbr_likes']; ?></p>
                        </div>

                <?php }
                } ?>


            </div>

    <?php }
    } ?>

</main>