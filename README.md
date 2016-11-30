Medkumo API
===
### Get a list of doctor
+ Method: GET
+ Data input: JSON
+ Data return: JSON
+ Url: http://api.medkumo.loc/index.php?name=list_doctor
+ Result:  
```  
{
  "id": 1,
  "name": "Dr. Suresh",
  "doctor_key": "ABC123456789",
  "avatar": "http://sdk.medkumo.loc/user.png"
},
{
  "id": 2,
  "name": "Dr. Vikar",
  "doctor_key": "ABC123456CDE",
  "avatar": "http://sdk.medkumo.loc/user.png"
}
```           
### Book an appointment
+ Method: POST
+ Data input: JSON
+ Data return: JSON
+ Url: http://api.medkumo.loc/index.php?name=book_appointment
+ Result:
#### success  
```
{
  "code": 1,
  "message": "Your appointment with <doctor name> has booked successfully."
 }
```  
#### Fail  
```
{
  "code": "0",
  "message" : "Appointment Failed, Dr. XXX is not available on Selected date and time slots. Please select another slot"
 }           
```
### Check doctor is valid
+ Method: GET
+ Data input: JSON
+ Data return: JSON
+ Url: http://api.medkumo.loc/index.php?name=valid_doctor
+ Result:
```    
{
    "code": 1,
    "message": "Matching Success"
}
```
