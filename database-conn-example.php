<p> 
    <?php
        echo "hello world";
    ?>
</p> 

<?php
  $db_host = 'localhost';
  $db_user = 'croder';
  $db_password = 'password';
  $db_db = 'newDatabase';
 
  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );
	
  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';

  $result = $mysqli->query("SELECT * from employee");

  foreach ($result as $row) {
      echo '<br>';
      echo "user: " . $row[email];
      echo '<br>'; 
  }

  $mysqli->close();
?>



<body> 
    <?php
        /*
        class Person {
            // properties 
            public $name;
            public $job;
            public $salary;
            public $contractLength;

            public function __construct($name, $job, $salary, $contractLength) {
                $this->name = $name;
                $this->job = $job;
                $this->salary = $salary;
                $this->contractLength = $contractLength;
            }
        
            public function setName($newName) {
                $this->name = $newName;
            }

            public function setJob($newJob) {
                $this->job = $newJob;
            }

            public function setSalary($newSalary){
                $this->salary = $newSalary;
            }

            public function getName() {
                return $this->name; 
            }

            public function getJob() {
                return $this->job; 
            }

            public function getContractTotal() {
                return $this->salary * $this->contractLength; 
            }

        }

        $person1 = new Person("Charlie", "coder", 500000, 6);
        */
    ?>
</body>