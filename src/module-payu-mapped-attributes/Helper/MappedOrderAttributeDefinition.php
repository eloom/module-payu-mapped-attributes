<?php
/**
* 
* PayU Mapped Attributes para Magento 2
* 
* @category     elOOm
* @package      Modulo PayUMappedAttributes
* @copyright    Copyright (c) 2021 Ã©lOOm (https://eloom.tech)
* @version      1.0.0
* @license      https://eloom.tech/license
*
*/
declare(strict_types=1);

namespace Eloom\PayUMappedAttributes\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Sales\Model\Order;

class MappedOrderAttributeDefinition extends \Magento\Framework\App\Helper\AbstractHelper {

	public function __construct(Context $context) {
		parent::__construct($context);
	}

	public function getTaxvat(Order $order) {
		if ($order->getCustomerIsGuest()) {
			return $order->getBillingAddress()->getVatId();
		}

		return $order->getCustomerTaxvat();
	}

	public function getDniType(Order $order) {
		if (null != $order->getBillingAddress()->getDnitype()) {
			return $order->getBillingAddress()->getDnitype();
		}

		return null;
	}
}