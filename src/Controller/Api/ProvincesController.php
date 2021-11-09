<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

// src/Controller/ProvincesController.php
class ProvincesController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Authorization->skipAuthorization();
    }

    public function index() {
//        $this->Authorization->skipAuthorization();

        $provinces = $this->Provinces->find('all')->all();
        $this->set('provinces', $provinces);
        $this->viewBuilder()->setOption('serialize', ['provinces']);
    }



    public function view($id) {
        $province = $this->Provinces->get($id);
        $this->set('province', $province);
        $this->viewBuilder()->setOption('serialize', ['province']);
    }

    public function add() {
        $this->request->allowMethod(['post', 'put']);
        $province = $this->Provinces->newEntity($this->request->getData());
        if ($this->Provinces->save($province)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'province' => $province,
        ]);
        $this->viewBuilder()->setOption('serialize', ['province', 'message']);
    }

    public function edit($id) {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $province = $this->Provinces->get($id);
        $province = $this->Provinces->patchEntity($province, $this->request->getData());
        if ($this->Provinces->save($province)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'province' => $province,
        ]);
        $this->viewBuilder()->setOption('serialize', ['province', 'message']);
    }

    public function delete($id) {
        $this->request->allowMethod(['delete']);
        $province = $this->Provinces->get($id);
        $message = 'Deleted';
        if (!$this->Provinces->delete($province)) {
            $message = 'Error';
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

}
