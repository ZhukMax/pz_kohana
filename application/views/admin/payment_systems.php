<h2>Payment Systems</h2>
<a href="<?php echo URL::site('admin/create_payment_system'); ?>">Create New Payment System</a>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($payment_systems as $system): ?>
        <tr>
            <td><?php echo $system->name; ?></td>
            <td><?php echo $system->is_active ? 'Yes' : 'No'; ?></td>
            <td>
                <a href="<?php echo URL::site('admin/edit_payment_system/'.$system->id); ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
