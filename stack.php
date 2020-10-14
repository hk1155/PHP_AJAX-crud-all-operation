<?php 

			$servername = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'aitreya_test';

            $conn = mysqli_connect($servername,$username,$password,$database);
            
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $email = $_POST["mail"];
                $pass = $_POST["pass"];
                $sql = "INSERT INTO `login id pass` (`Email`, `Password`) VALUES ('$email', '$pass')";
                $res = mysqli_query($conn,$sql);
                if ($res) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> Successfully summited your id and password 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
                }
            }
            
        ?>