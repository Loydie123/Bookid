<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <link rel="stylesheet" href="styles.css"> <!-- Add your CSS file if needed -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .confirmation-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .confirmation-container input, .confirmation-container textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .date-fields {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        .date-fields .date-input {
            flex: 1;
        }
        .date-label {
            text-align: left;
            display: block;
            margin-bottom: -5px;
            font-size: 0.9rem;
            color: #555;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background 0.3s ease;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <h2>Payment Confirmation</h2>
        <p>Please upload your proof of payment.</p>
        <form action="upload_proof.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            
            <div class="date-fields">
                <div class="date-input">
                    <label class="date-label">Check-in Date</label>
                    <input type="date" name="check_in" required>
                </div>
                <div class="date-input">
                    <label class="date-label">Check-out Date</label>
                    <input type="date" name="check_out" required>
                </div>
            </div>
            
            <textarea name="remarks" placeholder="Additional Remarks (Optional)"></textarea>
            <input type="file" name="payment_proof" accept="image/*" required>
            <button type="submit" class="btn">Submit</button>
        </form>
        <br>
        <a href="index.php" class="btn">Back to Main Page</a>
    </div>
</body>
</html>
