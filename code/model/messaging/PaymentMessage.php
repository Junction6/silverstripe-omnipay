<?php

/**
 * Base class for logging messages, transactions etc associated with a payment.
 *
 * @package payment
 */
class PaymentMessage extends DataObject
{
    static $db = array(
        //Created
        "Message" => "Varchar(255)",
        "ClientIp" => "Varchar(39)"
    );

    static $has_one = array(
        "OmniPayment" => "OmniPayment",
        "User" => "Member" //currently logged in user, if appliciable
    );

    static $summary_fields = array(
        'Title' => "Type",
        'Message' => "Message",
        'User.Title' => "User"
    );
    
    public static $default_sort = 'Created DESC';
    public static $indexes = array('Created' => true);
    

    public function getCMSFields()
    {
        return parent::getCMSFields()->makeReadOnly();
    }

    public function onBeforeWrite()
    {
        parent::onBeforeWrite();
        //automatically set the current user id for new payment messages
        if (!$this->UserID && !$this->isInDB()) {
            $this->UserID = Member::currentUserID();
        }
    }

    public function getTitle()
    {
        return $this->i18n_singular_name();
    }
}
