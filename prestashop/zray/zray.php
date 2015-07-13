<?php

//namespace ZRayPrestashop;

class PrestashopClass {
    public function onEnter($context, &$storage) {
        // called when we enter the traced_method
    }

    public function onLeave($context, &$storage) {

        $storage['generalInfo'][] = array('name'=>'Prestashop Version','value'=> _PS_VERSION_);
        //$storage['generalInfo'][] = array('name'=>'Debug SQL (_PS_DEBUG_SQL)','value'=> _PS_DEBUG_SQL ? 'ON' : 'OFF');
        $storage['generalInfo'][] = array('name'=>'Dev Mode (_PS_MODE_DEV_)','value'=> _PS_MODE_DEV_ ? 'ON' : 'OFF');
        $storage['generalInfo'][] = array('name'=>'Debug Profiling (_PS_DEBUG_PROFILING_)','value'=> _PS_DEBUG_PROFILING_ ? 'ON' : 'OFF');
        $storage['generalInfo'][] = array('name'=>'Template','value'=>_PS_DEFAULT_THEME_NAME_);
        $storage['generalInfo'][] = array('name'=>'Template Directory','value'=> _PS_THEME_DIR_);


    }
}

    // Create new extension - disabled
    $zre = new \ZRayExtension('Prestashop');
    $prestashopClass = new PrestashopClass();

    $zre->setMetadata(array(
        'logo' => __DIR__ . DIRECTORY_SEPARATOR . 'logo.png',
    ));
    // start tracing
    $zre->setEnabledAfter('DispatcherCore::dispatch');


    $zre->traceFunction('FrontControllerCore::init', array($prestashopClass, 'onEnter'), array($prestashopClass, 'onLeave'));

    //---Modules
    include 'classes/PrestashopModules.php';
    $prestashopModules = new PrestashopModules();
    $zre->traceFunction('FrontControllerCore::init',function(){},array($prestashopModules,'beforeExit'));

    //---Hooks
    include 'classes/PrestashopHooks.php';
    $prestashopHooks = new PrestashopHooks();
    $zre->traceFunction('FrontControllerCore::init',function(){},array($prestashopHooks,'beforeExit'));

    //---Cache
    include 'classes/PrestashopCache.php';
    $prestashopCache = new PrestashopCache();
    $zre->traceFunction('FrontControllerCore::init',function(){},array($prestashopCache,'beforeExit'));

    //---Controller
    include 'classes/PrestashopController.php';
    $prestashopController = new PrestashopController();
    $zre->traceFunction('FrontControllerCore::init',function(){},array($prestashopController,'beforeExit'));

?>