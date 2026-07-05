<?php
include "db_connect.php";

$message = "";

if(isset($_POST['submit'])){

    $group_id = $_POST['group_id'];
    $file_name = $_POST['file_name'];

    $sql = "INSERT INTO submissions(group_id, file_path)
            VALUES('$group_id','$file_name')";

    if(mysqli_query($conn, $sql)){
        $message = "Project Submitted Successfully!";
    }else{
        $message = "Submission Failed!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Project Submission</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h2>Project Submission</h2>
</div>

<div class="card-body">

<?php
if($message != ""){
    echo "<div class='alert alert-success'>$message</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label class="form-label">Group ID</label>
<input type="number" name="group_id" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Project Document</label>
<input type="text" name="file_name" class="form-control" placeholder="report.pdf" required>
</div>

<button type="submit" name="submit" class="btn btn-primary">
Submit Project
</button>

</form>

<hr>

<h4>Submission Status</h4>

<span class="badge bg-success">Submitted</span>

<hr>

<h4>Supervisor Feedback</h4>

<div class="alert alert-info">
No feedback has been added yet.
</div>

<a href="dashboard.php" class="btn btn-secondary">
Back to Group Overview
</a>

</div>

</div>

</div>

</body>
</html>
