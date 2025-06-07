<?php
namespace Agento\ShippingPrice\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ShippingPrice extends Template
{
    protected $scopeConfig;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    public function getShippingPrice()
    {
        $price = $this->scopeConfig->getValue('carriers/flatrate/price', ScopeInterface::SCOPE_STORE);
        return $price ?: 0;
    }
}
