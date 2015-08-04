<?php

class PrestashopGeneralInfo {
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
