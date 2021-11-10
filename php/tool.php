
<!DOCTYPE html>
<html>
<title>Tool Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">    
<head>
    </head>
<body>
 <div class="w3-container">
        <h2><center>Scholorship Records</center></h2><br>
      <div style="margin-left:30px; margin-right:30px;">                                                                                                                              
        <table class="w3-table-all">
          <thead>
            <tr style="background-color: #000043;color: white;">
              <th>Sr</th>
              <th>Name</th>
              <th>Email</th>
              <th>DOB</th>
              <th>Contact No</th>
              <th>Address</th>
              <th>College Name</th>
              <th>Branch</th>
              <th>Year</th>
              <th>CGPA</th>
              <th>Backlog</th>
              <th>Adhar Card No</th>
              <th>Scholorship</th>
              <th>Caste</th>
              <th>Income</th>
              <th>Fee</th>
              <th>Result</th>
            </tr>
          </thead>
          <?php
            function emailValidate($email) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL) and !empty($email)) {
                    return true;
                }
                else {
                    return false;
                }
            }
            function nameValidate($name){
                if (!preg_match ("/^[a-z A-z]*$/", $name) or empty($name) ){
                    return false;
                }
                else{
                    return true;
                }
            }
            function dobValidate($dob){
                $today = date("Y-m-d");
                $diff = date_diff(date_create($dob), date_create($today));
                if($diff->format('%y%') >= 18 and !empty($dob)){
                    return true;
                }
                else{
                    return false;
                }
            }
            function contactValidate($contact){
                if((!preg_match("/^[0-9]*$/", $contact)) or (strlen($contact))!=10 or empty($contact)){  
                    return false;
                } else {  
                    return true;
                }  
            }
            function addressValidate($address){
                if (empty($address)){
                    return false;
                }
                else{
                    return true;
                }

            }
            function cgpaValidate($cgpa){
                if((!preg_match("/^[0-9]\.?\d{0,2}$/", $cgpa)) or empty($cgpa)){
                    return false;
                }
                else{
                    return true;
                }  
            }
            $conn = new mysqli("localhost", "root", "", "Scholorship Form");
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $count=0;
            $sql = "SELECT * FROM scholorship_details";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $email = emailValidate($row["email"]);
                $name = nameValidate($row["name"]);
                $dob = dobValidate($row["dob"]);
                $contact = contactValidate($row["contact_no"]);
                $address = addressValidate($row["address"]);
                $clg_name = nameValidate($row["college_name"]);
                $cgpa = cgpaValidate($row["cgpa"]);
                $branch = addressValidate($row["branch"]);
                $year = addressValidate($row["year"]);
                $backlog = addressValidate($row["backlog"]);
                if($email and $name and $dob and $contact and $address and $clg_name and $cgpa and $branch and $year and $backlog){
                    $result1 = "Pass";
                }
                else{
                    $result1 = "Fail";
                }
                $count++;
                  echo  "<tr><td> ". $count."</td><td> ". $row["name"]. "</td><td> " . $row["email"] ."</td><td> ".$row["dob"]."</td><td> ".$row["contact_no"]."</td><td> ".$row["address"]."</td><td>".$row["college_name"]."</td><td>".$row["branch"]."</td><td>".$row["year"]."</td><td>".$row["cgpa"]."</td><td>".$row["backlog"]."</td><td>".$row["adhar_card"]."</td><td>".$row["scholorship"]."</td><td>".$row["caste"]."</td><td>".$row["income"]."</td><td>".$row["fee"]."</td><td>".$result1."</td></tr> ";
              }  
           }
              if($count==0)
              {
                echo "<tr><td></td><td></td><td>No Records</td><td></td><td></td></tr>";
                echo "</table>";
              }
          $conn->close();
          ?>
        </table>
            </div>
      </div>
</body>
</html>
