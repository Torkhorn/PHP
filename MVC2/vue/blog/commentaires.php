<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <title>Mon blog</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <link href="vue/blog/style.css" rel="stylesheet" type="text/css" /> 
    </head>
        
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="blog.php">Retour à la liste des billets</a></p>
        <div class="news">
            <h3>
                <?php echo htmlspecialchars($datas_billet['billet']['titre']); ?>
                <em>le <?php echo $datas_billet['billet']['date_creation_fr']; ?></em>
            </h3>
            
            <p>
            <?php
            echo nl2br(htmlspecialchars($datas_billet['billet']['contenu']));
            ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php

        foreach ($datas_billet['commentaires'] as $commentaire)
        {
            ?>
            <p><strong><?php echo htmlspecialchars($commentaire['auteur']); ?></strong> le <?php echo $commentaire['date_commentaire_fr']; ?></p>
            <p><?php echo nl2br(htmlspecialchars($commentaire['commentaire'])); ?></p>
            <?php
        } // Fin de la boucle des commentaires
        ?>
    </body>
</html>
