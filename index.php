<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">From:</label>
        <select name="from">
            <option value="NGN">NGN</option>
            <option value="USD" selected>USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
        </select>
        <label for="">To:</label>
        <select name="to">
            <option value="NGN" selected>NGN</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
        </select>
        <input type="number" name="amount" id="" placeholder="Enter amount"/>
        <input type="submit"/>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $from = $_POST['from'];
            $to = $_POST['to'];
            $amt = $_POST['amount'];
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.apilayer.com/exchangerates_data/convert?to=$to&from=$from&amount=$amt",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: text/plain",
                "apikey: API-KEY-HERE"
            ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET"
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            // echo $response;
            $res = json_decode($response);
            echo $res;
        }
    ?>
</body>
</html>