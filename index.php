<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PHP Project Final SP9 </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

</head>


<body>


    <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="text_box_student_name">Student Name: </label>
                            <input type="text" name="text_box_student_name" id="text_box_student_name" class="form-control" placeholder="Enter Student Name">
                        </div>

                        <div class="form-group">
                            <label for="text_box_gender"> Gender: </label>
                            <input type="text" name="text_box_gender" id="text_box_gender" class="form-control" placeholder="Enter Gender">
                        </div>


                        <div class="form-group">
                            <label for="text_box_dob">Date of Birth: </label>
                            <input type="text" name="text_box_dob" id="text_box_dob" class="form-control" placeholder="Enter Date of Birth">
                        </div>

                        <div class="form-group">
                            <label for="text_box_email">Email: </label>
                            <input type="text" name="text_box_email" id="text_box_email" class="form-control" placeholder="Enter Email">
                        </div>

                        <div class="form-group">
                            <label> Course </label>
                            <input type="text" name="text_box_course" id="text_box_course" class="form-control" placeholder="Enter Course">
                        </div>

                        <div class="form-group">
                            <label for="text_box_telephone">Telephone: </label>
                            <input type="text" name="text_box_telephone" id="text_box_telephone" class="form-control" placeholder="Enter Phone Number">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <input type="submit" name="button_save" id="button_save" class="btn btn-primary" value="Save">
                    </div>

                </form>

            </div>
        </div>
    </div>










    <div class="table-responsive-xl" style="margin-top: -40px;">
        <div class="jumbotron">
            <div class="card">
                <center>
                    <h2>PHP Project Final SP9</h2>
                    <p>Copy write by Vichea</p>
                </center>
            </div>
            <div class="card" style="height: 70px;">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                        ADD DATA
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                    $connection = mysqli_connect("localhost", "root", "", "db_sp9final");
                    $db = mysqli_select_db($connection, 'phpcrud');

                    $query = "SELECT * FROM tbl_students";
                    $query_run = mysqli_query($connection, $query);
                    ?>
                    <table id="datatableid" class="table table-dark table-hover" style="border-radius: 5px; padding-top:5px;">
                        <thead>
                            <tr>

                                <th scope="col">Student Name</th>
                                <th scope="col">Gender </th>
                                <th scope="col"> Date of Birth </th>
                                <th scope="col"> Email </th>
                                <th scope="col"> Course </th>
                                <th scope="col"> Telephone </th>
                                <th scope="col"> Image </th>
                                <th scope="col"> UPDATE </th>
                                <th scope="col"> DELETE </th>
                            </tr>
                        </thead>
                        <?php
                        if ($query_run) {
                            foreach ($query_run as $row) {

                        ?>
                                <tbody>
                                    <tr>

                                        <td> <?php echo $row['name']; ?> </td>
                                        <td> <?php echo $row['gender']; ?> </td>
                                        <td> <?php echo $row['dob']; ?> </td>
                                        <td> <?php echo $row['email']; ?> </td>
                                        <td> <?php echo $row['course']; ?> </td>
                                        <td> <?php echo $row['tel']; ?> </td>
                                        <td> <?php echo $row['tel']; ?> </td>
                                        <!--<td> <?php echo '<img src="data:image;base64,' . base64_encode($row['img']) . '" alt="Image" style="width:35px; height:35px;">' ?> </td>-->
                                        <td>
                                            <a href="updatecode.php?edit=<?php echo $row['id']; ?>" class="btn btn-info"> UPDATE </a>

                                        </td>
                                        <td>
                                            <a href="deletecode.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger"> DELETE </a>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }
                        ?>
                    </table>
                </div>
            </div>


        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"> </script>

    <script>
        $(document).ready(function() {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>









</body>

</html>