<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Albums Controller
 *
 * @property \App\Model\Table\AlbumsTable $Albums
 */
class AlbumsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($type)
    {
        // switch ($type) {
        //     case '':
        //         # code...
        //         break;
            
        //     default:
        //         # code...
        //         break;
        // }
        $this->viewBuilder()->layout('admin');
        $albums = $this->paginate($this->Albums->find('all')->where(['type =' => $type]));
        $this->set(compact('albums'));
        $this->set('_serialize', ['albums']);
    }

    /**
     * View method
     *
     * @param string|null $id Album id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $album = $this->Albums->get($id, [
            'contain' => ['Medias']
        ]);

        $this->set('album', $album);
        $this->set('_serialize', ['album']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $album = $this->Albums->newEntity();
        if ($this->request->is('post')) {
            $album = $this->Albums->patchEntity($album, $this->request->data);
            $album->created = time();
            if ($result = $this->Albums->save($album)) {
                $last_id = $result->id;
                $path = WWW_ROOT."upload/album/";
                if (!file_exists($path)) {
                    mkdir( $path, 0700);
                }
                $path = WWW_ROOT."upload/album/$last_id/";
                if (!file_exists($path)) {
                    mkdir( $path, 0700);
                }
                $album->thumbnail = "/upload/album/$last_id/".$album->files['name'];
                $this->Albums->save($album);
                move_uploaded_file($album->files['tmp_name'], $path. $album->files['name']);

                $this->Flash->success(__('The album has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The album could not be saved. Please, try again.'));
        }
        $this->set(compact('album'));
        $this->set('_serialize', ['album']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Album id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->layout('admin');
        $album = $this->Albums->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $album = $this->Albums->patchEntity($album, $this->request->data);
            $album->created = time();
            if ($result = $this->Albums->save($album)) {
                if (!$album->files['error']) {
                    $last_id = $result->id;
                    $path = WWW_ROOT."upload/album/";
                    if (!file_exists($path)) {
                        mkdir( $path, 0700);
                    }
                    $path = WWW_ROOT."upload/album/$last_id/";
                    if (!file_exists($path)) {
                        mkdir( $path, 0700);
                    }
                    $album->thumbnail = "/upload/album/$last_id/".$album->files['name'];
                    $this->Albums->save($album);
                    move_uploaded_file($album->files['tmp_name'], $path. $album->files['name']);
                }

                $this->Flash->success(__('The album has been saved.'));

                return $this->redirect(['action' => 'index', $album->type]);
            }
            $this->Flash->error(__('The album could not be saved. Please, try again.'));
        }
        $this->set(compact('album'));
        $this->set('_serialize', ['album']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Album id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $album = $this->Albums->get($id);
        if ($this->Albums->delete($album)) {
            $this->Flash->success(__('The album has been deleted.'));
        } else {
            $this->Flash->error(__('The album could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index', $album->type]);
    }
}
