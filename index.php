<?php 
$data = "";
if(isset($_GET['name'])) {
  $name = trim($_GET['name']);
	 switch ($name) {
		case "list_doctor":
			$data = '[
					{
						"doctor_name":"Dr. Suresh",
						"doctor_key":12,
						"hopital_key":2,
						"avatar":"/aaa.png"
					},
					{
						"doctor_name":"Dr. Vikar",
						"doctor_key":13,
						"hopital_key":2,
						"avatar":"/bbb.png"
					}
				]'; 
			break;
		case "valid_doctor":
			$data = '{
				"code": "1", 
				"message" : "Matching Success"
				}';
			break;
		case "invalid_doctor":
			$data = '{
					"code": "0", 
					"message" : "Matching Failure"
					}';
			break;
		case "book_appointment":
		    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				  $json =  json_decode(file_get_contents('php://input'), true);				
					 $data = '{
					"code": "1", 
					"message" : "Appointment has been schedule with patient name '.$json['detail']['patient_name'].'"
				}';				 				 
			} else  {
				$data = '{
					"code": "0", 
					"message" : "Only support method post"
					}';
			}	
		    
			break;
		case "book_appointment_fail":
			$data = '{
					"code": "0", 
					"message" : "Appointment Failed, Dr. XXX is not available on Selected date and time slots. Please select another slot"
					}';
			break;	
		default:
			$data = '{
					"code": "0", 
					"message" : "Not support API"
					}';
	}
} else {
	$data = '{
			"code": "0", 
			"message" : "Can not call API"
			}';
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Content-Type: application/json');
echo $data;
?> 