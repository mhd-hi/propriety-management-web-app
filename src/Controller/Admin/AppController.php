<?php

declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        if ($this->request->getSession()->check('Config.language')) {
            I18n::setLocale($this->request->getSession()->read('Config.language'));
        }

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        // Add this line to check authentication result and lock your site
        $this->loadComponent('Authentication.Authentication');
        $this->loadComponent('Authorization.Authorization');


        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

    // in src/Controller/AppController.php
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
       // $this->Authentication->addUnauthenticatedActions(['index', 'view', 'changeLang']);
    }

    function beforeRender(\Cake\Event\EventInterface $event) {
        // store user data in LoggedUser
        if ($this->request->getSession()->check('Auth')) {
            $this->set("LoggedUser", $this->request->getSession()->read('Auth'));
        }
    }
/*
    public function changeLang($lang = 'en_US') {
        $this->Authorization->skipAuthorization();
        I18n::setLocale($lang);
        $this->request->getSession()->write('Config.language', $lang);
        return $this->redirect($this->request->referer());
    }*/
}
