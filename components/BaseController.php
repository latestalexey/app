<?php

/**
 * BaseController used to extend other controllers
 * (similar to protected/components/Controller.php in Yii 1.x)
 */

namespace app\components;

use yii\web\Controller;

class BaseController extends Controller {

    public $leftMenu = [
        ['label' => 'Dashboard', 'url' => ['site/index']],
        [
            'label' => 'Peripheral master',
            'items' => [
                ['label' => 'Motherboard', 'url' => ['/asset/motherboard/index']],
                ['label' => 'Keyboard', 'url' => ['/asset/keyboard/index']],
                ['label' => 'Mouse', 'url' => ['/asset/mouse/index']],
                ['label' => 'Harddisk', 'url' => ['/asset/harddisk/index']],
                ['label' => 'Monitor', 'url' => ['/asset/monitor/index']],
            ]
        ],
        [
            'label' => 'Setting Administrator',
            'items' => [
                ['label' => 'Assignments', 'url' => ['/admin/assignment']],
                ['label' => 'Role', 'url' => ['/admin/role']],
                ['label' => 'Permissions', 'url' => ['/admin/permission']],
                ['label' => 'Routes', 'url' => ['/admin/route']],
                ['label' => 'Rules', 'url' => ['/admin/rule']],
                ['label' => 'Menus', 'url' => ['/admin/assignment']],
                
            ]
        ],
       
    ];

}
