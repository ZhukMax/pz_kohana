<h2>Create Payment Invoice</h2>

<form action="<?php echo URL::site('user/invoice'); ?>" method="post">
    <label for="payment_system_id">Payment System</label>
    <select id="payment_system_id" name="payment_system_id">
        <?php foreach ($payment_systems as $system): ?>
            <option value="<?php echo $system->id; ?>"><?php echo $system->name; ?></option>
        <?php endforeach; ?>
    </select>

    <label for="details">Payment Details</label>
    <textarea id="details" name="details" required></textarea>

    <label for="amount">Amount</label>
    <input type="text" id="amount" name="amount" required>

    <button type="submit">Create Invoice</button>
</form>

<h2>Your Payment Invoices</h2>
<table>
    <thead>
        <tr>
            <th>Payment System</th>
            <th>Details</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($invoices as $invoice): ?>
            <tr>
                <td><?php echo $invoice->payment_system->name; ?></td>
                <td><?php echo $invoice->details; ?></td>
                <td><?php echo $invoice->amount; ?></td>
                <td><?php echo $invoice->status; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
