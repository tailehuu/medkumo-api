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
			$data = '{
				"code": "1", 
				"message" : "Appointment has been schedule with Dr. XXX on XX-XX-XXXX XX:XX"
				}';
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
header('Content-Type: application/json');
echo $data;
?> 