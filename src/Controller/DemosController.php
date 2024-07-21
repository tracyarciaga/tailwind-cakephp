<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Demos Controller
 *
 * @method \App\Model\Entity\Demo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DemosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // $demos = $this->paginate($this->Demos);

        // $this->set(compact('demos'));
    }

    /**
     * View method
     *
     * @param string|null $id Demo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $demo = $this->Demos->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('demo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $demo = $this->Demos->newEmptyEntity();
        if ($this->request->is('post')) {
            $demo = $this->Demos->patchEntity($demo, $this->request->getData());
            if ($this->Demos->save($demo)) {
                $this->Flash->success(__('The demo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The demo could not be saved. Please, try again.'));
        }
        $this->set(compact('demo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Demo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $demo = $this->Demos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $demo = $this->Demos->patchEntity($demo, $this->request->getData());
            if ($this->Demos->save($demo)) {
                $this->Flash->success(__('The demo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The demo could not be saved. Please, try again.'));
        }
        $this->set(compact('demo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Demo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $demo = $this->Demos->get($id);
        if ($this->Demos->delete($demo)) {
            $this->Flash->success(__('The demo has been deleted.'));
        } else {
            $this->Flash->error(__('The demo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
