<?php
$data = "";
if(isset($_GET['name'])) {
  $name = trim($_GET['name']);
	 switch ($name) {
		case "list_doctor":
			$data = '[
					{
            "id": 1,
            "name": "Dr. Suresh",
            "doctor_key": "ABC123456789",
            "avatar": "http://sdk.medkumo.loc/images/user.png"
					},
					{
            "id": 2,
            "name": "Dr. Vikar",
            "doctor_key": "ABC123456CDE",
            "avatar": "http://sdk.medkumo.loc/images/user.png"
					}
				]';
			break;
		case "valid_doctor":
			$data = '{
				"code": 1,
				"message" : "Matching Success"
				}';
			break;
		case "invalid_doctor":
			$data = '{
					"code": 0,
					"message" : "Matching Failure"
					}';
			break;
		case "book_appointment":
		    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				  $json =  json_decode(file_get_contents('php://input'), true);
					 $data = '{
					"code": 1,
					"message" : "Your appointment with '.$json['detail']['patient_name'].' has booked successfully.'.'"
				}';
			} else  {
				$data = '{
					"code": 0,
					"message" : "Only support method post"
					}';
			}

			break;
		case "book_appointment_fail":
			$data = '{
					"code": 0,
					"message" : "Appointment Failed, Dr. XXX is not available on Selected date and time slots. Please select another slot"
					}';
			break;
		default:
			$data = '{
					"code": 0,
					"message" : "Not support API"
					}';
	}
} else {
	$data = '{
			"code": 0,
			"message" : "Can not call API"
			}';
}

header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
header('Content-Type: application/json');
echo $data;
?>
