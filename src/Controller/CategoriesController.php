<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->viewBuilder()->layout('admin');
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
        $this->set('_serialize', ['categories']);
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->viewBuilder()->layout('admin');
        $category = $this->Categories->get($id, [
            'contain' => ['Products']
        ]);

        $this->set('category', $category);
        $this->set('_serialize', ['category']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->viewBuilder()->layout('admin');
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($result = $this->Categories->save($category)) {
                $last_id = $result->id;
                $path = WWW_ROOT."upload/danh-muc/";
                if (!file_exists($path)) {
                    mkdir( $path, 0775);
                }
                $path = WWW_ROOT."upload/danh-muc/$last_id/";
                if (!file_exists($path)) {
                    mkdir( $path, 0775);
                }
                $category->thumbnail = "/upload/danh-muc/$last_id/".$category->files['name'];
                $this->Categories->save($category);
                move_uploaded_file($category->files['tmp_name'], $path. $category->files['name']);
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->viewBuilder()->layout('admin');
        $category = $this->Categories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->data);
            if ($result = $this->Categories->save($category)) {
                if ($category->files['name']) {
                    $last_id = $result->id;
                    $path = WWW_ROOT."upload/danh-muc/";
                    if (!file_exists($path)) {
                        mkdir( $path, 0775);
                    }
                    $path = WWW_ROOT."upload/danh-muc/$last_id/";
                    if (!file_exists($path)) {
                        mkdir( $path, 0775);
                    }
                    $category->thumbnail = "/upload/danh-muc/$last_id/".$category->files['name'];
                    $this->Categories->save($category);
                    move_uploaded_file($category->files['tmp_name'], $path. $category->files['name']);
                }
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $this->set(compact('category'));
        $this->set('_serialize', ['category']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
