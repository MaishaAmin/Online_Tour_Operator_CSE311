<?php 


include("../Class/FlightTicketBack.php");

$obj_flight = new FlightTicket();

if(isset($_GET['status']))
{
    if($_GET['status'] = 'edit')
    {
        $id = $_GET['id'];

        $display = $obj_flight->display_data_for_edit($id);
    }
}

$row = mysqli_fetch_assoc($display);


if(isset($_POST['update_info']))
{
    $obj_flight->update_data($_POST);
}





?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title> Edit Flight Ticket </title>

</head>

<body>

    <h2 align = "center"> <a href="../FlightTicket.php"> Go Back </a>  </h2>

    <div class="container my-4 p-4 shadow">

        <table class="table table-striped table-hover">

            <thead>

                <tr>
                    <th> ID </th>
                    <th> From </th>
                    <th> To </th>
                    <th> Flight Name</th>
                    <th> Business Class Price </th>
                    <th> Economy Class Price </th>
                    <th> Departure Time </th>
                </tr>

            </thead>


            <tbody>

                <tr>
                    <td> <?php echo $row['FLIGHT_ROUTE_ID']; ?> </td>
                    <td> <?php echo $row['FROM_PLACE']; ?> </td>
                    <td> <?php echo $row['TO_PLACE']; ?> </td>
                    <td> <?php echo $row['FLIGHT_NAME']; ?> </td>
                    <td> <?php echo $row['B_CLASS_PRICE']; ?> </td>
                    <td> <?php echo $row['E_CLASS_PRICE']; ?> </td>
                    <td> <?php echo $row['DEPARTURE_TIME']; ?> </td>

                </tr>


            </tbody>

        </table>

    </div>

    <div class="container my-4 p-4 shadow">



        <form method="post" enctype="multipart/form-data">

            <label for="UpdatePrice"> Updated Business Class Price </label>
            <input class="form-control mb-2" type="number" name="UpdateBClassPrice" placeholder="Enter the Updated Business Class Price">

            <label for="UpdatePrice"> Updated Economy Class Price </label>
            <input class="form-control mb-2" type="number" name="UpdateEClassPrice" placeholder="Enter the Updated Economy Class Price">

            <label for="UpdateTime"> Updated Departure Time </label>
            <input class="form-control mb-2" type="time" name="UpdateTime" placeholder="Enter Updated Departure Time">

            <input type = "hidden" name = "id" value = "<?php echo $row['FLIGHT_ROUTE_ID']; ?>" >

            <input type="submit" name="update_info" value="Update Ticket" class="form-control bg-warning">



        </form>

    </div>
</body>

</html>