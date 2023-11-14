<?php
/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 14.12.2016
 * Time: 21:14
 */

namespace common\modules\fileUploader\widgets;

use Yii;
use common\modules\fileUploader\models\LoadFile;
use common\modules\fileUploader\models\Assets;
use yii\helpers\Url;
use yii\widgets\InputWidget;

/**
 * Class FileUploader
 * @package common\modules\fileUploader\widgets
 *
 *
 */
class GalleryUploaderUploader extends InputWidget
{
    public $name = null;
    public $modelName = null;
    public $label = null;
    public $debug = false;
    public $params = [];
    public $sizeLimit = false;
    public $allowedExtensions = ['jpg'];
    public $initDataParams = null;
    public $baseDomain = 'http://itsm.uz';
//    public $baseDomain = 'http://localhost:20080';

    /**
     * @return null|string
     */
    public function run()
    {
        if (!empty($this->name)) {
            Assets::register($this->view);

            if (empty($this->label)) {
                $this->label = Yii::t('common', 'Выберите фотографии');
            }

            $filesHistory = null;
            if (!is_null($this->initDataParams)){
                foreach ($this->initDataParams as $guid) {
                    $path = pathinfo($guid);

                    $filesHistory .= "
                        <div class='photoBox' data-name='{$guid}'>
                            <img src='{$this->baseDomain}/uploads/mini_gallery/{$path['filename']}_mini.{$path['extension']}'>
                            <a class='cancelBtn deleteButton' href='#'><span>×</span></a>
                        </div>
                    ";
                }
            }


            $this->params = array_merge(['_name' => $this->name], $this->params);

            return $this->render('galleryUploaderView', [
                'baseDomain' => $this->baseDomain,
                'name' => $this->name,
                'modelName' => $this->modelName,
                'url' => Url::to(['/fileUploader/gallery-uploader/upload']),
                'label' => $this->label,
                'debug' => ($this->debug) ? 'true' : 'false',
                'params' => json_encode($this->params),
                'allowedExtensions' => json_encode($this->allowedExtensions),
                'filesHistory' => $filesHistory,
                'sizeLimit' => ($this->sizeLimit == false && !is_int($this->sizeLimit)) ? 'false' : $this->sizeLimit,
            ]);
        }

        return null;
    }
}