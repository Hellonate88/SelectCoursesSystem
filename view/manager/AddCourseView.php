<div class="select_courses">
	<p class="can_selecte_courses_show" style="text-align: left">Add New Student</p>
    <link rel="stylesheet" href="css/course_reviese_view.css" type="text/css">
	<div class="main_course_reviese_view">

		<div class="position_class">
			<form id = "student" action="controller/ManagerController.class.php?operation=add&object=student&courseId=sure" method="post" onsubmit="return checkForm(this)">
				<ul>
                    <li>Student ID:<input type="text" class="input_text" name="id" /></li>
                    <li>Fist Name :<input type="text" class="input_text" name="first_name" /></li>
                    <li>Last Name:<input type="text" class="input_text" name="last_name" /></li>
                    <li>Date Of Birth :<input type="date" class="input_text" name="DOB" /></li>
                    <li>Home Phone :<input type="text" class="input_text" name="Home_phone" /></li>
                    <li>Mobile :<input type="text" class="input_text" name="Mobile" /></li>
                    <li>Email :<input type="text" class="input_text" name="email" /></li>
                    <li>First Contact Name :<input type="text" class="input_text" name="firstContactName" /></li>
                    <li>First Contact Phone :<input type="text" class="input_text" name="fistContactPhone" /></li>
                    <li>Second Contact Name :<input type="text" class="input_text" name="secondContactName" /></li>
                    <li>Second Contact Phone :<input type="text" class="input_text" name="secondContactPhone" /></li>
                    <li>School Year :<input type="text" class="input_text" name="schoolYear" /></li>
                    <li>Enrollment Date :<input type="date" class="input_text" name="enrollmentDate" /></li>

				</ul>
		    	<input type="submit" class="btn_class" value="Add"/>
		    	<input type="reset" class="btn_class" value="Reset"/>
	    	</form>
            <script src="js/AddNewStudentValidation.js" type="text/javascript">
            </script>
		</div>
	</div>
</div>