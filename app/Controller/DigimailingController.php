<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP DigimailingController
 * @author papaulo
 */
class DigimailingController extends AppController {

    public $uses = array('Contact', 'Category', 'Post');
    public $theme = 'Admin';
    public $helpers = array(
        'CakePtbr.Formatacao',
        'Html' => array(
            'className' => 'Bootstrap3.BootstrapHtml'
        ),
        'Form' => array(
            'className' => 'Bootstrap3.BootstrapForm'
        ),
        'Modal' => array(
            'className' => 'Bootstrap3.BootstrapModal'
        )
    );

    /**
     * Components
     *
     * @var array
     */
    public $components = array(
        'Paginator',
        'Session'
    );

    public function admin_index() {

        // Add filter
//        $today = date('Y-m-d h:i:s');
//        $start = date('Y-m-d h:i:s', strtotime('-3 week'));
        $conditions = array(
            'AND' =>
            array(
//                'Post.data >=' => $start,
//                'Post.data <=' => $today,
                'Post.status' => 'published'
            )
        );
//        $conditions = array();
        //Transform POST into GET
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            // We need to overwrite the page every time we change the parameters
            $filter_url['page'] = 1;

            // for each filter we will add a GET parameter for the generated url
            foreach ($this->data['Filter'] as $name => $value) {
                if ($value) {
                    // You might want to sanitize the $value here
                    // or even do a urlencode to be sure
                    $filter_url[$name] = urlencode($value);
                }
            }
            // now that we have generated an url with GET parameters, 
            // we'll redirect to that page
            return $this->redirect($filter_url);
        } else {
            // Inspect all the named parameters to apply the filters
            foreach ($this->params['named'] as $param_name => $value) {
                // Don't apply the default named parameters used for pagination
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    // You may use a switch here to make special filters
                    // like "between dates", "greater than", etc
                    if ($param_name == "search") {
                        $conditions['OR'] = array(
                            array('Post.title LIKE' => '%' . $value . '%'),
                            array('Post.body LIKE' => '%' . $value . '%')
                        );
                    } else {
                        $conditions['AND']['Post.' . $param_name] = $value;
                    }
                    $this->request->data['Filter'][$param_name] = $value;
                }
            }
        }

//        print_r($conditions);
//        exit;

        $this->loadModel('Post');
        $this->Post->recursive = 0;
        $this->paginate = array(
            'limit' => 20,
            'conditions' => $conditions
        );
//        $this->set('post', $this->paginate());


        $this->Paginator->settings = $this->paginate;

// similar to findAll(), but fetches paged results
        $data = $this->Paginator->paginate('Post');
        $this->set('posts', $data);

        // get the possible values for the filters and 
        // pass them to the view
        $categories = $this->Post->Category->find('list');

        $this->set(compact('categories'));

// Pass the search parameter to highlight the text
        $this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");
    }

    public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Post.title' => 'asc'
        ),
        'conditions' => array(
            'Post.status' => 'published',
        )
    );

    public function admin_montar() {
        $this->theme = 'admin';
        $posts = array();
        //Transform POST into GET
        if (($this->request->is('post') || $this->request->is('put'))) {
            if (!empty($this->data)) {

                $posts = $this->Post->find('all', array(
                    'conditions' => array(
                        "Post.id" => $this->data['post_id']
                    )
                ));
                $post_first = array_shift($posts);

                $this->set(compact('posts'));
                $this->set('Category', $post_first["Category"]["title"]);
            }
        } else {
            $this->set(compact('posts'));
        }
    }

    public function admin_view() {
        $this->layout = false;
        //Transform POST into GET
        if (($this->request->is('post') || $this->request->is('put'))) {
            if (!empty($this->data)) {
//                print_r($this->data);
                $posts = $this->Post->find('all', array(
                    'conditions' => array(
                        "Post.id" => $this->data['post_id']
                    )
                ));
                $this->set(compact('posts'));
            }
        }
    }

//
//    public function beforeFind() {
//        // perform query validation
//        print_r($queryData);
//        exit();
//
//        if ($queryData['dateRange']['end'] < $queryData['dateRange']['start']) {
//            $this->invalidate(
//                    'data', "End date must be after start date"
//            );
//            return false;
//        }
//        /* repeat for other validation */
//        // add between condition to query
//        $queryData['conditions'][] = array(
//            'Post.data BETWEEN ? AND ?' => array(
//                $queryData['filter']['start'],
//                $queryData['filter']['end'],
//            ),
//        );
//        unset($queryData['dateRange']);
//        // proceed with find
//        return true;
//    }

    function createCampaign() {

        if (!defined('IEM_NO_CONTROLLER')) {
            define('IEM_NO_CONTROLLER', true);
        }
        require_once dirname(__FILE__) . '/admin/index.php';
        require_once (SENDSTUDIO_FUNCTION_DIRECTORY . '/sendstudio_functions.php');
        $sendstudio_functions = new Sendstudio_Functions();
        $newsapi = $sendstudio_functions->GetApi('Newsletters');
        $newsapi->htmlbody = "This is a test newsletter!<br />With <b>HTML</b>!";
        $newsapi->textbody = "Your email client cannot read this email.\n
		      To view it online, please go here: %%webversion%%\n\n
 		      To stop receiving these emails:%%unsubscribelink%%";
        $newsapi->name = "Test Campaign";
        $newsapi->format = "b"; //h for html only, t for text only, b for both
        $newsapi->active = 1; // Is the campaign active? 1 for yes, 0 for no
        $newsapi->archive = 1; // Archive the campaign? 1 for yes, 0 for no
        $newsapi->subject = "Test campaign creation";
        $newsapi->ownerid = 1; // 1 is usually admin
        if (!$newsapi->Create()) {
            echo "Creation failed!";
        } else {
            echo "Newsletter ID: " . $newsapi->newsletterid;
        }
    }

}
