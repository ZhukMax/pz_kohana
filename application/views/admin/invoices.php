<h2>Payment Invoices</h2>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Details</th>
        <th>Amount</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td><?php echo $invoice->id; ?></td>
            <td><?php echo $invoice->user->username; ?></td>
            <td><?php echo $invoice->details; ?></td>
            <td><?php echo $invoice->amount; ?></td>
            <td><?php echo $invoice->status; ?></td>
            <td>
                <a href="<?php echo URL::site('admin/update_invoice/'.$invoice->id.'/approved'); ?>">Approve</a>
                <a href="<?php echo URL::site('admin/update_invoice/'.$invoice->id.'/cancelled'); ?>">Cancel</a>
                <a href="<?php echo URL::site('admin/download_invoice/'.$invoice->id); ?>">Download PDF</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
