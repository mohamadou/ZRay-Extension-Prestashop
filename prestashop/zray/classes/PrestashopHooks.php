<?php

//namespace ZRayPrestashop;

class PrestashopHooks {

    public function beforeExit($context,&$storage){
        //----Installed Module

        foreach(HookCore::getHooks() as $hook)
        {
            $storage['Hooks'][] = array(
                                    'Id Hook' => $hook['id_hook'],
                                    'Name' => $hook['name'],
                                    'Title' => $hook['title'],
                                    'Description' => $hook['description'],
                                    'Position' => $hook['position'],
                                    'Live Edit' => $hook['live_edit'],
                                    );

        }
    }
} 