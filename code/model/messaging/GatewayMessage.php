<?php

class GatewayMessage extends OmniPaymentMessage
{

    static $db = array(
        "Gateway" => "Varchar",
        "Reference" => "Varchar(255)", //remote id
        "Code" => "Varchar"
    );

    static $summary_fields = array(
        'Type',
        'Reference',
        'Message',
        'Code'
    );
}
