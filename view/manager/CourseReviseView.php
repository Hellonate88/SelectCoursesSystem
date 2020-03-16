<div class="select_courses">
	<p class="can_selecte_courses_show" style="text-align: left">Student Information</p>
	<?php 
		require_once dirname(__FILE__).'/../../controller/ManagerController.class.php';
		$managerController = new ManagerController();
		$courseOrStudentId = isset($_GET['courseOrStudentId']) ? $_GET['courseOrStudentId'] : "";
		$showSimpleCourseInfo = $managerController->showSimpleStudent($courseOrStudentId);
		?>
    <div class="main_course_reviese_view">

        <div>
            <div class="student_info_head_img_class">
                <img alt="" src="././images/<?php echo $showSimpleCourseInfo['id']; echo ".jpg"?>">
            </div>
        </div>

		<div class="position_class" >
			<form action="controller/ManagerController.class.php?operation=view&object=student&courseId=sure"  method="post">
	    		<input type="text" class="input_text" name="id1" value="<?php echo $showSimpleCourseInfo['id']?>" style='display: none'/>

				<ul>
                    <li>Student ID:<input type="text" class="input_text" name="id" value="<?php echo $showSimpleCourseInfo['id']?>"/></li>
					<li>Fist Name :<input type="text" class="input_text" name="first_name" value="<?php echo $showSimpleCourseInfo['first_name']?>"/></li>
					<li>Last Name:<input type="text" class="input_text" name="last_name" value="<?php echo $showSimpleCourseInfo['last_name']?>"/></li>
					<li>Date of Birth :<input type="date" class="input_text" name="DOB" value="<?php echo $showSimpleCourseInfo['DOB']?>"/></li>
                    <li>Home Phone :<input type="text" class="input_text" name="Home_phone" value="<?php echo $showSimpleCourseInfo['Home_phone']?>"/></li>
                    <li>Mobile :<input type="text" class="input_text" name="Mobile" value="<?php echo $showSimpleCourseInfo['Mobile']?>"/></li>
                    <li>Email :<input type="text" class="input_text" name="email" value="<?php echo $showSimpleCourseInfo['email']?>"/></li>
                    <li>First Contact Name :<input type="text" class="input_text" name="firstContactName" value="<?php echo $showSimpleCourseInfo['firstContactName']?>"/></li>
                    <li>First Contact Phone :<input type="text" class="input_text" name="fistContactPhone" value="<?php echo $showSimpleCourseInfo['fistContactPhone']?>"/></li>
                    <li>Second Contact Name :<input type="text" class="input_text" name="secondContactName" value="<?php echo $showSimpleCourseInfo['secondContactName']?>"/></li>
                    <li>Second Contact Phone :<input type="text" class="input_text" name="secondContactPhone" value="<?php echo $showSimpleCourseInfo['secondContactPhone']?>"/></li>
                    <li>School Year :<input type="text" class="input_text" name="schoolYear" value="<?php echo $showSimpleCourseInfo['school_year']?>"/></li>
                    <li>Enrollment Date :<input type="date" class="input_text" name="enrollmentDate" value="<?php echo $showSimpleCourseInfo['enrollment_date']?>"/></li>

				</ul>
		    	<input type="submit" class="btn_class" value="Update"/>
		    	<input type="submit" class="btn_class" name="Delete" value="Delete"/>
	    	</form>
            <form action="controller/upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="hidden" name="picID" value="<?php echo $showSimpleCourseInfo['id']?>">
                <input type="submit" value="Upload Image" name="submit">
            </form>
		</div>
	</div>
</div>