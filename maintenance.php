<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo WEBSITE_NAME; ?> | Slot Online Terpercaya | Bandar Togel Terbesar</title>
    <link rel="icon" type="image/png" href="secure_admin/<?php echo WEBSITE_FAVICON ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #007bff;
        }

        p {
            color: #333;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            color: #ffffff;
            text-decoration: none;
            background-image: linear-gradient(to right, #007bff, #00bfff);
            transition: background-image 0.3s ease-in-out;
        }

        .button:hover {
            background-image: linear-gradient(to right, #00bfff, #007bff);
        }

        @media screen and (max-width: 768px) {
            .container {
                max-width: 90%;
                margin: 30px auto;
            }
        }

        .footer {
            text-align: center;
            background-color: #007bff;
            color: #ffffff;
            padding: 10px;
            box-shadow: 0 -5px 5px rgba(0, 0, 0, 0.1);
            margin-top: auto;
            
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Maintenance</h1>
        <p>Website sedang dalam perbaikan. Silakan kembali lagi nanti.</p>
        <a class="button" href="index.php">Cek Status</a>
    </div>

    <footer class="footer">
        &copy; <?php echo date('Y'); ?> <?php echo WEBSITE_NAME ?>. All rights reserved.
    </footer>
    <div style="position: fixed; bottom: 250px; left: 5px; z-index: 10; opacity: 0.98;">
                        <a href="<?php echo WA_LINK_ADMIN ?>" target="_blank" rel="noopener"><img class="wabutton" src="assets/whatsapp.gif" alt="Lucky Thunder Wheel" width="80" height="80"></a>
                    </div>
                    <div style="position: fixed; bottom: 65px; left: 5px; z-index: 10; opacity: 0.98;">
                        <a href="<?php echo TELEGRAMLINK_ADMIN ?>" target="_blank" rel="noopener"><img class="wabutton" src="https://i.ibb.co/WnpWfPt/Tele.gif" alt="Telegram <?php echo WEBSITE_NAME; ?>" width="80" height="80"></a>
                    </div>
                    <div style="position: fixed; bottom: 150px; left: 5px; z-index: 10; opacity: 0.98;">
                        <a href="RTP-LIVE-GACOR/index.html" target="_blank" rel="noopener"><img class="wabutton" src="assets/rtp.gif" alt="Bocoran RTP <?php echo WEBSITE_NAME; ?>" width="80" height="80"></a>
                    </div>
                    <?php echo LIVECHATLINK_ADMIN ?>
</body>

</html>