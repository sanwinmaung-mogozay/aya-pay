<?php

namespace Ayapay\CyberSource;

use Omnipay\Common\AbstractGateway;
use Ayapay\CyberSource\Message\CompletePurchaseRequest;
use Ayapay\CyberSource\Message\PurchaseRequest;

/**
 * CyberSource Secure Acceptance Hosted Checkout Gateway
 *
 * @link https://www.cybersource.com/developers/getting_started/integration_methods/secure_acceptance_wm/
 */
class HostedGateway extends AbstractGateway
{
    public function getName()
    {
        return 'AYA Pay';
    }

    public function getDefaultParameters()
    {
        return [
            'customerKey'           => '',
            'consumerSecretKey'     => '',
            'testMode'              => false,
        ];
    }
    
    /**
     * Get the customer key for the merchant account
     *
     * @return string
    **/
    public function getCustomerKey()
    {
        return $this->getParameter('customerKey');
    }

    /**
     * Set the customer key for the merchant account
     *
     * @param string $value  ASCII Alphanumeric + punctuation string, maximum 36 characters
     *
     * @return AbstractRequest
    **/
    public function setCustomerKey($value)
    {
        return $this->setParameter('customerKey', $value);
    }

    /**
     * Get the consumer secret key for the merchant account
     *
     * @return string
    **/
    public function getConsumerSecretKey()
    {
        return $this->getParameter('consumerSecretKey');
    }

    /**
     * Set the consumer secret key for the merchant account
     *
     * @param string $value  ASCII Alphanumeric + punctuation string, maximum 36 characters
     *
     * @return AbstractRequest
    **/
    public function setConsumerSecretKey($value)
    {
        return $this->setParameter('consumerSecretKey', $value);
    }

    /**
     * Redirect the customer to CyberSource to make a purchase
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Ayapay\CyberSource\Message\PurchaseRequest', $parameters);
    }

    /**
     * Complete a purchase process
     *
     * @param array $parameters
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest('\Ayapay\CyberSource\Message\CompletePurchaseRequest', $parameters);
    }
}
