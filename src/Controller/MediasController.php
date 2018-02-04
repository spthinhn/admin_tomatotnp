<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Medias Controller
 *
 * @property \App\Model\Table\MediasTable $Medias
 */
class MediasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Albums']
        ];
        $medias = $this->paginate($this->Medias);

        $this->set(compact('medias'));
        $this->set('_serialize', ['medias']);
    }

    /**
     * View method
     *
     * @param string|null $id Media id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $media = $this->Medias->get($id, [
            'contain' => ['Albums']
        ]);

        $this->set('media', $media);
        $this->set('_serialize', ['media']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $media = $this->Medias->newEntity();
        if ($this->request->is('post')) {
            $media = $this->Medias->patchEntity($media, $this->request->data);
            if ($this->Medias->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $albums = $this->Medias->Albums->find('list', ['limit' => 200]);
        $this->set(compact('media', 'albums'));
        $this->set('_serialize', ['media']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Media id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $media = $this->Medias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $media = $this->Medias->patchEntity($media, $this->request->data);
            if ($this->Medias->save($media)) {
                $this->Flash->success(__('The media has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $albums = $this->Medias->Albums->find('list', ['limit' => 200]);
        $this->set(compact('media', 'albums'));
        $this->set('_serialize', ['media']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Media id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $media = $this->Medias->get($id);
        if ($this->Medias->delete($media)) {
            $this->Flash->success(__('The media has been deleted.'));
        } else {
            $this->Flash->error(__('The media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
