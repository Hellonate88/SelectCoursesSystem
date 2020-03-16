<?php
require_once dirname(__FILE__).'/../dao/MysqlDb.class.php';

class ManagersModel{

	private $mySqlDb;

	private $TAG = "managersModel";

	public function register($account, $password, $sex){
		$mySqlDb = MySqlDb::getMySqlDb();
		$mySqlDb->escapeString($account);
		$mySqlDb->escapeString($password);
		$mySqlDb->escapeString($sex);
		$sql = "select `id` from managers where manager_account='$account';";
		$id = $mySqlDb->fetchRow($sql);

		if(!empty($id)){
			return $errStr = "This account already exist!";
		} else{
			//插入记录
			$sql = "insert into managers values(null, '$account', '$password', '$sex', 0);";
			$mySqlDb->escapeString($sql);
			$mySqlDb->query($sql);
			return true;
		}
	}

	public function login($managerAccount, $managerPassword){
		$mySqlDb = MySqlDb::getMySqlDb();
		$mySqlDb->escapeString($managerAccount);
		$mySqlDb->escapeString($managerPassword);

		$sql = "select `manager_password`,`right_control` from `managers` where manager_account ='$managerAccount';";

		$managerInfo = $mySqlDb->fetchAll($sql);

		if(empty($managerInfo[0]['manager_password'])){
			return $errStr = "账号不存在!";
		} else if($managerPassword !== $managerInfo[0]['manager_password']){

			return $errStr = "密码不正确!";
		} else {
			return $managerInfo;
		}
	}

	public function showAllCourses(){
		$mySqlDb = MySqlDb::getMySqlDb();
		$sql = "select si.id, concat(si.first_name,' ', si.last_name) as NAME ,
si.email
, se.school_year  
, se.enrollment_date
from student_enroll se 
LEFT JOIN student_info si 
ON se.student_id = si.id
where se.isEnrolled = 1 
and si.isActive = 1
order by se.school_year, 
si.first_name, 
si.last_name";
		$showallCoursesInfo = $mySqlDb->fetchAll($sql);
		return $showallCoursesInfo;
	}

	public function showReports(){
		$mySqlDb = MySqlDb::getMySqlDb();
		$sql = "SELECT COUNT(si.id) AS totalNumberForYear
,se.school_year 
FROM student_enroll se 
LEFT JOIN student_info si 
ON se.student_id = si.id
GROUP BY se.school_year
ORDER BY se.school_year";
		$showaReport = $mySqlDb->fetchAll($sql);
		return $showaReport;
	}

	public function deleteCourse($Id){
		$mySqlDb = MySqlDb::getMySqlDb();
		$mySqlDb->escapeString($Id);
		$sql = "update student_enroll set isEnrolled = 0 where `student_id`='$Id';";
		$mySqlDb->query($sql);
		$sql = "update student_info set isActive = 0 where `id`='$Id';";
		$mySqlDb->query($sql);
	}

	public function showSimpleStudent($couseId){
		$mySqlDb = MySqlDb::getMySqlDb();
		$mySqlDb->escapeString($couseId);
		$sql = "select DOB
,si.id
 ,first_name
 ,last_name
 ,Home_phone
 ,Mobile
 ,email
 ,firstContactName
 ,fistContactPhone
 ,secondContactName
 ,secondContactPhone
 ,school_year
 ,enrollment_date
 from student_info si
 LEFT JOIN student_enroll se 
 ON se.student_id = si.id
 where si.id='$couseId'";
		$showSimpleCourseInfo = $mySqlDb->fetchRow($sql);
		return $showSimpleCourseInfo;
	}

	public function UpdateStudentCourses($Id1, $FirstName, $lastName, $DOB,$Home_phone,$Mobile, $email, $firstContactName, $fistContactPhone, $secondContactName, $secondContactPhone, $schoolYear,$enrollmentDate){
		$mySqlDb = MySqlDb::getMySqlDb();
		$mySqlDb->escapeString($Id1);
		$mySqlDb->escapeString($FirstName);
		$mySqlDb->escapeString($lastName);
		$mySqlDb->escapeString($DOB);
		$mySqlDb->escapeString($Home_phone);
		$mySqlDb->escapeString($Mobile);
		$mySqlDb->escapeString($email);
		$mySqlDb->escapeString($firstContactName);
		$mySqlDb->escapeString($fistContactPhone);
		$mySqlDb->escapeString($secondContactName);
		$mySqlDb->escapeString($secondContactPhone);
		$mySqlDb->escapeString($schoolYear);
		$mySqlDb->escapeString($enrollmentDate);

		if($Id1==null){
			return ;
		} else {
			$sql = "update student_info 
			set `first_name`='$FirstName'
			,`last_name`='$lastName'
			,`DOB`='$DOB'
			, `Home_phone`='$Home_phone'
			,`Mobile`='$Mobile'
			,`email`='$email'
			, `firstContactName`='$firstContactName'
			, `fistContactPhone`='$fistContactPhone'
			,`secondContactName`='$secondContactName'
			,`secondContactPhone`='$secondContactPhone'
			where `id`='$Id1';";
			$mySqlDb->query($sql);

			$sql1  = "update student_enroll
			set `school_year` = '$schoolYear'
			,`enrollment_date` = '$enrollmentDate'
			where `student_id`='$Id1';";
            $mySqlDb->query($sql1);
		}
	}
	

	public function addStudent($Id, $FirstName, $lastName, $DOB,$Home_phone,$Mobile, $email, $firstContactName, $fistContactPhone, $secondContactName, $secondContactPhone, $schoolYear,$enrollmentDate){
		$mySqlDb = MySqlDb::getMySqlDb();

		$mySqlDb->escapeString($Id);
		$mySqlDb->escapeString($FirstName);
		$mySqlDb->escapeString($lastName);
		$mySqlDb->escapeString($DOB);
		$mySqlDb->escapeString($Home_phone);
		$mySqlDb->escapeString($Mobile);
		$mySqlDb->escapeString($email);
		$mySqlDb->escapeString($firstContactName);
		$mySqlDb->escapeString($fistContactPhone);
		$mySqlDb->escapeString($secondContactName);
		$mySqlDb->escapeString($secondContactPhone);
		$mySqlDb->escapeString($schoolYear);
		$mySqlDb->escapeString($enrollmentDate);

		$sql = "select * from student_info where id='$Id';";
		$canInsert = $mySqlDb->fetchRow($sql);

		$sqlID = "select max(id)  from student_enroll";
		$sqlMax = $mySqlDb->fetchRow($sqlID);
		$sqlMaxID = (int)$sqlMax;
		$sqlMaxIDInt = $sqlMaxID+1;
		$sqlMaxIDString = (string)$sqlMaxIDInt;

		if(!empty($canInsert)){
			return false;
		} else {
			$sql = "insert into student_info values('$Id', '$FirstName', '$lastName', '$DOB','$Home_phone','$Mobile',1, '$firstContactName', '$fistContactPhone', '$secondContactName', '$secondContactPhone', '$email');";
			$mySqlDb->query($sql);

			$sql1 = "insert into student_enroll (student_id, school_year ,enrollment_date, isEnrolled) values( '$Id', '$schoolYear', '$enrollmentDate', 1)";
			$mySqlDb->query($sql1);
			return true;
		}
	}
	
}

?>



