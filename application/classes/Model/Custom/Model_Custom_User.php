<?php

class Model_Custom_User extends Model_User {
    protected $_table_name = 'users';
    protected $_has_many = array(
        'payment_invoices' => array(
            'model' => 'PaymentInvoice',
            'foreign_key' => 'user_id',
        ),
    );
}
