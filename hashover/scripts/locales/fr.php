<?php

// Copyright (C) 2015 Jacob Barkdull
// This file is part of HashOver.
//
// I, Jacob Barkdull, hereby release this work into the public domain.
// This applies worldwide. If this is not legally possible, I grant any
// entity the right to use this work for any purpose, without any
// conditions, unless such conditions are required by law.


// Display source code
if (basename ($_SERVER['PHP_SELF']) === basename (__FILE__)) {
	if (isset ($_GET['source'])) {
		header ('Content-type: text/plain; charset=UTF-8');
		exit (file_get_contents (basename (__FILE__)));
	}
}

// French text for forms, buttons, links, and tooltips
$locale = array (
	'comment-form'		=> 'Écrivez ici votre commentaire...',
	'reply-form'		=> 'Écrivez ici votre réponse...',
	'form-tip'		=> 'HTML accepté: &lt;b&gt;, &lt;u&gt;, &lt;i&gt;, &lt;s&gt;, &lt;pre&gt;, &lt;ul&gt;, &lt;ol&gt;, &lt;li&gt;, &lt;blockquote&gt;, &lt;code&gt; échappe le HTML, les URLs sont transformées en liens, et [img]URL ici[/img] fait apparaître une image externe.',
	'post-button'		=> 'Publier ce commentaire',
	'login'			=> 'Connecté',
	'login-tip'		=> 'Connecté (optionnel)',
	'logout'		=> 'Déconnexion',
	'pending-note'		=> 'Ce commentaire est en attente d\'approbation.',
	'deleted-note'		=> 'Ce commentaire a été supprimé.',
	'comment-pending'	=> 'En attente...',
	'comment-deleted'	=> 'Commentaire supprimé!',
	'options'		=> 'Options',
	'cancel'		=> 'Annuler',
	'reply-to-comment'	=> 'Répondre au commentaire',
	'edit-your-comment'	=> 'Éditer votre commentaire',
	'optional'		=> 'Optionnel',
	'required'		=> 'Obligatoire',
	'name'			=> 'Nom',
	'name-tip'		=> 'Nom (%s)',
	'password'		=> 'Mot de passe',
	'password-tip'		=> 'Mot de passe (%s, vous permet d\'éditer ou de supprimer ce commentaire)',
	'confirm-password'	=> 'Confirmer le mot de passe',
	'email'			=> 'Adresse E-mail',
	'email-tip'		=> 'Adresse E-mail (%s, pour les notifications e-mail)',
	'website'		=> 'Site Internet',
	'website-tip'		=> 'Site Internet (%s)',
	'logged-in'		=> 'Vous avez connecté avec succès!',
	'logged-out'		=> 'Vous avez deconnecté avec succès!',
	'comment-needed'	=> 'Vous avez échoué à entrer un commentaire approprié. Utilisez le formulaire ci-dessous.',
	'reply-needed'		=> 'Vous avez échoué à entrer un réponse approprié. Utilisez le formulaire ci-dessous.',
	'field-needed'		=> 'Le champ %s est obligatoire.',
	'post-fail'		=> 'Impossible de publier ce commentaire ! Vous n\'avez pas les permissions suffisantes.',
	'post-reply'		=> 'Publier cette réponse',
	'delete'		=> 'Supprimer',
	'subscribe'		=> 'Avertissez-moi des réponses',
	'subscribe-tip'		=> 'Souscrire aux notifications par e-mail',
	'edit-comment'		=> 'Éditer ce commentaire',
	'save-edit'		=> 'Enregistrer cette modification',
	'no-email-warning'	=> 'Vous ne recevrez pas de notifications en cas de réponse si vous ne fournissez pas d\'e-mail.',
	'invalid-email'		=> 'L\'adresse e-mail que vous avez entré n\'est pas valide.',
	'delete-comment'	=> 'Confirmez-vous la suppression de ce commentaire ?',
	'post-comment-on'	=> array ('Poster un Commentaire', 'Poster un Commentaire sur "%s"'),
	'popular-comments'	=> array ('Commentaire les Plus Populaires', 'Commentaires les Plus Populaires'),
	'showing-comments'	=> array ('Montrer %d Commentaire', 'Montrer %d Commentaires'),
	'count-link'		=> array ('%d Commentaire', '%d Commentaires'),
	'count-replies'		=> array ('%d compter réponse', '%d compter réponses'),
	'sort'			=> 'Trier',
	'sort-ascend'		=> 'Dans l\'ordre',
	'sort-descend'		=> 'Dans l\'ordre inverse',
	'sort-byname'		=> 'Par nom du commentateur',
	'sort-bydate'		=> 'La Plus Récente en Premier',
	'sort-bylikes'		=> 'Par Popularité',
	'threaded'		=> 'Structure de l\'arbre',
	'thread'		=> 'En réponse à %s',
	'thread-tip'		=> 'Aller en haut de la discussion',
	'replies'		=> 'Réponses',
	'edit'			=> 'Éditer',
	'reply'			=> 'Répondre',
	'like'			=> array ('J\'aime', 'Goûts'),
	'liked'			=> 'Aimez',
	'unlike'		=> 'Défaire',
	'like-comment'		=> '\'J\'aime\' ce commentaire',
	'liked-comment'		=> 'Défaire \'J\'aime\'',
	'dislike'		=> array ('Détesté', 'dégoûts'),
	'disliked'		=> 'Détester',
	'dislike-comment'	=> '\'Détesté\' ce commentaire',
	'disliked-comment'	=> 'Vous \'Détester\' ce commentaire',
	'commenter-tip'		=> 'Vous serez notifié par e-mail',
	'subscribed-tip'	=> 'sera notifié par e-mail',
	'unsubscribed-tip'	=> 'n\'a pas souscrit aux notifications',
	'first-comment'		=> 'Soyez le premier à commenter!',
	'show-other-comments'	=> array ('Afficher %d Autre Commentaire', 'Afficher %d Autres Commentaires'),
	'show-number-comments'	=> array ('Afficher %d Commentaire', 'Afficher %d Commentaires'),
	'date-years'		=> array ('Il ya %d an', 'Il ya %d ans'),
	'date-months'		=> array ('Il ya %d un mois', 'Il ya %d mois'),
	'date-days'		=> array ('Il ya %d jour', 'Il ya %d jours'),
	'date-today'		=> '%s aujourd\'hui',
	'untitled'		=> 'Sans titre'
);
