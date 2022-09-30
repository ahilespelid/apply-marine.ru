<?php

/**
 * Update Clients an PasClient
 */
class PasClientsUpdateProcessor extends modProcessor
{
    public $classKey = 'PasClient';
    public $permission = 'payandsee_client_edit';

    public function checkPermissions()
    {
        return !empty($this->permission) ? $this->modx->hasPermission($this->permission) : true;
    }

    public function process()
    {
        $q = $this->modx->newQuery('modUser');
        $q->leftJoin('modUserProfile', 'Profile');
        $q->leftJoin('PasClient', 'PasClient');
        $q->where(array(
            'Profile.blocked' => 0,
            'PasClient.id'    => null,
        ));

        $q->select('modUser.id');
        if ($q->prepare() && $q->stmt->execute()) {
            $ids = $q->stmt->fetchAll(PDO::FETCH_COLUMN);
        }

        if (!empty($ids)) {
            foreach ($ids as $id) {
                /** @var PasClient $client */
                $client = $this->modx->getObject('PasClient', $id);
            }
        }

        return $this->success('');
    }

}

return 'PasClientsUpdateProcessor';