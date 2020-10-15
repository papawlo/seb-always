<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP HomeController
 * @author papaulo
 */
class HomeController extends AppController {

    public $components = array('RequestHandler', 'Session');
    public $uses = array(
        'Post',
        'Contact'
    );

    public function index() {

        $this->layout = false;
        $this->loadModel('Post');
        $recentPosts = $this->Post->find('all');
        $this->set('posts', $recentPosts);

        $this->loadModel('Category');
        $categories = $this->Category->find('all');
        $this->set('categories', $categories);
    }

    public function eventos() {
//        $this->layout = 'ajax'; // Or $this->RequestHandler->ajaxLayout, Only use for HTML
        $this->autoLayout = false;
        $this->autoRender = false;

        $mes = "";
        $ano = "";
        $categoria = "";
//        print_r($this->request->query["categoria"]);
//        exit();


        $response_type = "error";
        $posts = array();

        if ($this->request->is('ajax')) {
            $this->disableCache();

            if (isset($this->request->query["mes"])) {
                $mes = $this->request->query["mes"];
            } else {
                $mes = date('m');
            }
            if (isset($this->request->query["ano"])) {
                $ano = $this->request->query["ano"];
            } else {
                $ano = date('Y');
            }
            if (isset($this->request->query["categoria"])) {
                $categoria = $this->request->query["categoria"];
            } else {
                $categoria = false;
            }
            $posts = $this->_getEventosByMesAndAno($mes, $ano, $categoria);
            $response_type = "success";
        } else {
            
        }
        echo json_encode(array("type" => $response_type, "posts" => $posts));
//        $this->render('eventos');
    }

//   

    function _getEventosByMesAndAno($mes = null, $ano = null, $categoria = null) {


        $this->loadModel('Post');
        $this->Post->unbindModel(array('belongsTo' => array('User')));
        $options = array(
            'conditions' =>
            array('AND' => array(
                    'MONTH(Post.data)' => $mes,
                    'YEAR(Post.data)' => $ano,
                    'status' => 'published'
                )
            ),
            'recursive' => 1,
            'order' => array('Post.data'),
        );
        if ($categoria) {
            $options['conditions']['AND']['category_id'] = $categoria;
        }

        $posts = $this->Post->find('all', $options);


        $post_array = array();
        foreach ($posts as $post) {
//            echo date("d-m-Y", strtotime($post["Post"]["data"]));
            $post_array[date("d-m-Y", strtotime($post["Post"]["data"]))][$post["Post"]["id"]] = array(
                "title" => $post["Post"]["title"],
                "content" => $post["Post"]["body"],
                "hour" => date("H:i", strtotime($post["Post"]["data"])),
                "link" => $post["Post"]["link"],
                "category" => $post["Category"]["title"]
                
            );
        }
        return $post_array;
    }

    public function adicionar() {
        $this->RequestHandler->respondAs('json');
        $this->autoRender = false;
        $response = array();

        $this->loadModel('Contact');

        if (!empty($this->data)) {
            $this->Contact->set($this->data);
//            print_r($this->data);
//            exit();


            if ($this->Contact->validates()) {
//                echo "validou";
            } else {
                $response = array("type" => "error", "msg" => "Não foi possível salvar!");
                echo json_encode($response);
                exit;
            }
        }


        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $result = $this->_sendToDigimailing($this->data["Contact"]["nome"], $this->data["Contact"]["email"], $this->data["Contact"]["Category"]);
//                $this->Session->setFlash(__('The contact has been saved.'));
                $response = array("type" => "success", "msg" => "The contact has been saved.");
//                return $this->redirect(array('action' => 'index'));
            } else {
//                $this->Session->setFlash(__('The contact could not be saved. Please, try again.'));
                $response = array("type" => "error", "msg" => "Erro!");
            }
        }
        echo json_encode($response);
    }

    function _sendToDigimailing($nome, $email, $categorias) {
        /*
         * Deve pegar os IDs das listas cadastradas no digimailing
         * 
         * Nao mudar a nao ser que saiba o que esta fazendo!
         */
        $digimailing_list = array(
            1327, // MEI
            1329, // Pequeno Empresário
            1330, // Potencial Empreendedor
            1331, // Micro Empreendedor
            1332, // Produtor Rural
            1333, // Potencial Empresários
        );


        $username = "sebraesempre";
        $usertoken = "5a7e0fc9dffe4ce446b69f88ad21926feae43bc2";

        foreach ($categorias as $categoria_id) {

            $xml = "
        <xmlrequest>
                <username>{$username}</username>
                <usertoken>{$usertoken}</usertoken>
                <requesttype>subscribers</requesttype>
                <requestmethod>AddSubscriberToList</requestmethod>
            <details>
                <emailaddress>{$email}</emailaddress>
                <mailinglist>{$digimailing_list[$categoria_id-1]}</mailinglist>
                <format>html</format>
                <confirmed>yes</confirmed>
                <customfields>
                <item>
                    <fieldid>2</fieldid>
                    <value>{$nome}</value>
                </item>                
                </customfields>
            </details>
        </xmlrequest>
            ";

            $ch = curl_init('http://www.digimailing.com.br/xml.php'); //CHANGE TO THE PATH OF YOUR IEM INSTALLATION
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            $result = @curl_exec($ch);
            if ($result === false) {
                $this->log("Error performing request", 'debug');
            }
//var_dump($result); //for debugging purposes
//Example of how to display returned data
            $xml_doc = simplexml_load_string($result);
            if ($xml_doc->status == 'SUCCESS' && empty($xml_doc->data)) {
//                return 'Status is success. Empty response.';
//                $this->log("Status is success. Empty response.", 'debug');
                CakeLog::write('debug', 'SUCCESS com vazio');
            }
            if ($xml_doc->status == 'SUCCESS') {
                CakeLog::write('debug', 'SUCCESS');
//                $this->log(print_r($xml_doc->data, true), 'debug');
            } else {
                CakeLog::write('debug', 'erro');
//                $this->log('Error is ' . $xml_doc->errormessage, 'debug');
            }
            CakeLog::write('debug', 'categoria ' . $categoria_id);
        }
        return 'success';
    }

    public function beforeRender() {
        if ($this->request->is('ajax')) {
            $this->layout = "ajax";
        }
    }

}
