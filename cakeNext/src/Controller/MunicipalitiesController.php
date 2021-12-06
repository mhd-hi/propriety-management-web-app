<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Municipalities Controller
 *
 * @property \App\Model\Table\MunicipalitiesTable $Municipalities
 * @method \App\Model\Entity\Municipality[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MunicipalitiesController extends AppController
{
    public function initialize(): void {
        parent::initialize();
        $this->viewBuilder()->setLayout('cakephp_default');
    }

    public function findMunicipalities() {
        $this->Authorization->skipAuthorization();
        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->getQuery('term');
            $results = $this->Municipalities->find('all', array(
                'conditions' => array('Municipalities.name LIKE ' => '%' . $name . '%')
            ));
//debug($results); exit;
            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['Provinces', 'Regions'],
        ];
        $municipalities = $this->paginate($this->Municipalities);

        $this->set(compact('municipalities'));
    }

    /**
     * View method
     *
     * @param string|null $id Municipality id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $municipality = $this->Municipalities->get($id, [
            'contain' => ['Provinces', 'Regions', 'Proprietes'],
        ]);

        $this->set(compact('municipality'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        $municipality = $this->Municipalities->newEmptyEntity();
        if ($this->request->is('post')) {
            $municipality = $this->Municipalities->patchEntity($municipality, $this->request->getData());
            if ($this->Municipalities->save($municipality)) {
                $this->Flash->success(__('The municipality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The municipality could not be saved. Please, try again.'));
        }
        $provinces = $this->Municipalities->Provinces->find('list', ['limit' => 200]);
        $regions = $this->Municipalities->Regions->find('list', ['limit' => 200]);
        $this->set(compact('municipality', 'provinces', 'regions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Municipality id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $municipality = $this->Municipalities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $municipality = $this->Municipalities->patchEntity($municipality, $this->request->getData());
            if ($this->Municipalities->save($municipality)) {
                $this->Flash->success(__('The municipality has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The municipality could not be saved. Please, try again.'));
        }
        $provinces = $this->Municipalities->Provinces->find('list', ['limit' => 200]);
        $regions = $this->Municipalities->Regions->find('list', ['limit' => 200]);
        $this->set(compact('municipality', 'provinces', 'regions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Municipality id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->Authorization->skipAuthorization();
        $this->request->allowMethod(['post', 'delete']);
        $municipality = $this->Municipalities->get($id);
        if ($this->Municipalities->delete($municipality)) {
            $this->Flash->success(__('The municipality has been deleted.'));
        } else {
            $this->Flash->error(__('The municipality could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
