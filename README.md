### Stack:
* PHP 5.6
* PHP framework: Kohana 3.3
* MySQL 5.7
* NGINX
### Task:
Need to make a web page with an authorization form.([login.php](application%2Fviews%2Fauth%2Flogin.php), [Auth.php](application%2Fclasses%2FController%2FAuth.php))

There must be two users in the database: admin and user ([init.sql](init.sql), models: [Model_PaymentSystem.php](application%2Fclasses%2FModel%2FModel_PaymentSystem.php), [Model_Custom_User.php](application%2Fclasses%2FModel%2FCustom%2FModel_Custom_User.php), [Model_PaymentInvoice.php](application%2Fclasses%2FModel%2FModel_PaymentInvoice.php) ). Each user has their own section.
#### Section for user:
form for creating a payment invoice: select payment system, filling in payment details and amount table with list of the payment invoices

[invoice.php](application%2Fviews%2Fuser%2Finvoice.php), [User.php](application%2Fclasses%2FController%2FUser.php)
#### Section for admin:
table with list of the payment invoices, the admin can cancel or approve each invoice, also admin can download invoice in pdf format (custom html layout) table with list of the payment systems
form with creating and edititng payment system, if payment system is off, then user cant create payment invoice
#### Payment invoice statuses:
* creating
* approved
* cancelled

All forms should only be submitted with JQuery Ajax, except for downloading.
