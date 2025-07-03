<?php
include 'config/db.php';
include 'header.php';

try {
    $connect = new PDO("mysql:host=" . host . "; dbname=" . db, user, pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['customer'] = $_POST;

        $stmt = $connect->prepare("
            INSERT INTO customer_details 
                (first_name, last_name, address, city, state, phone, email)
            VALUES 
                (:first_name, :last_name, :address, :city, :state, :phone, :email)
        ");

        $stmt->execute([
            ':first_name' => $_POST['first_name'],
            ':last_name'  => $_POST['last_name'],
            ':address'    => $_POST['address'],
            ':city'       => $_POST['city'],
            ':state'      => $_POST['state'],
            ':phone'      => $_POST['phone'],
            ':email'      => $_POST['email']
        ]);

        header("Location: payment.php");
        exit();
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<body>
    <div class="py-12 min-h-screen bg-black">
        <div class="mx-auto max-w-4xl px-6">
            <div class="text-center mb-10">
                <img src="images/logo.jpg" alt="Company Logo" class="mx-auto w-24 h-24 -full object-cover shadow-md">
                <h1 class="text-3xl font-bold mt-4 text-white">Customer Information</h1>
                <p class="text-gray-300 mt-2">Please fill in your details to proceed to payment</p>
            </div>

            <form action="" method="POST" class="bg-white p-8 -xl rounded-md grid grid-cols-1 sm:grid-cols-2 gap-6 shadow-lg">
                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name <span class="text-red-500">*</span></label>
                    <input required id="first_name" name="first_name" type="text" placeholder="Your Name" class="mt-1 block w-full bg-gray-100 border-l-5 border-yellow-400 p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name <span class="text-red-500">*</span></label>
                    <input id="last_name" name="last_name" type="text" placeholder="Your Last Name" class="mt-1 block w-full bg-gray-100 border-l-5 border-yellow-400 p-2  focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                    <input required id="email" name="email" type="email" placeholder="Your Email" class="mt-1 block w-full bg-gray-100 border-l-5 border-yellow-400 p-2  focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone <span class="text-red-500">*</span></label>
                    <input required id="phone" name="phone" type="tel" placeholder="Your Phone Number" class="mt-1 block w-full bg-gray-100 border-l-5 border-yellow-400 p-2  focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <!-- Address -->
                <div class="sm:col-span-2">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-red-500">*</span></label>
                    <input id="address" name="address" type="text" placeholder="Your Address" class="mt-1 block w-full bg-gray-100 border-l-5 border-yellow-400 p-2  focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <!-- City -->
                <div>
                    <label for="city" class="block text-sm font-medium text-gray-700">City <span class="text-red-500">*</span></label>
                    <input id="city" name="city" type="text" placeholder="Your City" class="mt-1 block w-full bg-gray-100 border-l-5 border-yellow-400 p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <!-- State -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">State <span class="text-red-500">*</span></label>
                    <input id="state" name="state" type="text" placeholder="Your State" class="mt-1 block w-full bg-gray-100 border-l-5 border-yellow-400 p-2 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <!-- Submit Button -->
                <div class="sm:col-span-2 flex justify-end">
                    <button type="submit" class="bg-yellow-400 text-black font-semibold py-3 px-8  hover:bg-yellow-300 transition focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400 text-xs sm:text-sm">
                        Proceed to Step 2: Enter your Card Information
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

<?php include 'footer.php'; ?>
