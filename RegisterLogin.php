<!DOCTYPE html>
<html>
	<head>
	<meta charset="UTF-8">
	<title>Student Enrollment</title>
	<link rel="stylesheet" href="css/Register_login.css" type="text/css"/>
	</head>
	<body class="content">
		<div class="main_content">
            <div class="select_login_or_register_class">
                <h1 class="select_indentity">Welcome to student enrollment system</h1>
            </div>

			<div id="login_id" class="login_class">
				<form id="login_form_id" action="./controller/LoginController.class.php" method="post" onsubmit="return checkLoginForm(this)">
					<div class="account_password_class">
						<div class="account_total_class">
							<input type="text" class="account_class" name="account"/>
						</div>
						<div class="password_total_class">
							<input type="password" class="password_class" name="password"/>
						</div>
					</div>
					<div class="select_indentity">
						<label class="student_class"><input type="radio" name="identity"  value="student" checked/>Student</label>
						<label class="manager_class"><input type="radio" name="identity" value="manager"/>Admin</label>
					</div>
					<div class="login_btn_class">
						<input type="submit" class="login_btn" name="login" value="Login"/>
					</div>
				</form>
			</div>
            <script src="js/register_login.js" type="text/javascript">
                alert("aaaa");
            </script>
		</div>
	</body>
</html>