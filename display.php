<?php
include 'config/db.php';
include 'header.php';

$customer = $_SESSION['customer'] ?? [];
$payment = $_SESSION['payment'] ?? [];
?>

<body>
    <div class="py-12 h-full bg-black">
        <div class="mx-auto max-w-3xl px-4 bg-white p-8 rounded-lg shadow-md">
            <div>
                <img src="images/logo.jpg" alt='Logo' class='mx-auto mb-4 w-24 h-24'>
                <h1 class="text-3xl font-bold mb-8 text-center text-white">Enter Your Information</h1>
            </div>
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Customer Details</h3>
                <ul class="space-y-1 text-gray-600">
                    <li><strong>First Name:</strong> <?= htmlspecialchars($customer['first_name']) ?></li>
                    <li><strong>Last Name:</strong> <?= htmlspecialchars($customer['last_name']) ?></li>
                    <li><strong>Address:</strong> <?= htmlspecialchars($customer['address']) ?></li>
                    <li><strong>City:</strong> <?= htmlspecialchars($customer['city']) ?></li>
                    <li><strong>State:</strong> <?= htmlspecialchars($customer['state']) ?></li>
                    <li><strong>Phone:</strong> <?= htmlspecialchars($customer['phone']) ?></li>
                    <li><strong>Email:</strong> <?= htmlspecialchars($customer['email']) ?></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Payment Details</h3>
                <ul class="space-y-1 text-gray-600">
                    <li><strong>Card Type:</strong> <?= htmlspecialchars($payment['card_type']) ?></li>
                    <li><strong>Card Number:</strong> <?= htmlspecialchars($payment['card_number']) ?></li>
                    <li><strong>Expiration Date:</strong> <?= htmlspecialchars($payment['card_exp_date']) ?></li>
                    <li><strong>CVV:</strong> <?= htmlspecialchars($payment['card_cvv2']) ?></li>
                </ul>
            </div>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>
