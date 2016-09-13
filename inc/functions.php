<?php 

// Function for basic field validation (present and neither empty nor only white space
function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}


      function events() {

     $connection = mysqli_connect('localhost', 'root', '', 'inschrijfsysteem');

      $output = "";
      $result = mysqli_query($connection, "SELECT * FROM events");
      while ($row = mysqli_fetch_array($result)){
      $output .= '
      <p>' . $row['name'] . '</p>
      <p>' . $row['background_img'] . '</p>                                                   
      <p>' . $row['banner'] . '</p>
      <p>' . $row['start_date'] . '</p>
      <p>' . $row['location'] . '</p> ';
      }

      return $output;

	}