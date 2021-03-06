<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\SessionHelper;
// use Cake\Mailer\Email;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
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
        // $email = new Email();
        // $email->config('default');
        // $email->transport('default');
        // $email->from(['focus.nguyen@yandex.com' => 'Administrator']);
        // $email->to('amelywebmaster@gmail.com');
        // $email->subject('Đăng ký nhân viên');
        // $email->send('test');
        // var_dump($email);die();

        $this->viewBuilder()->layout('admin');
        $this->paginate = [
            'contain' => ['Categories']
        ];
        $products = $this->paginate($this->Products);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }

        $product = $this->Products->get($id, [
            'contain' => ['Categories']
        ]);

        $this->set('product', $product);
        $this->set('_serialize', ['product']);
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
        $this->loadModel('Categories');
        $this->loadModel('ProductImages');
        $categories = $this->Categories->find('all');
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($result = $this->Products->save($product)) {
                $last_id = $result->id;
                $path = WWW_ROOT."upload/san-pham/";
                if (!file_exists($path)) {
                    mkdir( $path, 0775);
                }
                $path = WWW_ROOT."upload/san-pham/$last_id/";
                if (!file_exists($path)) {
                    mkdir( $path, 0775);
                }
                foreach ($product->files as $key => $file) {
                    if ($file['error'] == 0) {
                        $uri = "/upload/san-pham/$last_id/".$file['name'];
                        $image = $this->ProductImages->newEntity();
                        $image->image = $uri;
                        $image->position = $key + 1;
                        $image->product_id = $last_id;
                        $this->ProductImages->save($image);
                        move_uploaded_file($file['tmp_name'], $path. $file['name']);
                    }
                }
                // $feed->thumbnail = "/upload/bai-viet/$last_id/".$feed->files['name'];
                // $this->Feeds->save($feed);

                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        // $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->viewBuilder()->layout('admin');
        $this->loadModel('Categories');
        $this->loadModel('ProductImages');
        $categories = $this->Categories->find('all');
        
        $product = $this->Products->get($id, [
            'contain' => ['ProductImages']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($result = $this->Products->save($product)) {
                $last_id = $result->id;
                $path = WWW_ROOT."upload/san-pham/";
                if (!file_exists($path)) {
                    mkdir( $path, 0775);
                }
                $path = WWW_ROOT."upload/san-pham/$last_id/";
                if (!file_exists($path)) {
                    mkdir( $path, 0775);
                }
                foreach ($product->files as $key => $file) {
                    if ($file['error'] == 0) {
                        $position = $key + 1;
                        $productImages = $this->ProductImages->find('all')->where(['product_id =' => $last_id, 'position =' => $position]);
                        if ($productImages) {
                            foreach ($productImages as $k => $v) {
                                $this->ProductImages->delete($v);
                            }
                        }
                        $uri = "/upload/san-pham/$last_id/".$file['name'];
                        $image = $this->ProductImages->newEntity();
                        $image->image = $uri;
                        $image->position = $position;
                        $image->product_id = $last_id;
                        $this->ProductImages->save($image);
                        move_uploaded_file($file['tmp_name'], $path. $file['name']);
                    }
                }
                // $feed->thumbnail = "/upload/bai-viet/$last_id/".$feed->files['name'];
                // $this->Feeds->save($feed);

                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        // $categories = $this->Products->Categories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'categories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteImage($id = null)
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->loadModel('ProductImages');
        $productImage = $this->ProductImages->get($id);
        if ($this->ProductImages->delete($productImage)) {
            $this->Flash->success(__('The product image has been deleted.'));
        } else {
            $this->Flash->error(__('The product image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
