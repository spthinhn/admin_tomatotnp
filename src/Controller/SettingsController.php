<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Settings Controller
 *
 * @property \App\Model\Table\SettingsTable $Settings
 */
class SettingsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('admin');
        $settings = $this->paginate($this->Settings);

        $this->set(compact('settings'));
        $this->set('_serialize', ['settings']);
    }

    /**
     * View method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->layout('admin');
        // $setting = $this->Settings->get($id, [
        //     'contain' => []
        // ]);

        // $this->set('setting', $setting);
        // $this->set('_serialize', ['setting']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $setting = $this->Settings->newEntity();
        if ($this->request->is('post')) {
            $setting = $this->Settings->patchEntity($setting, $this->request->data);
            $check = $this->Settings->find('all')->where(['type =' => $setting->type])->count();
            if ($check > 0) {
                $this->Flash->error(__('Đã tồn tại ... Vui lòng xóa để thêm mới !!!'));

                return $this->redirect(['action' => 'index']);
            }
            $setting->created = time();
            if ($result = $this->Settings->save($setting)) {
                $path = WWW_ROOT."upload/cai-dat/";
                if (!file_exists($path)) {
                    mkdir( $path, 0700);
                }
                switch ($setting->type) {
                    case 'introduce':
                        $last_id = $result->id;
                        $path = WWW_ROOT."upload/cai-dat/$last_id/";
                        if (!file_exists($path)) {
                            mkdir( $path, 0700);
                        }
                        $setting->body = "/upload/cai-dat/$last_id/".$setting->files['name'];
                        $this->Settings->save($setting);
                        move_uploaded_file($setting->files['tmp_name'], $path. $setting->files['name']);
                        break;
                    case 'vision':
                        $last_id = $result->id;
                        $path = WWW_ROOT."upload/cai-dat/$last_id/";
                        if (!file_exists($path)) {
                            mkdir( $path, 0700);
                        }
                        $setting->body = "/upload/cai-dat/$last_id/".$setting->files['name'];
                        $this->Settings->save($setting);
                        move_uploaded_file($setting->files['tmp_name'], $path. $setting->files['name']);
                        break;
                    case 'mission':
                        $last_id = $result->id;
                        $path = WWW_ROOT."upload/bai-viet/$last_id/";
                        if (!file_exists($path)) {
                            mkdir( $path, 0700);
                        }
                        $setting->body = "/upload/bai-viet/$last_id/".$setting->files['name'];
                        $this->Settings->save($setting);
                        move_uploaded_file($setting->files['tmp_name'], $path. $setting->files['name']);
                        break;
                    default:
                        # code...
                        break;
                }
                $this->Flash->success(__('The setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setting could not be saved. Please, try again.'));
        }
        $this->set(compact('setting'));
        $this->set('_serialize', ['setting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $setting = $this->Settings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $setting = $this->Settings->patchEntity($setting, $this->request->data);
            if ($this->Settings->save($setting)) {
                $this->Flash->success(__('The setting has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The setting could not be saved. Please, try again.'));
        }
        $this->set(compact('setting'));
        $this->set('_serialize', ['setting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Setting id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $setting = $this->Settings->get($id);
        if ($this->Settings->delete($setting)) {
            $this->Flash->success(__('The setting has been deleted.'));
        } else {
            $this->Flash->error(__('The setting could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
