API endpointsFor Following
1)	API to submit the Reimbursement Form
http://localhost/codeigniter_api/welcome/insert_data
Date format : with / or  -  ex: 13/03/2021 or 13-03-2021
1=> For Conveyence
	category  => 1
'from_date', 'to_date', 'sel_month', 'purpose', 'mode', 'km',,'inv_no', 'amount', 'attachment'
Headers :
Client-Service : “frontend-client”,
Auth-Key : “reimburstment_api”
2=> For Hotel
	category  => 2
'from_date', 'to_date', 'sel_month', 'hotel_name','inv_no', 'amount', 'attachment'
Headers :
Client-Service : “frontend-client”,
Auth-Key : “reimburstment_api”

3=> For Food
	category  => 3
'sel_month', 'inv_no', 'amount', 'attachment'
Headers :
Client-Service : “frontend-client”,
Auth-Key : “reimburstment_api”
4=> For Mobile
	category  => 4
'sel_month', 'inv_no', 'amount', 'attachment'
Headers :
Client-Service : “frontend-client”,
Auth-Key : “reimburstment_api”
5=> For Internet
	category  => 5
'sel_month', 'inv_no', 'amount', 'attachment'
Headers :
Client-Service : “frontend-client”,
Auth-Key : “reimburstment_api”


2)	API to Fetch the All Reimbursement details Date wise

Headers :

Client-Service : “frontend-client”,
Auth-Key : “reimburstment_api”
http://localhost/codeigniter_api/welcome/get_data?category=1&date=13/03/2021
Catergory : 1 => Conveyance, 2 => Hotel, 3 => Food, 4 => Mobile, 5 => Internet
3)	API to Fetch 1 Reimbursement Entry

http://localhost/codeigniter_api/welcome/get_data?category=1& id=6
Catergory : 1 => Conveyance, 2 => Hotel, 3 => Food, 4 => Mobile, 5 => Internet
