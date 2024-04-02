<h2>Create Payment System</h2>
<form id="paymentSystemForm" action="<?php echo URL::site('admin/create_payment_system'); ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="is_active">Active:</label>
    <select id="is_active" name="is_active">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>

    <button type="submit">Create</button>
</form>
<script>
    $(document).ready(function() {
        $('#paymentSystemForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Handle success (e.g., displaying a success message or redirecting)
                    alert('Payment system saved successfully.');
                },
                error: function() {
                    // Handle error
                    alert('An error occurred.');
                }
            });
        });
    });
</script>
