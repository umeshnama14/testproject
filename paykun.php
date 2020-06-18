
<?php
echo "<pre>";
print_r($_POST);
// die();
/**
* import checksum generation utility
* You can get this utility from https://developer.paytm.com/docs/checksum/
*/
require_once("encdec_paytm.php");

/* initialize an array with request parameters */
$paytmParams = array(

    /* Find your MID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
    "MID" => "RAZRTE06486674196242",

    /* this will be SUBSCRIBE */
    "REQUEST_TYPE" => "SUBSCRIBE",

    /* Find your WEBSITE in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
    "WEBSITE" => "WEBSTAGING",

    /* Find your INDUSTRY_TYPE_ID in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys */
    "INDUSTRY_TYPE_ID" => "Retail",

    /* WEB for website and WAP for Mobile-websites or App */
    "CHANNEL_ID" => "WEB",

    /* Enter your unique order id */
    "ORDER_ID" => "OREDR0190410144454", //ORD".rand(),

    /* unique id that belongs to your customer */
    "CUST_ID" => "CUST7986778",

    /* customer's mobile number */
    "MOBILE_NO" => "8989898989",

    /* customer's email */
    "EMAIL" => "umesh.nama@razrmedia.com",
  
    /**
    * Amount in INR that is to be charged upfront at the time of creating subscription
    * this should be numeric with optionally having two decimal points
    */
    "TXN_AMOUNT" => "200",

    /* this is unique subscription id that belongs to your customer's subscription service */
    // "SUBS_SERVICE_ID" => "SUBS7878044",

    /* enter subscription amount type here, possible value is either FIX or VARIABLE */
    "SUBS_AMOUNT_TYPE" => "VARIABLE",

    /* enter maximum renewal amount that can be charged for this subscription */
    "SUBS_MAX_AMOUNT" => "2",

    /* enter subscription frequency here */
    "SUBS_FREQUENCY" => "1",

    /* enter subscription frequency unit here */
    "SUBS_FREQUENCY_UNIT" => "DAY",

    /* enter subscription enable retry value here, possible value is either 1 or 0 */
    "SUBS_ENABLE_RETRY" => "1",

    /* enter subscription expiry date here in YYYY-MM-DD format */
    "SUBS_EXPIRY_DATE" => "2020-06-10",

    /**
    Represents if add money is allowed at the time of subscription or not.
    Possible Values are:
    Y : In case of insufficient balance in wallet, renewal transaction will fail
    N : In case of insufficient balance in wallet, add money from users saved card will be attempted
    */
    "SUBS_PPI_ONLY" => "Y",

    /* payment mode that is to be charged on renewal, possible value are: "CC" => "DC" */
    "SUBS_PAYMENT_MODE" => "CC",

    /* on completion of transaction, we will send you the response on this URL */
    // "CALLBACK_URL" => "http://localhost/paykun.php",

);

/**
* Generate checksum for parameters we have
* Find your Merchant Key in your Paytm Dashboard at https://dashboard.paytm.com/next/apikeys 
*/
$checksum = getChecksumFromArray($paytmParams, "e40TY@Ovcr6XMzZ#");

/* for Staging */
$url = "https://securegw-stage.paytm.in/order/process";

/* for Production */
// $url = "https://securegw.paytm.in/order/process";

/* Prepare HTML Form and Submit to Paytm */
?>
<html>
    <head>
        <title>Merchant Checkout Page</title>
    </head>
    <body>
        <center><h1>Please do not refresh this page...</h1></center>
        <form method='post' action='<?php echo $url; ?>' name='paytm_form'>
                <?php
                    foreach($paytmParams as $name => $value) {
                        echo '<input type="text" name="' . $name .'" value="' . $value . '"><br>';
                    }
                ?>
                <input type="text" name="CHECKSUMHASH" value="<?php echo $checksum ?>">
                <input type="submit" name="" value="submit">
        </form>
        <script type="text/javascript">
            // document.paytm_form.submit();
        </script>
    </body>
</html>




<?php
die();
function slugify($sluggable)
    {
        $sluggable = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $sluggable);
        $sluggable = trim($sluggable, '-');
        if( function_exists('mb_strtolower') ) { 
            $sluggable = mb_strtolower( $sluggable );
        } else { 
            $sluggable = strtolower( $sluggable );
        }
        $sluggable = preg_replace("/[\/_|+ -]+/", '-', $sluggable);

        return $sluggable;
    }

 echo slugify("http-hronerazrstudiocom-admin-news");
    die();
        $paymentId = "95727-89731-51597-94283"; //"61713-13997-61618-07995";
        // $this->gateway = new Payment('177734551897983', '838CE560C93E786B69CFC80A39D2F35B', 'D7A59A4282F67E61450E02EFDD08DF8C', true); // here we pass last parameter as false to enable sandbox mode.
        
        try {

            https://checkout.paykun.com/api/v1/merchant/transaction/95727-89731-51597-94283/

            // if($this->isLive == true) {
                // $cUrl        = 'https://api.paykun.com/v1/merchant/transaction/95727-89731-51597-94283'; // . $paymentId . '/';
            // } else {
            //     $cUrl        = 'https://sandbox.paykun.com/api/v1/merchant/transaction/' . $paymentId . '/';
            // }
// $cUrl = 'https://api.paykun.com/api/v1/merchant/transaction/95727-89731-51597-94283/';

 $cUrl = 'https://api.paykun.com/v1/merchant/transaction/91579-41779-13253-89778';
 // $cUrl = 'https://api.paykun.com/api/v1/merchant/transaction/95727-89731-51597-94283/';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $cUrl);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            // curl_setopt($ch, CURLOPT_HTTPHEADER, array("MerchantId:961973658710391", "AccessToken:BD935D44BB0190F59FFBB6FE556D91F0"));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array("MerchantId:177734551897983", "AccessToken:838CE560C93E786B69CFC80A39D2F35B"));
            if( isset($_SERVER['HTTPS'] ) ) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
            } else {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            }
            $response       = curl_exec($ch);
            $error_number   = curl_errno($ch);
            $error_message  = curl_error($ch);

            $res = json_decode($response, true);
            curl_close($ch);
            echo "<pre>";
            print_r($res);

            return ($error_message) ? null : $res;

        } catch (Errors\ValidationException $e) {

            throw new Errors\ValidationException("Server couldn't respond, ".$e->getMessage(), $e->getCode(), null);
            return null;

        }


        die();

 	 function encrypt ($text, $key) {
      $iv = random_bytes(16);
      $value = openssl_encrypt(serialize($text), 'AES-256-CBC', $key, 0, $iv);
      $bIv = base64_encode($iv);
      $mac = hash_hmac('sha256', $bIv.$value, $key);
      $c_arr = ['iv'=>$bIv,'value'=>$value,'mac'=>$mac];
      $json = json_encode($c_arr);
      $crypted = base64_encode($json);
      return $crypted;
 	}

 	$encrypt = encrypt("amount::70;billing_address::billing_address;billing_city::billing_city;billing_country::billing_country;billing_state::billing_state;billing_zip::billing_zip;customer_email::customer_email;customer_name::stome;customer_phone::customer_phone;failure_url::https://enow.local/transactions/paykun/callback;order_no::".'ORD'.uniqid().";product_name::coindoo;shipping_address::shipping_address;shipping_city::shipping_city;shipping_country::shipping_country;shipping_state::shipping_state;shipping_zip::shipping_zip;success_url::https://enow.local/transactions/paykun/callback;udf_1::6fdeb846a2504439b49fbf3a2e10fb7a", "825A1DF1BADA0A418B8D64B738D16F9B");

?>
<html lang="en">
<head>
    <title>Processing Payment...</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<body>
<div>
    Processing your payment, please wait...
</div>
<form action="https://sandbox.paykun.com/payment" method="post" name="server_request" target="_top" >
    <table width="80%" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <input type="text" name="encrypted_request" id="encrypted_request" value="<?php echo $encrypt; ?>" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="merchant_id" id="merchant_id" value="961973658710391" />
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="access_token" id="access_token" value="BD935D44BB0190F59FFBB6FE556D91F0">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="is_live" id="is_live" value="false">
            </td>
        </tr>
    </table>
    <button>10RS</button>
</form>
<script type="text/javascript">
    // document.server_request.submit();
</script>
</body>
</html>
