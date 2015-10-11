<?php


    // Create new prestashop extension
    $zre = new \ZRayExtension('PrestaShop');


    $zre->setMetadata(array(
        'logo' => __DIR__ . DIRECTORY_SEPARATOR . 'logo.png',
    ));
    // start tracing
    $zre->setEnabledAfter('DispatcherCore::dispatch');

    //---Css Files
    include 'classes/PrestashopCssfiles.php';
    $pestashopCssfiles = new PrestashopCssfiles();
    $zre->traceFunction('ControllerCore::run',function(){},array($pestashopCssfiles,'beforeExit'));

    //---Js Files
    include 'classes/PrestashopJsfiles.php';
    $pestashopJsfiles = new PrestashopJsfiles();
    $zre->traceFunction('ControllerCore::run',function(){},array($pestashopJsfiles,'beforeExit'));

    //---Cookies
    include 'classes/PrestashopCookies.php';
    $prestashopCookies = new PrestashopCookies();
    $zre->traceFunction('ControllerCore::run',function(){},array($prestashopCookies,'beforeExit'));

    //---Modules
    include 'classes/PrestashopModules.php';
    $prestashopModules = new PrestashopModules();
    $zre->traceFunction('ControllerCore::run',function(){},array($prestashopModules,'beforeExit'));

    //---Hooks
    include 'classes/PrestashopHooks.php';
    $prestashopHooks = new PrestashopHooks();
    $zre->traceFunction('ControllerCore::run',function(){},array($prestashopHooks,'beforeExit'));

    //---Controller
    include 'classes/PrestashopController.php';
    $prestashopController = new PrestashopController();
    $zre->traceFunction('ControllerCore::run',function(){},array($prestashopController,'beforeExit'));

    //---General Info
    include 'classes/PrestashopGeneralInfo.php';
    $prestashopGeneralInfo = new PrestashopGeneralInfo();
    $zre->traceFunction('ControllerCore::run',array($prestashopGeneralInfo, 'onEnter'), array($prestashopGeneralInfo, 'onLeave'));

?>
