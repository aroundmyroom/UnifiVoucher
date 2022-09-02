# Unifi Voucher with cloudkey & controller 
tested with php 7.3 and Controller 7.2.39
Most Stupid PHP script to create vouchers and show it in a HTML page (with Controller 7.2.39)

This script relies on the PHP Unifi-API class https://github.com/Art-of-WiFi/UniFi-API-client

Make sure that the Unifi-API-Clients is running and make sure you can use the create_vouchers.php and config.php
Without that, this stupid PHP script will not work

What does this script

1. Being stupid as I am totally no coder
2. Check in the folder if there is a voucher.json if not: create one
3. for this to work: make sure the folder these scripts are in is writable and you can use php create_vouchers.php (outputting Json)

Modify the create_vouchers.php to your needs
and modify the latest lines

//echo json_encode($vouchers, JSON_PRETTY_PRINT);
file_put_contents('/var/www/html/voucher.json', json_encode($vouchers));

disable the json output and make sure it is being written as file as above. 

the index.php is the only file being used. Alter to your needs. Changes appreciated
the index.php is reading the json file and putting it in a simple HTML table. 

Help to modify, clean, adjust, improve is much appreciated
