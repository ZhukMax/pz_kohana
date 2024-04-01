<?php

class Controller_User extends Controller_Template {

    public $template = 'template';

    public function before() {
        parent::before();

        if (!Auth::instance()->logged_in('user')) {
            HTTP::redirect('auth/login');
        }
    }

    public function action_invoice() {
        $user = Auth::instance()->get_user();
        $payment_systems = ORM::factory('PaymentSystem')->find_all();

        if ($this->request->method() == HTTP_Request::POST) {
            // Process the form submission
            $invoice = ORM::factory('PaymentInvoice');
            $invoice->user_id = $user->id;
            $invoice->payment_system_id = $this->request->post('payment_system_id');
            $invoice->details = $this->request->post('details');
            $invoice->amount = $this->request->post('amount');
            $invoice->status = 'creating';
            $invoice->save();

            // Redirect or show a success message
        }

        // Retrieve all invoices for the current user
        $invoices = ORM::factory('PaymentInvoice')
            ->where('user_id', '=', $user->id)
            ->find_all();

        // Load the view
        $this->template->content = View::factory('user/invoice')
            ->bind('payment_systems', $payment_systems)
            ->bind('invoices', $invoices);
    }
}
