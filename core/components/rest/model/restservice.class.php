<?php

require_once MODX_CORE_PATH . 'model/modx/rest/modrestservice.class.php';

class restService extends modRestService
{
    /**
     * Check permissions for the request.
     *
     * @return boolean
     */
    public function checkPermissions()
    {
    // Здесь позже напишем логику проверки авторизации и прав    
        return true;
    }
}