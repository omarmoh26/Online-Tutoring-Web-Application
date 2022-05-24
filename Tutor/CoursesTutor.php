<html>
    <body>
<?php
include "TutorMenu.php";
?>
<style>
    
    thead tr th {
            height: 40px; 
            line-height: 40px;
        }
    table th{
        padding: 10px;
        text-align: center;
        
    }
    table td{
        padding: 10px;
        text-align: center;
    }
    table td a:link, a:visited {
        background-color: #f44336;
        color: white;
        padding: 10px 18px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
</style>
<table  class="table table-light" >
    <thead class="thead-dark">
        <tr>
            <th>Course Image</th>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>Course Duration</th>
            <th>Course Price</th>
            <th>Reviews</th>
            <th>Average Rating</th>
            <td> <a href="AddCourse.php"> ADD New Course</a> </td>
        </tr>
        </thead>
        <?php
try{
	if(($conn = new mysqli("localhost", "root", "", "online_tutoringdb"))-> connect_errno){
		throw new customException("<h1 style='color:red;'>Unable to Connect</h1>");
	}
}
catch (customException $e) {
	echo $e->errorMessage();
	}
$sql="SELECT * FROM courses where Approved='yes'";
$result = mysqli_query($conn,$sql);	
while($row=mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><img src=../images/<?php echo $row['Image']?> alt='Italian Trulli' width='100' height='100'> </td>
        <td><?php echo $row['courseCode'] ?></td>
        <td><?php echo $row['courseName'] ?></td>
        <td><?php echo $row['courseDuration']." Months" ?></td>
        <td><?php echo $row['coursePrice']." $" ?></td>
        <td> <a href=ViewReviews.php?id=<?php echo $row['CourseID'] ?>> View Reviews</a> </td>
        <td> <a href=ViewRatings.php?id=<?php echo $row['CourseID'] ?>><?php echo Avg_Rating ($row['CourseID']) ?> </a></td>
    </tr>
<?php } ?>
    
</table>
</body>
    </html>