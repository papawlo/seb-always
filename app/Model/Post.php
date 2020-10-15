<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 * @property User $User
 * @property Category $Category
 */
class Post extends AppModel {

    public $actsAs = array(
        'CakePHP-Enum-Behavior.Enum' => array(
            'status' => array('published' => 'Publicado', 'draft' => 'Rascunho', 'deleted' => 'Deletado')
        ),
        'CakePtbr.AjusteData' => 'data'
    );
    public $findMethods = array('available' => true);

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'category_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'title' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'data' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'link' => array(
            'url' => array(
                'rule' => array('url'),
                'message' => 'Insira uma url no formato correto. Ex: http://www.exemplo.com.br',
                'allowEmpty' => true,
                'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'imagem' => array(
            'uploadError' => array(
                'rule' => array('uploadError'),
                'message' => 'Algum erro ocorreu ao enviar a imagem',
                'allowEmpty' => true,
                'required' => false,
                //'last' => false, // Stop validation after this rule
                'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'mimeType' => array(
                'rule' => array('mimeType', 'imagem'),
//                'rule' => array('mimeType', array('image/gif')),
                'message' => 'Please only upload images (gif, png, jpg).',
                'allowEmpty' => true,
//                'required' => false,
            ),
            'fileSize' => array(
                'rule' => array('fileSize', '<=', '1MB'),
                'message' => 'O arquivo deve ser menor que 1MB',
                'allowEmpty' => true,
                'required' => false,
            'last' => true, // Stop validation after this rule
//            'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function beforeSave($options = array()) {
        $dir = 'img/uploads/posts' . DS;
        if (!empty($this->data['Post']['imagem']['name'])) {

            $this->data['Post']['imagem'] = $this->upload($this->data['Post']['imagem'], 'img/uploads/posts/');

            $options = array(
                'width' => 150, //Width of the new Image, Default is Original Width
                'height' => 150, //Height of the new Image, Default is Original Height
                'aspect' => false, //Keep aspect ratio
                'crop' => true, //Crop the Image
//                'cropvars' => array(), //How to crop the image, array($startx, $starty, $endx, $endy);
                'autocrop' => true, //Auto crop the image, calculate the crop according to the size and crop from the middle
                'htmlAttributes' => array(), //Html attributes for the image tag
                'quality' => 90, //Quality of the image
                'urlOnly' => true  //Return only the URL or return the Image tag
            );



            $relFile = self::resize($dir . $this->data['Post']['imagem'], $options);
        } else {
            unset($this->data['Post']['imagem']);
        }
    }

    /**
     * Before Validation Callback
     * @param array $options
     * @return boolean
     */
    public function beforeValidate($options = array()) {
        // ignore empty file - causes issues with form validation when file is empty and optional
        if (!empty($this->data[$this->alias]['filename']['error']) && $this->data[$this->alias]['filename']['error'] == 4 && $this->data[$this->alias]['filename']['size'] == 0) {
            unset($this->data[$this->alias]['filename']);
        }
        return parent::beforeValidate($options);
    }

    protected function _findAvailable($state, $query, $results = array()) {
        if ($state === 'before') {
            $query['conditions']['Post.published'] = true;
            if (!empty($query['operation']) && $query['operation'] === 'count') {
                return $query;
            }
            $query['joins'] = array(
                    //array of required joins
            );
            return $query;
        }
        return $results;
    }

    /**
     * Organiza o upload. 
     * @access public 
     * @param Array $imagem 
     * @param String $data 
     */
    public function upload($imagem = array(), $dir = 'img') {
        $dir = WWW_ROOT . $dir . DS;

        if (($imagem['error'] != 0) and ($imagem['size'] == 0)) {
            throw new NotImplementedException('Alguma coisa deu errado, o upload retornou erro ' . $imagem['error'] . ' e tamanho ' . $imagem['size']);
        }

        $this->checa_dir($dir);

        $imagem = $this->checa_nome($imagem, $dir);

        $this->move_arquivos($imagem, $dir);

        return $imagem['name'];
    }

    /**
     * Verifica se o diretório existe, se não ele cria. 
     * @access public 
     * @param Array $imagem 
     * @param String $data 
     */
    public function checa_dir($dir) {
        App::uses('Folder', 'Utility');
        $folder = new Folder();
        if (!is_dir($dir)) {
            $folder->create($dir);
        }
    }

    /**
     * Verifica se o nome do arquivo já existe, se existir adiciona um numero ao nome e verifica novamente 
     * @access public 
     * @param Array $imagem 
     * @param String $data 
     * @return nome da imagem 
     */
    public function checa_nome($imagem, $dir) {
        $imagem_info = pathinfo($dir . $imagem['name']);
        $imagem_nome = $this->trata_nome($imagem_info['filename']) . '.' . $imagem_info['extension'];
        $conta = 2;
        while (file_exists($dir . $imagem_nome)) {
            $imagem_nome = $this->trata_nome($imagem_info['filename']) . '-' . $conta;
            $imagem_nome .= '.' . $imagem_info['extension'];
            $conta++;
        }
        $imagem['name'] = $imagem_nome;
        return $imagem;
    }

    /**
     * Trata o nome removendo espaços, acentos e caracteres em maiúsculo. 
     * @access public 
     * @param Array $imagem 
     * @param String $data 
     */
    public function trata_nome($imagem_nome) {
        $imagem_nome = strtolower(Inflector::slug($imagem_nome, '-'));
        return $imagem_nome;
    }

    /**
     * Move o arquivo para a pasta de destino. 
     * @access public 
     * @param Array $imagem 
     * @param String $data 
     */
    public function move_arquivos($imagem, $dir) {
        App::uses('File', 'Utility');
        $arquivo = new File($imagem['tmp_name']);
        $arquivo->copy($dir . $imagem['name']);
        $arquivo->close();
    }

    public static function resize($path, $options = array()) {
        $options = array_merge(array(
            'width' => null, //Width of the new Image, Default is Original Width
            'height' => null, //Height of the new Image, Default is Original Height
            'aspect' => true, //Keep aspect ratio
            'crop' => false, //Crop the Image
            'cropvars' => array(), //How to crop the image, array($startx, $starty, $endx, $endy);
            'autocrop' => false, //Auto crop the image, calculate the crop according to the size and crop from the middle
            'htmlAttributes' => array(), //Html attributes for the image tag
            'quality' => 90, //Quality of the image
            'urlOnly' => false //Return only the URL or return the Image tag
                ), $options);

        foreach ($options as $key => $option) {
            ${$key} = $option;
        }

        $types = array(1 => "gif", "jpeg", "png", "swf", "psd", "wbmp"); // used to determine image type

        $fullpath = $path;

        if (!file_exists($fullpath) || !is_file($fullpath)) {
            $path = '/app/uploads/no-image.jpg';
            $fullpath = ROOT . $path;
        }

        if (!file_exists($fullpath) || !($size = getimagesize($fullpath))) {
            return; // image doesn't exist
        }
//         print_r(getimagesize($fullpath));
//        exit();

        if ((!isset($width) && !isset($height)) || ($width == 0 && $height == 0)) {
            $width = $size[0];
            $height = $size[1];
        }
        if ($autocrop) {
            $multiplier = 1.0;
            while (($width * $multiplier < $size[0]) && ($height * $multiplier < $size[1])) {
                $multiplier += .01;
            }

            // make SURE we don't run over
            $multiplier -= .01;

            $cropw = floor($width * $multiplier);
            $croph = floor($height * $multiplier);

            $xindent = ($size[0] - $cropw) / 2.0;
            $yindent = ($size[1] - $croph) / 2.0;

            $startx = floor($xindent);
            $endx = $size[0] - ceil($xindent);

            $starty = floor($yindent);
            $endy = $size[1] - ceil($yindent);

            $cropvars = array($startx, $starty, $endx, $endy);
        }

        if (($width > $size[0] || $height > $size[1]) && $autocrop) {
            $multiplier = 1.0;
            while (($width * $multiplier >= $size[0]) || ($height * $multiplier >= $size[1])) {
                $multiplier -= .01;
            }

            $cropw = floor($width * $multiplier);
            $croph = floor($height * $multiplier);

            $xindent = ($size[0] - $cropw) / 2.0;
            $yindent = ($size[1] - $croph) / 2.0;

            $startx = floor($xindent);
            $endx = $size[0] - ceil($xindent);

            $starty = floor($yindent);
            $endy = $size[1] - ceil($yindent);

            $cropvars = array($startx, $starty, $endx, $endy);
        }

        // check that user supplied full start and stop coordinates
        if (count($cropvars) == 4) {
            if ($cropvars[0] > $size[0] || $cropvars[1] > $size[1] || $cropvars[2] > $size[0] || $cropvars[3] > $size[1] || $cropvars[0] < 0 || $cropvars[1] < 0 || $cropvars[2] < 0 || $cropvars[3] < 0) {
                $crop = false;
            }
        } else {
            $crop = false;
        }

        // temporarily set size to this for aspect checking
        if ($crop) {
            $tempsize = array($size[0], $size[1]);
            $size[0] = $cropvars[2] - $cropvars[0];
            $size[1] = $cropvars[3] - $cropvars[1];
        }

        if ($aspect) { // adjust to aspect
            if (($size[1] / $height) > ($size[0] / $width)) // $size[0]:width, [1]:height, [2]:type
                $width = ceil(($size[0] / $size[1]) * $height);
            else
                $height = ceil($width / ($size[0] / $size[1]));
        }

        // set size back
        if ($crop) {
            $size[0] = $tempsize[0];
            $size[1] = $tempsize[1];
        }

        if ($crop) {
            $cropstring = $cropvars[0] . $cropvars[1] . $cropvars[2] . $cropvars[3] . '_';
        } else {
            $cropstring = '';
        }

        $relfile = '/img/cache/' . $width . 'x' . $height . '_' . basename($path); // relative file
//        echo "<br>\n";
//        print_r($relfile);


        $cachefile = WWW_ROOT . DS . 'img' . DS . 'cache' . DS . $width . 'x' . $height . '_' . basename($path); // location on server
//        echo "<br>\n";
//        print_r($cachefile);
        if (!is_dir(WWW_ROOT . DS . 'img' . DS . 'cache')) {
            mkdir(WWW_ROOT . DS . 'img' . DS . 'cache');
        }

//        exit;

        if (file_exists($cachefile)) {
            $csize = getimagesize($cachefile);
            $cached = ($csize[0] == $width && $csize[1] == $height); // image is cached
            if (filemtime($cachefile) < filemtime($fullpath)) { // check if up to date
                $cached = false;
            }
        } else {
            $cached = false;
        }

        if (!$cached) {
            $resize = ($size[0] > $width || $size[1] > $height) || ($size[0] < $width || $size[1] < $height);
        } else {
            $resize = false;
        }

        if ($resize) {
            $image = call_user_func('imagecreatefrom' . $types[$size[2]], $fullpath);

            if ($crop) {
                if (function_exists("imagecreatetruecolor") && ($tempcrop = imagecreatetruecolor($cropvars[2] - $cropvars[0], $cropvars[3] - $cropvars[1]))) {
                    imagealphablending($tempcrop, false);
                    imagealphablending($image, false);
                    imagecopyresampled($tempcrop, $image, 0, 0, $cropvars[0], $cropvars[1], $cropvars[2] - $cropvars[0], $cropvars[3] - $cropvars[1], $cropvars[2] - $cropvars[0], $cropvars[3] - $cropvars[1]);
                } else {
                    $tempcrop = imagecreate($cropvars[2] - $cropvars[0], $cropvars[3] - $cropvars[1]);
                    imagecopyresized($tempcrop, $image, 0, 0, $cropvars[0], $cropvars[1], $cropvars[2] - $cropvars[0], $cropvars[3] - $cropvars[1], $size[0], $size[1]);
                }

                $image = $tempcrop;

                $size[0] = $cropvars[2] - $cropvars[0];
                $size[1] = $cropvars[3] - $cropvars[1];
            }
            if (function_exists("imagecreatetruecolor") && ($temp = imagecreatetruecolor($width, $height))) {
                imagealphablending($temp, false);
                imagealphablending($image, false);
                imagecopyresampled($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            } else {
                $temp = imagecreate($width, $height);
                imagecopyresized($temp, $image, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
            }
            if ($types[$size[2]] == "jpeg") {
                imagejpeg($temp, $cachefile, $quality);
            } else {
                call_user_func("image" . $types[$size[2]], $temp, $cachefile);
            }
            imagedestroy($image);
            imagedestroy($temp);
        } elseif (!$cached) {
            $image = call_user_func('imagecreatefrom' . $types[$size[2]], $fullpath);
            imagejpeg($image, $cachefile, $quality);
        }

        return $relfile;
    }

//    public function afterFind($results, $primary = false) {
//        foreach ($results as $key => $val) {
//            if (isset($val['Post']['data'])) {
//                $results[$key]['Post']['data'] = $this->dateFormatAfterFind(
//                        $val['Post']['data']
//                );
//            }
//        }
//        return $results;
//    }
//
//    public function dateFormatAfterFind($dateString) {
//        return date('d-m-Y', strtotime($dateString));
//    }

    public function mimeType($field = null, $cfield = null) {
//        pr($field);
//        pr($cfield) or die;
        if (isset($field[$cfield]["tmp_name"]) && !empty($field[$cfield]["tmp_name"])) {
            $size = @getimagesize($field[$cfield]["tmp_name"]);
            //pr($size) or die;
            $imgType = array('image/gif', 'image/png', 'image/jpg', 'image/jpeg');
            if (in_array($size['mime'], $imgType)) {
                $return = true;
            } else {
                $return = false;
            }
            return $return;
        }
        return true;
    }

}
