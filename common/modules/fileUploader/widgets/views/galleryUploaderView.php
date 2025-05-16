<?php

/**
 * Created by PhpStorm.
 * Author: Mamura Asretdinova
 * Date: 2/12/20
 * Time: 4:03 AM
 */

/* @var $this \yii\web\View */
/* @var $url string */
/* @var $debug boolean */
/* @var $sizeLimit integer */
/* @var $allowedExtensions string */
/* @var $modelName string */
/* @var $filesHistory string */
/* @var $name string */
/* @var $label string */
/* @var $baseDomain string */

echo '
    <div id="' . $name . '_box" class="fileUploaderBox">        
        <div id="' . $name . '" class="btn btn-primary"> <i class="icon-file icon-white"></i> ' . $label . '</div>
        
        <div class="clearfix"></div>
        <div class="dropZone photoBoxListBox">
            <div id="' . $name . 'FilesList" class="photoBoxList">
                ' . $filesHistory . '
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
';

$this->registerJs("
    function makeDragable() {
        $('#{$name}FilesList').sortable();
        $('#{$name}FilesList').disableSelection();
    }
    
    $('document').ready(function() {
        makeDragable();
    });


    var su = new ss.SimpleUpload({
        button: document.getElementById('$name'),
        url: '$url',
        progressUrl:  '".Yii::$app->getUrlManager()->createUrl('fileUploader/request-upload/upload-progress')."',
        responseType: 'json',
        name: '$name',
        multiple: true,
        debug: $debug,
        data: $params,
        maxSize: $sizeLimit,
        allowedExtensions: $allowedExtensions,
        
        onSubmit: function(filename, extension) {
            var filesList = document.getElementById('{$name}FilesList'),
                progress = document.createElement('div'),
                bar = document.createElement('div'),
                fileFullName = document.createElement('p'),
                fileSize = document.createElement('p'),
                fileImage = document.createElement('div'),
                closeBtn = document.createElement('div'),
                pill = document.createElement('div');

            progress.className = 'fuProgressBar';
            bar.className = 'bar';
            fileFullName.className = 'fileUploaderFileName';
            fileSize.className = 'fileUploaderFileSize';
            pill.className = 'photoBox';
            fileImage.className = 'filesListBoxIcon pull_left';
            closeBtn.className = 'cancelBtn';

            progress.appendChild(bar);
            fileImage.innerHTML = '<i class=\"fu_icon fu_'+extension.toLowerCase()+'\"></i>';
            closeBtn.innerHTML = '<span>&times;</span>';
            fileFullName.innerHTML = fileUploader.escapeTags(filename);

            pill.appendChild(closeBtn);
            pill.appendChild(progress);
            filesList.appendChild(pill);

            this.setProgressBar(bar);
            this.setFileSizeBox(fileSize);
            this.setProgressContainer(pill);
            this.setAbortBtn(closeBtn);
        },

        onComplete: function(filename, response) {
            var filesList = document.getElementById('{$name}FilesList'),
                closeBtn = document.createElement('a'),
                image = document.createElement('img'),
                pill = document.createElement('div');

            if (!response) {
                alert(\"".Yii::t('common', 'Ошибка при загрузке')."\");
                return false;
            }
            
            if (response.success !== true)
                return false;
                                      
            closeBtn.onclick = function(e) {
                e.preventDefault();
                
                this.parentNode.parentNode.removeChild(this.parentNode);
            };
            
            image.src = '". $baseDomain . "/uploads/mini_gallery/' + response.guid + '_mini.' + response.ext;

            closeBtn.innerHTML = '<span>&times;</span>';
            closeBtn.className = 'cancelBtn deleteButton';
            closeBtn.href = '#';
            
            pill.className = 'photoBox';
            pill.setAttribute('data-name', response.guid + '.'+ response.ext);

            pill.appendChild(image);
            pill.appendChild(closeBtn);
            filesList.appendChild(pill);
        },
    });
");