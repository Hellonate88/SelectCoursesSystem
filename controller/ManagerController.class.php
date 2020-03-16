<?php

require_once dirname(__FILE__).'/../model/ManagersModel.class.php';
class ManagerController{

	public function showAllCourses(){

		$managerModel = new ManagersModel();
		$showAllCoursesInfo = $managerModel->showAllCourses();
		return $showAllCoursesInfo;
	}

	public function showReports(){
	    $managerModel = new managersModel();
	    $showReport = $managerModel->showReports();
	    return $showReport;
    }
	

	public function deleteCourse($courseId){
		$managerModel = new ManagersModel();
		$managerModel->deleteCourse($courseId);
	}

	public function showSimpleStudent($courseId){
		$managerModel = new ManagersModel();
		$showSimpleInfo = $managerModel->showSimpleStudent($courseId);
		return $showSimpleInfo;
	}


    public function UpdateStudentCourses($Id1, $FirstName, $lastName, $DOB,$Home_phone,$Mobile, $email, $firstContactName, $fistContactPhone, $secondContactName, $secondContactPhone, $schoolYear,$enrollmentDate){
        $managerModel = new ManagersModel();
        $managerModel->UpdateStudentCourses($Id1, $FirstName, $lastName, $DOB,$Home_phone,$Mobile, $email, $firstContactName, $fistContactPhone, $secondContactName, $secondContactPhone, $schoolYear,$enrollmentDate);
    }


	public function addStudent($Id, $FirstName, $lastName, $DOB,$Home_phone,$Mobile, $email, $firstContactName, $fistContactPhone, $secondContactName, $secondContactPhone, $schoolYear,$enrollmentDate){
		$managerModel = new ManagersModel();
		return $managerModel->addStudent($Id, $FirstName, $lastName, $DOB,$Home_phone,$Mobile, $email, $firstContactName, $fistContactPhone, $secondContactName, $secondContactPhone, $schoolYear,$enrollmentDate);
	}
	
}

	$operation = isset($_GET['operation']) ? $_GET['operation'] : "";
	$object = isset($_GET['object']) ? $_GET['object'] : "";
	$courseId = isset($_GET['courseId']) ? $_GET['courseId'] : "";
	
	$managerController = new ManagerController();



	if($operation === 'view' && $object === 'student' && $courseId === 'sure'){

	 	$Id = isset($_POST['id1']) ? $_POST['id1'] : "";
		$FirstName =isset($_POST['first_name']) ? $_POST['first_name'] : "";
		$lastName = isset($_POST['last_name']) ? $_POST['last_name'] : "";
        $DOB = isset($_POST['DOB']) ? $_POST['DOB'] : "";
        $Home_phone = isset($_POST['Home_phone']) ? $_POST['Home_phone'] : "";
        $Mobile = isset($_POST['Mobile']) ? $_POST['Mobile'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $firstContactName = isset($_POST['firstContactName']) ? $_POST['firstContactName'] : "";
        $fistContactPhone = isset($_POST['fistContactPhone']) ? $_POST['fistContactPhone'] : "";
        $secondContactName = isset($_POST['secondContactName']) ? $_POST['secondContactName'] : "";
        $secondContactPhone = isset($_POST['secondContactPhone']) ? $_POST['secondContactPhone'] : "";
        $schoolYear = isset($_POST['schoolYear']) ? $_POST['schoolYear'] : "";
        $enrollmentDate = isset($_POST['enrollmentDate']) ? $_POST['enrollmentDate'] : "";

        if(isset($_POST['Delete'])){
            $managerController ->deleteCourse($Id);
        }


		if($Id!=null){
            $managerController->UpdateStudentCourses($Id, $FirstName, $lastName, $DOB,$Home_phone,$Mobile, $email, $firstContactName, $fistContactPhone, $secondContactName, $secondContactPhone, $schoolYear,$enrollmentDate);
			header("Location:http://localhost:88/SelectCoursesSystem/StudentView.php");
		} else {

			header("Location:http://localhost:88/SelectCoursesSystem/StudentView.php");
		} 		
	} else if($operation === 'add' && $object === 'student' && $courseId === 'sure'){

        $Id = isset($_POST['id']) ? $_POST['id'] : "";
        $FirstName =isset($_POST['first_name']) ? $_POST['first_name'] : "";
        $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : "";
        $DOB = isset($_POST['DOB']) ? $_POST['DOB'] : "";
        $Home_phone = isset($_POST['Home_phone']) ? $_POST['Home_phone'] : "";
        $Mobile = isset($_POST['Mobile']) ? $_POST['Mobile'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $firstContactName = isset($_POST['firstContactName']) ? $_POST['firstContactName'] : "";
        $fistContactPhone = isset($_POST['fistContactPhone']) ? $_POST['fistContactPhone'] : "";
        $secondContactName = isset($_POST['secondContactName']) ? $_POST['secondContactName'] : "";
        $secondContactPhone = isset($_POST['secondContactPhone']) ? $_POST['secondContactPhone'] : "";
        $schoolYear = isset($_POST['schoolYear']) ? $_POST['schoolYear'] : "";
        $enrollmentDate = isset($_POST['enrollmentDate']) ? $_POST['enrollmentDate'] : "";

		$canAddInfo = $managerController->addStudent($Id, $FirstName, $lastName, $DOB,$Home_phone,$Mobile, $email, $firstContactName, $fistContactPhone, $secondContactName, $secondContactPhone, $schoolYear,$enrollmentDate);

		if($canAddInfo === 'false'){

		}
        header("Location:http://localhost:88/SelectCoursesSystem/StudentView.php");
	}

?>