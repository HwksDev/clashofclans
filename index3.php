<?php

$user_id = "14027"; // Enter your CPAGrip user ID here
$key = "96464d90f0e837ea297880b2b6565cae"; // Enter your CPAGrip key here..
$tracking_id = ""; // Optional, enter a tracking id for your niche

$max_offers_to_show = 6; // Change this integer to how many offers you want shown. Default is 6.

// Get the IP.
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
	
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Offers on page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<div class="link-to-thread">
<center>
<p class="link">Click <a href="http://www.cpaelites.com/Thread-On-page-Offers-Tutorial-with-CPAGrip" target="_blank">here</a> to show the code behind this tutorial.</p>
</center>
</div>

<div class="offers-box">
<br>
<center>

<img src="img/download.png" width="55"/>

<h2>Complete a short offer from below</h2>
<p>In order to get your file, you will have to complete an offer from the list below. Keep in mind to use your valid information only!</p>

<?php

$offers_count = 0;
$data = 'http://www.cpagrip.com/common/offer_feed_rss.php?user_id='.$user_id.'&key='.$key.'&ip='.$ip.'&tracking_id='.$tracking_id;
$offers = simplexml_load_file($data);
foreach ($offers->offers->offer as $offer):
        $title=$offer->title;
        $description=$offer->description;
        $offerlink=$offer->offerlink;
		
		if($title == "Complete the survey with CouponsMillion.com"){
		if($offers_count != 0){
		break;
		}}
		
		echo '<p class="each_p_elm" style="">';
		echo '<a class="tip_over_link link_a" href="';
		echo $offerlink;
		echo '" target="_blank" original-title="">';
		echo $title;
		echo '</a></p>';
		
		$offers_count ++;
		if ($offers_count == $max_offers_to_show) break;
endforeach;

?>

</center>
<br>
</div>

</body>
</html>