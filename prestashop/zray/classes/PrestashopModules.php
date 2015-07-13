<?php

//namespace ZRayPrestashop;

class PrestashopModules {

    public function beforeExit($context,&$storage){

        $moduleHookInfos = $this->getModulesFromHook();

        //----Get Installed Modules
        foreach(Module::getModulesInstalled() as $module)
        {

            $storage['Modules'][] = array(
                                    'Id Module' => $module['id_module'],
                                    'Name' => $module['name'],
                                    'Active' => $module['active'],
                                    'Version' => $module['version'],
                                    'Enabled' => (Module::isEnabled($module['name'])) ? 'true' : 'false',
                                    'Hook Id' => $moduleHookInfos[$module['id_module']]['id_hook'],
                                    'Hook Title' => $moduleHookInfos[$module['id_module']]['hook_title'],
                                    );

        }
    }

    /**
     * @return array
     */
    public function getModulesFromHook(){
        $modulesFromHook = array();

        foreach(HookCore::getHooks() as $hook){

            foreach(HookCore::getModulesFromHook($hook['id_hook']) as $module){

               $modulesFromHook[$module['id_module']] = array('id_hook'=>$module['id_hook'],'hook_title'=>$module['title']);
            }

        }

        return $modulesFromHook;
    }

} 