<?php

namespace backend\controllers;


class ProjectsController extends NewsController
{
    public $type = 'projects';

    public $imageSize = [
        'w' => 400,
        'h' => 400
    ];
}