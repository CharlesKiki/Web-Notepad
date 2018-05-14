<?php

/*
 * Bookings Activity Week 9
 * Refer the PDO Power point slides in Week 9 to help you complete the
 *  code. Follow the comments I have provided.
 *
 */
$firstname = "";
$lastname = "";
$email = "";
$bookingDate = "";
$bookingTime = "";
$numPeople = "";

// store the error messages when validation fails
$errors = [];


// Page Header
include("includes/header.php");


// this page is the controller that responds to user actions
if (isset($_GET["action"])) {


    $action = $_GET["action"];

    // User Clicked on Add Booking hyperlink
    if ($action == "add") {



        // Has user submitted addRecord form
        if (isset($_POST["addBooking"])) {  // yes
            // retrieve the field values from the form assign to variables
            foreach ($_POST as $key => $value) {
                ${$key} = $value;
            }

            // add the values to an array
            $values = [$firstname, $lastname, $email, $bookingDate, $bookingTime, $numPeople];

            // make sure you enclose the db code inside a try and catch block

            try {
                // create PDO object
                $conn = new PDO("mysql:host=localhost;dbname=bookingdb;charset=utf8", "root", "");
                // create prepared statement with SQL string and wild card placeholders
                $statement = $conn->prepare("INSERT INTO BOOKINGS "
                        . "(firstname, lastname, email, bookingDate, bookingTime, numPeople)"
                        . "VALUES"
                        . " (?,?,?,?,?,?)");

                // insert record into database
                $success = $statement->execute($values);

                // print a success message to the user
                // if($success) ............
                // close the connection
                $conn = null;

                // redirect user to manage bookings page
                header('location:?action=viewAll');

            } catch (PDOException $ex) {
                // in the catch enclosure print the error message to user
                echo "Error: $ex";
            } // end try catch
        } else { // No then display the addRecord form
            // include the addRecord form here
            include('includes/addForm.php');
        }


        // User Clicked on Manage Bookings hyperlink
    } else if ($action == "viewAll") {

        $records = [];

        try {

            // create PDO object
            $conn = new PDO("mysql:host=localhost;dbname=bookingdb;charset=utf8", "root", "");

            $statement = $conn->query("SELECT * from BOOKINGS order by id");

            // we want to fetch an associative array  ie key => value
            $statement->setFetchMode(PDO::FETCH_ASSOC);



            // Each row is an associative array of data - add rows to records array
            while ($row = $statement->fetch()) {

                $records[] = $row;
            }

            // close the connection
            $conn = null;

            // viewRecords references $records array and $header for page heading
            $header = "View All Bookings";
            include('includes/viewRecords.php');
        } catch (PDOException $ex) {
            echo "Error: $ex";
        }





        // User Clicked on edit booking hyperlink in management page
    } else if ($action == "edit") {


        if (isset($_GET["id"])) {


            $id = $_GET["id"];

            // Has user submitted editBooking form
            if (isset($_POST["editBooking"])) {  // yes
                // retrieve the field values from the form assign to variables
                foreach ($_POST as $key => $value) {
                    ${$key} = $value;
                }

                // add the values to an array
                $values = [$firstname, $lastname, $email, $bookingDate, $bookingTime, $numPeople];

                // make sure you enclose the db code inside a try and catch block

                try {
                    // create PDO object
                    $conn = new PDO("mysql:host=localhost;dbname=bookingdb;charset=utf8", "root", "");


                    $statement = $conn->prepare(
                            "Update BOOKINGS set "
                            . "firstname = ?,"
                            . "lastname = ?,"
                            . "email = ?, "
                            . "bookingDate = ?,"
                            . "bookingTime = ?,"
                            . "numPeople = ? "
                            . " where id = $id"
                    );

                    // insert record into database
                    $success = $statement->execute($values);

                    // close the connection
                    $conn = null;

                    // redirect user to manage bookings page
                    header('location:?action=viewAll');


                } catch (PDOException $ex) {
                    echo "Error: $ex";
                }
            } else {  //  No submission,  display editForm with selected record

                $record = [];

                try {

                    $conn = new PDO("mysql:host=localhost;dbname=bookingdb;charset=utf8", "root", "");

                    $statement = $conn->query("SELECT * from BOOKINGS where id = $id");

                    // we want to fetch an associative array  ie key => value
                    $statement->setFetchMode(PDO::FETCH_ASSOC);



                    // Each row is an associative array of data - add rows to records array
                    if ($row = $statement->fetch()) {

                        $record = $row;
                    }

                    $conn = null;

                    // edit form references $record array
                    include('includes/editForm.php');


                } catch (PDOException $ex) {
                    echo "Error: $ex";
                }

            } // end if user submitted editBooking form
        } // end if get id


    } else if ($action == "delete") {

        // must have id to delete a record
        if (isset($_GET["id"])) {

             $id = $_GET["id"];
             try {

                $conn = new PDO("mysql:host=localhost;dbname=bookingdb;charset=utf8", "root", "");
                $sql = "DELETE FROM bookings WHERE id = $id";
                $statement = $conn->prepare($sql);
                $success = $statement->execute();
                $conn = null;

                // redirect user to manage bookings page
                header('location:?action=viewAll');

            } catch (PDOException $ex) {
                echo "Error: $ex";
            }

       }


    } else if ($action == "search") {

        if (isset($_POST["keyword"])) {

            $keyword = $_POST["keyword"];

            try {
                $conn = new PDO("mysql:host=localhost;dbname=bookingdb;charset=utf8", "root", "");
                $sqlSearch = "select * from bookings where "
                        . "id like '%$keyword%' or "
                        . "firstname like '%$keyword%' or "
                        . "lastname like '%$keyword%' or "
                        . "email like '%$keyword%' or "
                        . "bookingDate like '%$keyword%' or "
                        . "bookingTime like '%$keyword%' or "
                        . "numPeople like '%$keyword%'";

                $statement = $conn->query($sqlSearch);

                // we want to fetch an associative array  ie key => value
                $statement->setFetchMode(PDO::FETCH_ASSOC);



                // Each row is an associative array of data - add rows to records array
                while ($row = $statement->fetch()) {

                    $records[] = $row;
                }

                $conn = null;

                $header = "Search Bookings for $keyword: ".count($records);
                include('includes/viewRecords.php');



            } catch (PDOException $ex) {
                echo "Error: $ex";
            }


        } else {
            // include search form here
            include('includes/searchForm.php');
        }
    } // search
} else { // end if user had selected a action


       // default action is display search form
        include('includes/searchForm.php');
}
include("includes/footer.php");
?>
