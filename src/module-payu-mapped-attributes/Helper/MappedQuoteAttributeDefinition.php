<?php
/**
* 
* PayU Mapped Attributes para Magento 2
* 
* @category     elOOm
* @package      Modulo PayUMappedAttributes
* @copyright    Copyright (c) 2022 elOOm (https://eloom.tech)
* @version      2.0.0
* @license      https://eloom.tech/license
*
*/
declare(strict_types=1);

namespace Eloom\PayUMappedAttributes\Helper;

use Magento\Framework\App\Helper\Context;
use Magento\Quote\Model\Quote;

class MappedQuoteAttributeDefinition extends \Magento\Framework\App\Helper\AbstractHelper {

	public function __construct(Context $context) {
		parent::__construct($context);
	}

	public function getTaxvat(Quote $quote): string {
		if ($quote->getCustomerIsGuest()) {
			return $quote->getBillingAddress()->getVatId();
		}

		return $quote->getCustomerTaxvat()?? $quote->getBillingAddress()->getVatId();
	}
}