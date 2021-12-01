<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?=
        $this->Html->css(['normalize.min',
            'milligram.min',
            'cake',
            //'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'
            'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
        ])
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php
        echo $this->Html->script([
            'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',
//            'https://code.jquery.com/ui/1.12.1/jquery-ui.js',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'
                ], ['block' => 'scriptLibraries']
        );
    ?>

</head>
<body>


    <nav class="navbar navbar-dark bg-dark" role="navigation">
    <div class="top-nav-title">
        <a class="navbar-brand"href="<?= $this->Url->build('/') ?>">Acceuil</a>
    </div>

    <button class="btn btn-light">
        <?php
            if (isset($LoggedUser)) {
                echo $this->Html->link('Logout:  ' . $LoggedUser->email, ['controller' => 'Users', 'action' => 'logout']);
            } else {
                echo $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login']);
            }
        ?> /
        <?= $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?>

            <?= $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?>
            
            <?= $this->Html->link('Italian', ['action' => 'changeLang', 'it_IT'], ['escape' => false]) ?></button>
            <button class="btn btn-light"><a href="<?= $this->Url->build('/Apropos') ?>">À propos</a></button> 
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
    <?= $this->fetch('scriptLibraries') ?>
    <?= $this->fetch('script'); ?>
    <?= $this->fetch('scriptBottom') ?> 
</body>
</html>
