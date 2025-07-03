<?php
include 'config/db.php';
include 'components/header.php';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $connect = new PDO($dsn, $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['payment'] = $_POST;

        $stmt = $connect->prepare("
            INSERT INTO payment_details 
                (card_type, card_number, card_exp_date, card_cvv2)
            VALUES 
                (:card_type, :card_number, :card_exp_date, :card_cvv2)
        ");

        $stmt->execute([
            ':card_type'      => $_POST['card_type'],
            ':card_number'    => $_POST['card_number'],
            ':card_exp_date'  => $_POST['card_exp_date'],
            ':card_cvv2'      => $_POST['card_cvv2']
        ]);

        header("Location: display.php");
        exit();
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<body>
    <div class="py-12 h-full bg-black">
        <div class="mx-auto max-w-3xl px-4">
            <div>
                <img src="images/logo.jpg" alt='Logo' class='mx-auto rounded-md mb-4 w-24 h-24'>
                <h1 class="text-3xl font-bold mb-8 text-center text-white">Enter Your Information</h1>
            </div>            
            <form action="" method="POST" class="bg-white p-8 rounded-lg grid grid-cols-1 sm:grid-cols-2 gap-6 shadow-md">
                
                <!-- Card Type -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Card Type</label>
                    <input type="text" name="card_type" placeholder="Visa, Mastercard or etc." class="mt-1 block w-full bg-gray-100 border-l-4 border-yellow-400 p-2  focus:outline-none focus:ring-2 focus:ring-yellow-400" required/>
                </div>

                <!-- Card Number -->
                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Card Number</label>
                    <input type="text" name="card_number" placeholder="**** **** **** ****" class="mt-1 block w-full bg-gray-100 border-l-4 border-yellow-400 p-2  focus:outline-none focus:ring-2 focus:ring-yellow-400" required />
                </div>

                <!-- Expiration Date -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Expiration Date</label>
                    <input type="text" name="card_exp_date" placeholder="MM/YY" class="mt-1 block w-full bg-gray-100 border-l-4 border-yellow-400 p-2  focus:outline-none focus:ring-2 focus:ring-yellow-400" required/>
                </div>

                <!-- CVV2 -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">CVV</label>
                    <input type="text" name="card_cvv2" placeholder="***" class="mt-1 block w-full bg-gray-100 border-l-4 border-yellow-400 p-2  focus:outline-none focus:ring-2 focus:ring-yellow-400" required/>
                </div>

                <!-- Submit -->
                <div class="sm:col-span-2 flex space-x-4 items-center">
                    <button type="submit" class="bg-yellow-400 cursor-pointer text-black font-semibold py-3 px-6 hover:bg-yellow-300 transition rounded-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

<?php include 'components/footer.php'; ?>
