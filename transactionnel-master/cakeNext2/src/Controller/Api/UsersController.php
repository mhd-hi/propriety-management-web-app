<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Http\Exception\UnauthorizedException;
use Cake\Utility\Text;

// src/Controller/UsersController.php
class UsersController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->Jwt->allowUnauthenticated(['index', 'add', 'token']); // 'view',
        $this->Authorization->skipAuthorization();
    }

    public function token() {
        $result = $this->Authentication->getResult();
        if ($this->request->is('post') && !$result->isValid()) {
            throw new UnauthorizedException('Invalid username or password');
        }
        $user = $this->Authentication->getIdentity();
//        var_dump($user->get('id')); exit;
        $this->set([
            'success' => true,
            'data' => [
                'id' => $user->get('id'),
                'token' => $this->Jwt->generateAccessToken($user->get('id'))
            ]
        ]);
        $this->viewBuilder()->setOption('serialize', ['success', 'data']);
    }

    public function index() {
        $users = $this->Users->find('all')->all();
        $this->set('users', $users);
        $this->viewBuilder()->setOption('serialize', ['users']);
    }

    public function view($id) {
        $user = $this->Users->get($id);
        $this->set('user', $user);
        $this->viewBuilder()->setOption('serialize', ['user']);
    }

    public function add() {
        $this->request->allowMethod(['post', 'put']);
        $user = $this->Users->newEntity($this->request->getData());
        $user->uuid = Text::uuid();
        $user->confirmed = 1;
        $data = '';
        $savedUser = $this->Users->save($user);
        if ($savedUser) {
            $message = 'Saved';
            $data = [
                'id' => $user['id'],
                'token' => $this->Jwt->generateAccessToken($user['id'])
            ];
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'data' => $data
        ]);
        $this->viewBuilder()->setOption('serialize', ['message', 'data']);
    }

    public function edit($id) {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $user = $this->Users->get($id);
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if ($this->Users->save($user)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'user' => $user,
        ]);
        $this->viewBuilder()->setOption('serialize', ['user', 'message']);
    }

    public function delete($id) {
        $this->request->allowMethod(['delete']);
        $user = $this->Users->get($id);
        $message = 'Deleted';
        if (!$this->Users->delete($user)) {
            $message = 'Error';
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

}
