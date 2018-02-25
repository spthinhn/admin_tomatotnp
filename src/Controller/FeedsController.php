<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Feeds Controller
 *
 * @property \App\Model\Table\FeedsTable $Feeds
 */
class FeedsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $feeds = $this->paginate($this->Feeds);

        $this->set(compact('feeds'));
        $this->set('_serialize', ['feeds']);
    }

    /**
     * View method
     *
     * @param string|null $id Feed id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $feed = $this->Feeds->get($id, [
            'contain' => []
        ]);

        $this->set('feed', $feed);
        $this->set('_serialize', ['feed']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $feed = $this->Feeds->newEntity();
        if ($this->request->is('post')) {
            
            $feed = $this->Feeds->patchEntity($feed, $this->request->data);
            $feed->created = time();
            if ($result = $this->Feeds->save($feed)) {
                $last_id = $result->id;
                $path = WWW_ROOT."upload/bai-viet/$last_id/";
                if (!file_exists($path)) {
                    mkdir( $path, 0700);
                }
                $feed->thumbnail = "/upload/bai-viet/$last_id/".$feed->files['name'];
                $this->Feeds->save($feed);
                move_uploaded_file($feed->files['tmp_name'], $path. $feed->files['name']);
                $this->Flash->success(__('The feed has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The feed could not be saved. Please, try again.'));
        }
        $this->set(compact('feed'));
        $this->set('_serialize', ['feed']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Feed id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $feed = $this->Feeds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $feed = $this->Feeds->patchEntity($feed, $this->request->data);
            if ($this->Feeds->save($feed)) {
                if (!$feed->files['error']) {
                    $last_id = $feed->id;
                    $path = WWW_ROOT."upload/bai-viet/$last_id/";
                    if (!file_exists($path)) {
                        mkdir( $path, 0700);
                    }
                    $feed->thumbnail = "/upload/bai-viet/$last_id/".$feed->files['name'];
                    $this->Feeds->save($feed);
                    move_uploaded_file($feed->files['tmp_name'], $path. $feed->files['name']);
                }
                $this->Flash->success(__('The feed has been saved.'));

                return $this->redirect(['action' => 'view', $feed->id]);
            }
            $this->Flash->error(__('The feed could not be saved. Please, try again.'));
        }
        $this->set(compact('feed'));
        $this->set('_serialize', ['feed']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Feed id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $feed = $this->Feeds->get($id);
        if ($this->Feeds->delete($feed)) {
            $this->Flash->success(__('The feed has been deleted.'));
        } else {
            $this->Flash->error(__('The feed could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
