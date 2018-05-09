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
    public function add($album_id)
    {
        $this->viewBuilder()->layout('admin');
        $media = $this->Medias->newEntity();
        if ($this->request->is('post')) {
            $media = $this->Medias->patchEntity($media, $this->request->data);
            $media->album_id = $album_id;
            if ($result = $this->Medias->save($media)) {
                if ($media->type == "image") {
                    $last_id = $result->id;
                    $path = WWW_ROOT."upload/thu-vien/";
                    if (!file_exists($path)) {
                        mkdir( $path, 0775);
                    }
                    $path = WWW_ROOT."upload/thu-vien/$album_id/";
                    if (!file_exists($path)) {
                        mkdir( $path, 0775);
                    }
                    $path = WWW_ROOT."upload/thu-vien/$album_id/$last_id/";
                    if (!file_exists($path)) {
                        mkdir( $path, 0775);
                    }
                    $media->uri = "/upload/thu-vien/$album_id/$last_id/".$media->files['name'];
                    $this->Medias->save($media);
                    move_uploaded_file($media->files['tmp_name'], $path. $media->files['name']);
                }
                $this->Flash->success(__('The media has been saved.'));
                return $this->redirect(['controller' => 'Albums', 'action' => 'view', $album_id]);
            }
            $this->Flash->error(__('The media could not be saved. Please, try again.'));
        }
        $albums = $this->Medias->Albums->find('list', ['limit' => 200]);
        $this->set('album_id', $album_id);
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
        $media = $this->Medias->get($id);
        if ($this->Medias->delete($media)) {
            $this->Flash->success(__('The media has been deleted.'));
        } else {
            $this->Flash->error(__('The media could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Albums', 'action' => 'view', $media->album_id]);
    }
}
