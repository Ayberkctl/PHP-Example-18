<?php
function cURL($url) {

// Create a new cURL resource
$curl = curl_init();

if (!$curl) {
    die("Couldn't initialize a cURL handle");
}


curl_setopt_array($curl, [
    CURLOPT_URL => $url,  // Set the file URL to fetch through cURL
    CURLOPT_RETURNTRANSFER => false, // Returns the status code
    CURLOPT_FOLLOWLOCATION => true, // Follow redirects, if any
    CURLOPT_FAILONERROR => true, // Fail the cURL request if response code = 400 (like 404 errors)
    CURLOPT_CONNECTTIMEOUT => 10, // Wait 10 seconds to connect and set 0 to wait indefinitely
    CURLOPT_TIMEOUT => 50, // Execute the cURL request for a maximum of 50 seconds
    CURLOPT_SSL_VERIFYHOST => false, // Do not check the SSL certificates
    CURLOPT_SSL_VERIFYPEER => false // Do not check the SSL certificates
]);
   


// Fetch the URL and save the content in $html variable
$html = curl_exec($curl);

// Check if any error has occurred
if (curl_errno($curl))
{
    echo 'cURL error: ' . curl_error($curl);
}
else
{
    // cURL executed successfully
    print_r(curl_getinfo($curl));
    // will display the page contents i.e its html.
    echo $html;
}

// close cURL resource to free up system resources
curl_close($curl);
}

cURL("youtube.com/");

?>
