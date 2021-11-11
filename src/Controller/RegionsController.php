<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Regions Controller
 *
 * @property \App\Model\Table\RegionsTable $Regions
 * @method \App\Model\Entity\Region[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegionsController extends AppController
{

    public function getByProvince() {
        $this->Authorization->skipAuthorization();
        $province_id = $this->request->getQuery('province_id');

        $regions = $this->Regions->find('all', [
            'conditions' => ['Regions.province_id' => $province_id],
        ]);
        $this->set('regions', $regions);
        $this->set('_serialize', ['regions']);
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
            'contain' => ['Provinces'],
        ];
        $regions = $this->paginate($this->Regions);

        $this->set(compact('regions'));
    }

    /**
     * View method
     *
     * @param string|null $id Region id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $region = $this->Regions->get($id, [
            'contain' => ['Provinces', 'Municipalities'],
        ]);

        $this->set(compact('region'));
    }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $this->Authorization->skipAuthorization();
    //     $region = $this->Regions->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $region = $this->Regions->patchEntity($region, $this->request->getData());
    //         if ($this->Regions->save($region)) {
    //             $this->Flash->success(__('The region has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The region could not be saved. Please, try again.'));
    //     }
    //     $provinces = $this->Regions->Provinces->find('list', ['limit' => 200]);
    //     $this->set(compact('region', 'provinces'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Region id.
    //  * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $this->Authorization->skipAuthorization();
    //     $region = $this->Regions->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $region = $this->Regions->patchEntity($region, $this->request->getData());
    //         if ($this->Regions->save($region)) {
    //             $this->Flash->success(__('The region has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The region could not be saved. Please, try again.'));
    //     }
    //     $provinces = $this->Regions->Provinces->find('list', ['limit' => 200]);
    //     $this->set(compact('region', 'provinces'));
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Region id.
    //  * @return \Cake\Http\Response|null|void Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->Authorization->skipAuthorization();
    //     $this->request->allowMethod(['post', 'delete']);
    //     $region = $this->Regions->get($id);
    //     if ($this->Regions->delete($region)) {
    //         $this->Flash->success(__('The region has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The region could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
