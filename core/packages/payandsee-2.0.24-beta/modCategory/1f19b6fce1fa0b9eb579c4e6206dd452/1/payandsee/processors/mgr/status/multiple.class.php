<?php

/**
 * Multiple a PasStatus
 */
class PasStatusMultipleProcessor extends modProcessor
{
    public $classKey = 'PasStatus';

    public function process()
    {
        if (!$method = $this->getProperty('method', false)) {
            return $this->failure();
        }
        $ids = json_decode($this->getProperty('ids'), true);

        if (!empty($ids)) {
            foreach ($ids as $id) {
                if (!empty($id)) {
                    @list($id, $class) = $id;
                    if ($response = $this->modx->runProcessor($method,
                        array(
                            'id'          => $id,
                            'class'       => $class,
                            'field_name'  => $this->getProperty('field_name', null),
                            'field_value' => $this->getProperty('field_value', null),
                        ),
                        array('processors_path' => dirname(__FILE__) . '/')
                    )
                    ) {
                        if ($response->isError()) {
                            return $response->getResponse();
                        }
                    }
                }
            }
        } else if ($this->getProperty('field_name') == 'false') {
            if ($response = $this->modx->runProcessor($method,
                array(),
                array('processors_path' => dirname(__FILE__) . '/')
            )
            ) {
                if ($response->isError()) {
                    return $response->getResponse();
                }
            }
        }

        return $this->success();
    }
}

return 'PasStatusMultipleProcessor';