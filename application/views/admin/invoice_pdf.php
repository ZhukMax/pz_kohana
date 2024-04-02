<h1>Invoice #<?php echo $invoice->id; ?></h1>
<p><strong>User:</strong> <?php echo $invoice->user->username; ?></p>
<p><strong>Details:</strong> <?php echo $invoice->details; ?></p>
<p><strong>Amount:</strong> <?php echo $invoice->amount; ?></p>
<p><strong>Status:</strong> <?php echo $invoice->status; ?></p>
