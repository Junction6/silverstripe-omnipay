<?php
/**
 * Pin Response
 */

namespace Omnipay\Pin\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Pin Response
 *
 * This is the response class for all Pin REST requests.
 *
 * @see \Omnipay\Pin\Gateway
 */
class Response extends AbstractResponse
{
    public function isSuccessful()
    {
        return !isset($this->data['error']);
    }

    public function getTransactionReference()
    {
        if (isset($this->data['response']['token'])) {
            return $this->data['response']['token'];
        }
    }

    /**
     * Get Card Reference
     *
     * This is used after createCard to get the credit card token to be
     * used in future transactions.
     *
     * @return string
     */
    public function getCardReference()
    {
        if (isset($this->data['response']['token'])) {
            return $this->data['response']['token'];
        }
    }

    /**
     * @deprecated
     */
    public function getCardToken()
    {
        return $this->getCardReference();
    }

    /**
     * Get Customer Reference
     *
     * This is used after createCustomer to get the customer token to be
     * used in future transactions.
     *
     * @return string
     */
    public function getCustomerReference()
    {
        if (isset($this->data['response']['token'])) {
            return $this->data['response']['token'];
        }
    }

    /**
     * @deprecated
     */
    public function getCustomerToken()
    {
        return $this->getCustomerReference();
    }

    public function getMessage()
    {
        if ($this->isSuccessful()) {
            if (isset($this->data['response']['status_message'])) {
                return $this->data['response']['status_message'];
            } else {
                return true;
            }
        } else {
		//some error descriptions come back like 
		//"Fields missing"
		//which is not enough to determine what is missing, the real details
		//are buried a bit further down
		if($messages = $this->data['messages']){
			$suffix = '';
			if(is_array($messages)){
				foreach ($messages as $value){
					if(is_array($value)){
						foreach($value as $key2=>$value2){
							if($key2 == 'message'){
								$suffix .= $value2;
							}
						}
					} else {
						//just in case
						$suffix .= $value . ' ';
					}
				}
			}
		}
            return $this->data['error_description']. ($suffix ? ': ' . $suffix :'');
        }
    }

    public function getCode()
    {
        if (isset($this->data['error'])) {
            return $this->data['error'];
        }
    }
}
