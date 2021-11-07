<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Proprietes Controller
 *
 * @property \App\Model\Table\ProprietesTable $Proprietes
 * @method \App\Model\Entity\Propriete[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProprietesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $proprietes = $this->paginate($this->Proprietes);

        $this->set(compact('proprietes'));
    }

    /**
     * View method
     *
     * @param string|null $id Propriete id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {

        $this->Authorization->skipAuthorization();
        /*    $propriete = $this->Proprietes->get($id, [
            'contain' => ['Users', 'Characteristics'],
        ]);*/
        
        $propriete = $this->Proprietes->findBySlug($slug)
            ->contain('Users')
            ->contain('Characteristics')
            ->contain('Municipalities')
            ->firstOrFail();

        $this->set(compact('propriete'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propriete = $this->Proprietes->newEmptyEntity();
        $this->Authorization->authorize($propriete);

        if ($this->request->is('post')) {
            $propriete = $this->Proprietes->patchEntity($propriete, $this->request->getData());

            // Changed: Set the user_id from the current user.
            $propriete->user_id = $this->request->getAttribute('identity')->getIdentifier();


            //les images
            if (!$propriete->getErrors) {
                $image = $this->request->getData('image_file');

                $name = $image->getClientFilename();

                $targetPath = WWW_ROOT . 'img' . DS . 'proprietes' . DS . $name;

                if ($name)
                    $image->moveTo($targetPath);

                $propriete->image = $name;
            }


            if ($this->Proprietes->save($propriete)) {
                $this->Flash->success(__('The propriete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The propriete could not be saved. Please, try again.'));
        }
        $users = $this->Proprietes->Users->find('list', ['limit' => 200]);
        //$this->set(compact('propriete', 'users', 'characteristics'));
       // $users = $this->Proprietes->Users->find('list', ['limit' => 200]);
        $characteristics = $this->Proprietes->Characteristics->find('list', ['limit' => 200]);
        $this->set(compact('propriete', 'characteristics'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Propriete id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug = null)
    {   
        /*
        $propriete = $this->Proprietes->get($id, [
            'contain' => [],
        ]);
        */

        $propriete = $this->Proprietes->findBySlug($slug)
            ->contain('Users')
            ->contain('Characteristics')
            ->firstOrFail();

        $this->Authorization->authorize($propriete);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $propriete = $this->Proprietes->patchEntity($propriete, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Proprietes->save($propriete)) {
                $this->Flash->success(__('The propriete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The propriete could not be saved. Please, try again.'));
        }
        $users = $this->Proprietes->Users->find('list', ['limit' => 200]);
        $characteristics = $this->Proprietes->Characteristics->find('list', ['limit' => 200]);
        $this->set(compact('propriete', 'users', 'characteristics'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Propriete id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propriete = $this->Proprietes->get($id);
        $this->Authorization->authorize($propriete);
        if ($this->Proprietes->delete($propriete)) {
            $this->Flash->success(__('The propriete has been deleted.'));
        } else {
            $this->Flash->error(__('The propriete could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
