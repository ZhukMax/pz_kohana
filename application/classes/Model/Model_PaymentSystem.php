<?php

class Model_PaymentSystem extends ORM {
    protected $_table_name = 'payment_systems';
    protected $_has_many = array(
        'payment_invoices' => array(
            'model' => 'PaymentInvoice',
            'foreign_key' => 'payment_system_id',
        ),
    );
}
