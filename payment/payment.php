<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
</head>

<body>

    <form id="razorpayForm" method="POST">
        <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" />
        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
        <input type="hidden" name="razorpay_signature" id="razorpay_signature" />
    </form>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            key: "rzp_test_v8RpKfnrf9dqx7",
            amount: 100, // Amount in the smallest currency unit (in this case, paise)
            currency: "INR",
            name: "Acme Corp",
            description: "A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami",
            image: "https://example.com/your_logo.jpg",
            prefill: {
                name: "Jenish Kanpariya",
                email: "janishkanpariya@gmail.com"
            },
            theme: {
                color: "#FFD700", // Button color
                background: "#FAFAFA", // Background color
                text: "#444444" // Text color
            },
            handler: function(response) {
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                document.getElementById('razorpay_signature').value = response.razorpay_signature;
                document.getElementById('razorpayForm').submit();
            }
        };

        var rzp;

        // Function to initialize Razorpay and open the payment gateway when "Make Payment" button is clicked
        function openRazorpay() {
            rzp = new Razorpay(options);
            rzp.open();
        }
    </script>

    <!-- Button to make payment -->
    <button onclick="openRazorpay()">Make Payment</button>

</body>

</html>