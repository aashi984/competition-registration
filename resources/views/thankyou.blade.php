<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right, #e0f7fa, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 8px 18px;
            background-color:rgb(53, 5, 50);
            color: #fff;
            font-size: 14px;
            border: none;
            border-radius: 30px;
            box-shadow: 0 4px 12px rgba(54, 9, 59, 0.2);
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .back-button:hover {
            background-color:rgb(51, 5, 49);
        }

        .thank-you-container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        .thank-you-container h1 {
            font-size: 36px;
            color:rgb(58, 5, 42);
            margin-bottom: 10px;
        }

        .thank-you-container p {
            font-size: 24px;
            color:rgb(2, 66, 17);
            margin-bottom: 30px;
        }

        .eyantra-link a {
            display: inline-block;
            color: #007bff;
            text-decoration: none;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 20px;
            background-color: rgba(0, 123, 255, 0.1);
            transition: background 0.3s;
        }

        .eyantra-link a:hover {
            background-color: rgba(0, 123, 255, 0.2);
        }

        footer {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 30px;
            text-align: center;
            flex-wrap: wrap;
        }

        .social-icons a {
            font-size: 30px;
            color: #666; /* Pencil gray tone */
            transition: transform 0.3s ease;
            text-decoration: none;
        }

        .social-icons a:hover {
            transform: scale(1.1);
        }

        .eyantra-logo img {
            height: 50px;
            filter: grayscale(100%) brightness(0.9) contrast(1.1);
            transition: transform 0.3s ease;
        }

        .eyantra-logo img:hover {
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<a href="{{ route('register.form') }}" class="back-button">Back</a>

<div class="thank-you-container">
    <h1>Thank You for Registering!</h1>
    <p>Your registration was successful.</p>

    <div class="eyantra-link">
        <a href="https://e-yantra.org/#initiatives" target="_blank">Explore about us</a>
    </div>
</div>


    
</footer>

</body>
</html>