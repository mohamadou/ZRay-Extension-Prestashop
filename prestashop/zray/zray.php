<?php

    // Create new prestashop extension
    $zre = new \ZRayExtension('Prestashop');

    //$prestashopClass = new PrestashopClass();

    $zre->setMetadata(array(
        'logo' => __DIR__ . DIRECTORY_SEPARATOR . 'logo.png',
    ));
    // start tracing
    //$zre->setEnabledAfter('DispatcherCore::dispatch');
    $zre->setEnabledAfter('ControllerCore::run');


   // $zre->traceFunction('FrontControllerCore::init', array($prestashopClass, 'onEnter'), array($prestashopClass, 'onLeave'));

    //---Modules
    include 'classes/PrestashopModules.php';
    $prestashopModules = new PrestashopModules();
    $zre->traceFunction('FrontControllerCore::init',function(){},array($prestashopModules,'beforeExit'));

    //---Hooks
    include 'classes/PrestashopHooks.php';
    $prestashopHooks = new PrestashopHooks();
    $zre->traceFunction('FrontControllerCore::init',function(){},array($prestashopHooks,'beforeExit'));

    //---Cache
    /*include 'classes/PrestashopCache.php';
    $prestashopCache = new PrestashopCache();
    $zre->traceFunction('FrontControllerCore::init',function(){},array($prestashopCache,'beforeExit'));*/

    //---Controller
    include 'classes/PrestashopController.php';
    $prestashopController = new PrestashopController();
    $zre->traceFunction('FrontControllerCore::init',function(){},array($prestashopController,'beforeExit'));

    //---General Info
    include 'classes/PrestashopGeneralInfo.php';
    $prestashopGeneralInfo = new PrestashopGeneralInfo();
    $zre->traceFunction('FrontControllerCore::init',array($prestashopGeneralInfo, 'onEnter'), array($prestashopGeneralInfo, 'onLeave'));

?>