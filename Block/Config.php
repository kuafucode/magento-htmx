<?php
namespace Kuafu\Htmx\Block;

use Magento\Framework\View\Element\Template;

class Config extends Template
{
    public function getConfig()
    {
        return [
            "disableSelector" => $this->getExcludedElements(),
            "scrollIntoViewOnBoost" => $this->_scopeConfig->isSetFlag('web/htmx/auto_scroll', 'store'),
        ];
    }

    public function getExcludedElements()
    {
        $css = '[hx-disable], [data-hx-disable], [data-role="tocart-form"], [data-block="minicart"]';
        return $css . $this->_scopeConfig->getValue('web/htmx/excluded_elements', 'store');
    }

    public function getConfigJson()
    {
        return json_encode($this->getConfig());
    }

    public function isEnabled()
    {
        $this->_scopeConfig->isSetFlag('web/htmx/active', 'store');
    }
}
