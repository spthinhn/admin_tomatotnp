<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function index()
    {
        $this->viewBuilder()->layout('login');

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $username = $data["username"];
            $password = $data["password"];
            if ($username == "administrator@tomatotnp.com" && $password == "vX!B)@k,S4tYt6._") {
                $this->request->session()->write('login', true);
                return $this->redirect(['controller' => 'Products', 'action' => 'index']);
            }
            $this->request->session()->write('login', false);
            return $this->redirect(['action' => 'index']);
        }
    }

    public function products()
    {
        if (!$this->request->session()->read('login')) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'index']);
        }
        
        $this->viewBuilder()->layout('admin');
    }
}
