<?php
require_once dirname(__FILE__).'/controller/ManagerController.class.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome To Student Enrollment System</title>
</head>
<link rel="stylesheet" href="css/student_view.css" type="text/css"/>
<link rel="stylesheet" href="css/manager_view.css" type="text/css">
<link rel="stylesheet" href="css/course_reviese_view.css" type="text/css">
<link rel="stylesheet" href="css/model.css" type="text/css">
<body>
<div class="main_head_class">
    <div class="main_head_show_class">
        <p>Welcome To Student Enrollment System</p>
    </div>
</div>
<div class="main_student_info_class">
    <div class="student_info_class">
        <div class="student_info_head_class">
            <div class="student_info_head_first">
            </div>
            <div class="student_info_head_img_class">
                <img alt="" src="./images/head.jpg">
            </div>
        </div>
        <div class="student_operator_class">
            <ul>
                <li><a href="./StudentView.php">Student Information Summary</a></li>

                <li><a href="StudentView.php?operation=add&object=student&courseOrStudentId=unknown">Add New Student</a>
                <li><a href="StudentView.php?operation=report&object=student&courseOrStudentId=unknown">Reports</a>

            </ul>
        </div>
    </div>
    <div class="main_student_courses_info">
        <div class="student_courses_info_backgroud">
            <div class="student_courses_info">
                <?php
                $operation = isset($_GET['operation']) ? $_GET['operation'] : "";
                $object = isset($_GET['object']) ? $_GET['object'] : "";
                $courseOrStudentId= isset($_GET['courseOrStudentId']) ? $_GET['courseOrStudentId'] : "";

                $managerController = new ManagerController();
                if($operation === "" || $object === "" || $courseOrStudentId === ""){
                    require_once dirname(__FILE__).'/view/manager/ShowCoursesOperator.php';
                }else if($operation === 'delete' && $object === 'student'){
                    $managerController->deleteCourse($courseOrStudentId);
                    header("Location:http://localhost/SelectCoursesSystem/StudentView.php");
                } else if($operation === 'view' && $object === 'student'){
                    require_once dirname(__FILE__).'/view/manager//CourseReviseView.php';
                } else if($operation === 'add' && $object === 'student' && $courseOrStudentId === 'unknown'){
                    require_once dirname(__FILE__).'/view/manager//AddCourseView.php';
                }else if($operation === 'report' && $object === 'student' && $courseOrStudentId === 'unknown'){
                    require_once dirname(__FILE__).'/view/manager//reportView.php';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>