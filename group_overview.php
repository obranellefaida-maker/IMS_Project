<?php
include "db_connect.php";

if(isset($_POST['register']))
{
    $group_name = $_POST['group_name'];
    $project_title = $_POST['project_title'];
    $created_by = $_POST['created_by'];

    $sql = "INSERT INTO groups(group_name, project_title, created_by)
            VALUES('$group_name','$project_title','$created_by')";

    if(mysqli_query($conn,$sql))
    {
        echo "Group Registered Successfully!";
    }
    else
    {
        echo "Error!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Group Registration</title>
</head>
<body>

<h2>Group Registration</h2>

<form method="POST">

Group Name:<br>
<input type="text" name="group_name"><br><br>

Project Title:<br>
<input type="text" name="project_title"><br><br>

Created By (User ID):<br>
<input type="number" name="created_by"><br><br>

<input type="submit" name="register" value="Register Group">

</form>

</body>
</html>