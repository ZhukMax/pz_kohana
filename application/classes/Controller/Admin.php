<?php

class Controller_Admin extends Controller_Template {

    public $template = 'admin_template';

    /**
     * @throws HTTP_Exception
     */
    public function before() {
        parent::before();

        // Check admin authentication and role
        if (!Auth::instance()->logged_in('admin')) {
            HTTP::redirect('auth/login');
        }
    }

    /**
     * @throws Kohana_Exception
     */
    public function action_invoices() {
        // Fetch all invoices
        $invoices = ORM::factory('PaymentInvoice')->find_all();

        // Load the view
        $this->template->content = View::factory('admin/invoices')
            ->bind('invoices', $invoices);
    }

    public function action_update_invoice() {
        $invoice_id = $this->request->param('id');
        $status = $this->request->param('status'); // 'approved' or 'cancelled'

        $invoice = ORM::factory('PaymentInvoice', $invoice_id);
        if ($invoice->loaded()) {
            $invoice->status = $status;
            $invoice->save();
        }

        // Redirect back to the invoice list
        $this->redirect('admin/invoices');
    }

    /**
     * @throws View_Exception
     * @throws HTTP_Exception_404
     */
    public function action_download_invoice() {
        $invoice_id = $this->request->param('id');
        $invoice = ORM::factory('PaymentInvoice', $invoice_id);
        if (!$invoice->loaded()) {
            throw new HTTP_Exception_404;
        }

        // Generate PDF
        require_once 'path/to/tcpdf.php';
        $pdf = new TCPDF();

        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);

        // Customize your PDF content here
        $html = View::factory('admin/invoice_pdf')
            ->set('invoice', $invoice)
            ->render();
        $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output PDF document
        // This method has several options, check the TCPDF documentation for more information.
        $pdf->Output('invoice_'.$invoice_id.'.pdf', 'I');
    }

    public function action_payment_systems() {
        $payment_systems = ORM::factory('PaymentSystem')->find_all();
        $this->template->content = View::factory('admin/payment_systems')
            ->bind('payment_systems', $payment_systems);
    }

    /**
     * @throws HTTP_Exception
     */
    public function action_edit_payment_system() {
        $id = $this->request->param('id');
        $payment_system = ORM::factory('PaymentSystem', $id);

        if ($this->request->method() == Kohana_HTTP_Request::POST) {
            $payment_system->values($this->request->post(), array('name', 'is_active'));
            $payment_system->save();

            $this->redirect('admin/payment_systems');
        }

        $this->template->content = View::factory('admin/edit_payment_system')
            ->set('payment_system', $payment_system);
    }

    /**
     * @throws HTTP_Exception
     */
    public function action_create_payment_system() {
        $payment_system = ORM::factory('PaymentSystem');

        if ($this->request->method() == Kohana_HTTP_Request::POST) {
            $payment_system->values($this->request->post(), array('name', 'is_active'));
            $payment_system->save();

            $this->redirect('admin/payment_systems');
        }

        $this->template->content = View::factory('admin/create_payment_system');
    }
}
