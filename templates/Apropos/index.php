<!DOCTYPE html>
<html>
<head>
    Mohamed Hafdi Idrissi<br/><br/>

    <h3>420-267 MO Développer un site Web et une application pour Internet.</h3>
    <h4>Automne 2021, Collège Montmorency</h4><br/>
</head>

<body>
<h4>Partie 1:</h4>
    <p>Nous pouvons commencer par ajouter un utilisateur avec role (admin-agent-secretaire), nom, email ainsi que mot de passe.<br/> 
    Un email se ra envoyer pour validation du compte. <br/>
        
    <br/><p>Après cela, on pourra ajouter une propriété avec options: adresse, type, vendu, image, prix et characteristiques.<br/> 
    On pourra aussi modifier, supprimer une propriete seulement si cest lutilisateur qui la crée.
    <br/>Évidemment, si c'est pas le cas, une erreur aparrait et vous informe que vous n'etes pas autorisé dans cette page. 
    L'affichage des fiches des propriétés peut etre vu par tout le monde. </p>
    <br/><p>On aura aussi les options de se deconnecter et se connecter dans un autre compte.<br/>
     Changer de langues parmi les suivantes: Anglais, francais, italien.
    <br/><br/>

<h4>Partie 2:</h4>Monopage: Dans cette partie du travail, on a une monopage qui a un style différent. On peut constater que<br/>
     toute action visant lajout, la modification se fait directement dans la monopage.</p><br/>
    <p>Dans la page /provinces on apercoit qu'on a utilisé bootstrap pour donner un style à la page.</p><br/>

    <p>Lorsque j'ajoute une proprieté(dans /proprietes), j'ai le champ municipality qui permet d'utiliser l'autocomplete. Ces données proviennent de la bd. </p>
    </p><p>On tape 2 caractères et on aura un choix de municipalités contenant ces 2 caracteres 
    <p>Aussi, on peut remarquer dans ma base de données des ajouts de tables telles que provinces, regions et municipalités.</p>
    <p>On pourra donc ajouter 1. une province(dans /provinces), 2. une region(/regions) 3. une municipalité(/municipalities) </p>
    <p>Cette application a été parametrée pour regrouper une certaine municipalité dans une region et une region dans une province.</p>
    <br/><p>Admin: On a la page regions qui peut etre vue par tous le monde lorsque le mode admin est desactivé. On pourra seulement consulter les données. <br/>On gère aussi les droits lorsqu'une personne ecrit /add dans le navigateur, il recevra une erreur.</p>
    </p><p> - Pour avoir tous les droits, on tape /admin/regions et on se connecte avec le compte administrateur. <br/>On pourra donc avoir toutes les actions disponibles. 
    </p><br/><p>Finalement, on aura à disposition des liens vers d'autres tables afin de faciliter l'accès.
    <br/><p><a href="http://www.databaseanswers.org/data_models/real_estate_agent/index.htm">Le lien vers le diagramme</a></p>
    <?= @$this->Html->image('immobilier.png') ?><br/>
    <?= @$this->Html->image('dbase.png') ?><br/>





</body>
</html>