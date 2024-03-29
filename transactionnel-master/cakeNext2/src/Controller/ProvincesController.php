<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Provinces Controller
 *
 * @property \App\Model\Table\ProvincesTable $Provinces
 * @method \App\Model\Entity\Province[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProvincesController extends AppController
{


    public function beforeFilter(\Cake\Event\EventInterface $event) {
        parent::beforeFilter($event);
        // for all controllers in our application, make index and view
        // actions public, skipping the authentication check
        $this->Authentication->addUnauthenticatedActions(['getProvinces']);
    }

    public function getProvinces() {
        $this->Authorization->skipAuthorization();
        $provinces = $this->Provinces->find('all',
                ['contain' => ['Regions']]);
        $this->set([
            'provinces' => $provinces,
            '_serialize' => ['provinces']
        ]);
    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $provinces = $this->Provinces->find('all')->all();
        //        $krajRegions = $this->paginate($this->KrajRegions);
        

        $this->set(compact('provinces'));
        
        //$this->viewBuilder()->setLayout('cakephp_default');
        $this->viewBuilder()->setOption('serialize', ['provinces']);
        $this->viewBuilder()->setLayout('provincesSpa');
    }

    public function indexBaked() {
        
        $this->Authorization->skipAuthorization();
        $provinces = $this->paginate($this->Provinces);
        //        $krajRegions = $this->paginate($this->KrajRegions);
        
        $this->set(compact('provinces'));
       //$this->viewBuilder()->setOption('serialize', ['provinces']);
    }


    /**
     * View method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $province = $this->Provinces->get($id, [
            'contain' => ['Municipalities', 'Regions'],
        ]);

        $this->set(compact('province'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $province = $this->Provinces->newEmptyEntity();
        if ($this->request->is('post')) {
            $province = $this->Provinces->patchEntity($province, $this->request->getData());
            if ($this->Provinces->save($province)) {
                $this->Flash->success(__('The province has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The province could not be saved. Please, try again.'));
        }
        $this->set(compact('province'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $province = $this->Provinces->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $province = $this->Provinces->patchEntity($province, $this->request->getData());
            if ($this->Provinces->save($province)) {
                $this->Flash->success(__('The province has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The province could not be saved. Please, try again.'));
        }
        $this->set(compact('province'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Province id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $province = $this->Provinces->get($id);
        if ($this->Provinces->delete($province)) {
            $this->Flash->success(__('The province has been deleted.'));
        } else {
            $this->Flash->error(__('The province could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
