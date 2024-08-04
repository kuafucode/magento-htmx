<?php
namespace Kuafu\Htmx\Block;

use Magento\Framework\View\Element\Template;

class Config extends Template
{
    public function getConfig()
    {
        return [
            "disableSelector" => '[hx-disable], [data-hx-disable], [data-role="tocart-form"], [data-block="minicart"]',
        ];
    }

    public function getConfigJson()
    {
        return json_encode($this->getConfig());
    }
}
