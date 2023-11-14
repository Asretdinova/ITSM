<?php
/**
 * Created by PhpStorm.
 * Author: Azamat Mirvosiqov
 * Date: 14.12.2016
 * Time: 20:55
 */

namespace common\modules\fileUploader\models;

use Yii;
use yii\base\Exception;

/**
 * Class Uploader
 * @package common\modules\fileUploader\models
 *
 * @property string $uploadDir
 * @property array $allowedExtensions
 * @property integer $sizeLimit
 * @property string $newFileName
 * @property string $corsInputName
 * @property string $uploadName
 */
class Uploader
{
    private $fileName;
    private $fileSize;
    private $fileExtension;
    private $fileNameWithoutExt;
    private $savedFile;
    private $errorMsg;
    private $isXhr;
    public $uploadDir;
    public $allowedExtensions;
    public $sizeLimit = 5242880; // 5mb
    public $newFileName;
    public $corsInputName = 'XHR_CORS_TARGETORIGIN';
    public $uploadName = 'uploadfile';

    /**
     * Uploader constructor.
     * @param null $uploadName
     * @throws Exception
     */
    function __construct($uploadName = null)
    {
        if ($uploadName !== null) {
            $this->uploadName = $uploadName;
        }

        if (isset($_FILES[$this->uploadName])) {
            $this->isXhr = false;

            if ($_FILES[$this->uploadName]['error'] === UPLOAD_ERR_OK) {
                $this->fileName = $_FILES[$this->uploadName]['name'];
                $this->fileSize = $_FILES[$this->uploadName]['size'];
            } else {
                $this->setErrorMsg($this->errorCodeToMsg($_FILES[$this->uploadName]['error']));
            }

        } elseif (isset($_SERVER['HTTP_X_FILE_NAME']) || isset($_GET[$this->uploadName])) {
            $this->isXhr = true;

            $this->fileName = isset($_SERVER['HTTP_X_FILE_NAME']) ? $_SERVER['HTTP_X_FILE_NAME'] : $_GET[$this->uploadName];

            if (isset($_SERVER['CONTENT_LENGTH'])) {
                $this->fileSize = (int)$_SERVER['CONTENT_LENGTH'];
            } else {
                throw new Exception('Content length is empty');
            }
        }

        if ($this->fileName) {
            $pathInfo = pathinfo($this->fileName);

            if (array_key_exists('extension', $pathInfo) && array_key_exists('filename', $pathInfo)) {
                $this->fileExtension = strtolower($pathInfo['extension']);
                $this->fileNameWithoutExt = $pathInfo['filename'];
            }

            $this->fileName = str_replace(['/', '\\'], '_', $this->fileName);
        }
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @return int
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->fileExtension;
    }

    /**
     * @return mixed
     */
    public function getNameWithoutExt()
    {
        return $this->fileNameWithoutExt;
    }

    /**
     * @return mixed
     */
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * @return mixed
     */
    public function getSavedFile()
    {
        return $this->savedFile;
    }

    /**
     * @param $code
     * @return string
     */
    private function errorCodeToMsg($code)
    {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = Yii::t('common', 'Размер файла превышает лимит');
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = Yii::t('common', 'Файл был загружен только частично');
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = Yii::t('common', 'Файл не был загружен');
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = Yii::t('common', 'Отсутствует временная папка');
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = Yii::t('common', 'Не удалось записать файл на диск');
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = Yii::t('common', 'Загрузка файла остановлена из за недопустимого расширения');
                break;
            default:
                $message = Yii::t('common', 'Неизвестная ошибка');
                break;
        }
        return $message;
    }

    /**
     * @param $ext
     * @param $allowedExtensions
     * @return bool
     */
    private function checkExtension($ext, $allowedExtensions)
    {
        if (!is_array($allowedExtensions))
            return false;

        if (!in_array(strtolower($ext), array_map('strtolower', $allowedExtensions)))
            return false;

        return true;
    }

    /**
     * @param $msg
     */
    private function setErrorMsg($msg)
    {
        if (empty($this->errorMsg))
            $this->errorMsg = $msg;
    }

    /**
     * @param $dir
     * @return mixed|string
     */
    private function fixDir($dir)
    {
        if (empty($dir))
            return $dir;

        $slash = DIRECTORY_SEPARATOR;
        $dir = str_replace('/', $slash, $dir);
        $dir = str_replace('\\', $slash, $dir);
        return substr($dir, -1) == $slash ? $dir : $dir . $slash;
    }

    /**
     * @param $string
     * @return mixed
     */
    private function escapeJS($string)
    {
        return preg_replace_callback('/[^a-z0-9,\._]/iSu', $this->jsMatcher, $string);
    }

    /**
     * @param $matches
     * @return string
     */
    private function jsMatcher($matches)
    {
        $chr = $matches[0];

        if (strlen($chr) == 1)
            return sprintf('\\x%02X', ord($chr));

        if (function_exists('iconv'))
            $chr = iconv('UTF-16BE', 'UTF-8', $chr);

        elseif (function_exists('mb_convert_encoding'))
            $chr = mb_convert_encoding($chr, 'UTF-8', 'UTF-16BE');

        return sprintf('\\u%04s', strtoupper(bin2hex($chr)));
    }

    /**
     * @param $data
     * @return string
     */
    public function corsResponse($data)
    {
        if (isset($_REQUEST[$this->corsInputName])) {
            $targetOrigin = $this->escapeJS($_REQUEST[$this->corsInputName]);
            $targetOrigin = htmlspecialchars($targetOrigin, ENT_QUOTES, 'UTF-8');
            return "<script>window.parent.postMessage('$data','$targetOrigin');</script>";
        }
        return $data;
    }

    /**
     * @param $path
     * @return bool
     */
    private function saveXhr($path)
    {
        if (false !== file_put_contents($path, fopen('php://input', 'r')))
            return true;
        return false;
    }

    /**
     * @param $path
     * @return bool
     */
    private function saveForm($path)
    {
        if (move_uploaded_file($_FILES[$this->uploadName]['tmp_name'], $path))
            return true;
        return false;
    }

    /**
     * @param $path
     * @return bool
     */
    public function save($path)
    {
        if (true === $this->isXhr)
            return $this->saveXhr($path);
        return $this->saveForm($path);
    }

    /**
     * @param null $uploadDir
     * @param null $allowedExtensions
     * @return bool
     */
    public function handleUpload($uploadDir = null, $allowedExtensions = null)
    {
        if (!$this->fileName) {
            $this->setErrorMsg(Yii::t('common', 'Неправильное имя или файл не загружен'));
            return false;
        }

        if ($this->fileSize == 0) {
            $this->setErrorMsg(Yii::t('common', 'Файл пустой'));
            return false;
        }

        if ($this->fileSize > $this->sizeLimit) {
            $this->setErrorMsg(Yii::t('common', 'Размер файла превышает лимит'));
            return false;
        }

        if (!empty($uploadDir))
            $this->uploadDir = $uploadDir;

        $this->uploadDir = $this->fixDir($this->uploadDir);

        if (!is_writable($this->uploadDir)) {
            $this->setErrorMsg(Yii::t('common', 'Папка загрузки недоступна для записи'));
            return false;
        }

        if (is_array($allowedExtensions))
            $this->allowedExtensions = $allowedExtensions;

        if (!empty($this->allowedExtensions)) {
            if (!$this->checkExtension($this->fileExtension, $this->allowedExtensions)) {
                $this->setErrorMsg(Yii::t('common', 'Неверный тип файла'));
                return false;
            }
        }

        $this->savedFile = $this->uploadDir . $this->fileName;

        if (!empty($this->newFileName)) {
            $this->fileName = $this->newFileName;
            $this->savedFile = $this->uploadDir . $this->fileName;

            $this->fileNameWithoutExt = null;
            $this->fileExtension = null;

            $pathInfo = pathinfo($this->fileName);

            if (array_key_exists('filename', $pathInfo))
                $this->fileNameWithoutExt = $pathInfo['filename'];

            if (array_key_exists('extension', $pathInfo))
                $this->fileExtension = strtolower($pathInfo['extension']);
        }

        if (!$this->save($this->savedFile)) {
            $this->setErrorMsg(Yii::t('common', 'Ошибка при сохранении файла'));
            return false;
        }

        return true;
    }

    /**
     * @param null $allowedExtensions
     * @return bool|string
     */
    public function readFileData($allowedExtensions = null)
    {
        if (!$this->fileName) {
            $this->setErrorMsg(Yii::t('common', 'Неправильное имя или файл не загружен'));
            return false;
        }

        if ($this->fileSize == 0) {
            $this->setErrorMsg(Yii::t('common', 'Файл пустой'));
            return false;
        }

        if ($this->fileSize > $this->sizeLimit) {
            $this->setErrorMsg(Yii::t('common', 'Размер файла превышает лимит'));
            return false;
        }

        if (is_array($allowedExtensions))
            $this->allowedExtensions = $allowedExtensions;

        if (!empty($this->allowedExtensions)) {
            if (!$this->checkExtension($this->fileExtension, $this->allowedExtensions)) {
                $this->setErrorMsg(Yii::t('common', 'Неверный тип файла'));
                return false;
            }
        }

        $data = '';
        if (true === $this->isXhr)
            $data = file_get_contents('php://input');
        else
            $data = file_get_contents($_FILES[$this->uploadName]['tmp_name']);

        return $data;
    }
}