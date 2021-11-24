<main>

    <div class="post_commentaire">
        <p class="consigne">Poster votre commentaire</p>
        <form method="POST" action="<?= URL; ?>compte/validation_postCommentaire">
            <input type="hidden" name='id' value="<?= $utilisateur['id'] ?>" />
            <textarea class="champ_com" name='message'></textarea>
            <button class="btnValidCom" type="submit">Envoyer</button>

        </form>

    </div>
</main>