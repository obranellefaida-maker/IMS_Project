<?php
include "db_connect.php";

$message = "";

if(isset($_POST['submit']))
{
    $submission_id = $_POST['submission_id'];
    $supervisor_id = $_POST['supervisor_id'];
    $comments = $_POST['comments'];
    $score = $_POST['score'];

    $sql = "INSERT INTO feedback(submission_id, supervisor_id, comments, score)
            VALUES('$submission_id','$supervisor_id','$comments','$score')";

    if(mysqli_query($conn,$sql))
    {
        $message = "Feedback Added Successfully!";
    }
    else
    {
        $message = "Error adding feedback!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supervisor Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h2>Supervisor Feedback</h2>
</div>

<div class="card-body">

<?php
if($message!="")
{
    echo "<div class='alert alert-success'>$message</div>";
}
?>

<form method="POST">

<label>Submission ID</label>
<input type="number" name="submission_id" class="form-control" required><br>

<label>Supervisor ID</label>
<input type="number" name="supervisor_id" class="form-control" required><br>

<label>Comments</label>
<textarea name="comments" class="form-control" required></textarea><br>

<label>Score</label>
<input type="number" name="score" class="form-control"><br>

<button type="submit" name="submit" class="btn btn-primary">
Save Feedback
</button>

</form>

</div>
</div>
</div>

</body>
</html>