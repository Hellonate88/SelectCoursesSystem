
	<div class="select_courses">
		<p class="can_selecte_courses_show">Summary</p>
		<?php 
			$managerController = new ManagerController();
			$showAllCoursesInfo = $managerController->showAllCourses();
			?>
		<div class="table_show">
			<table class="can_select_courses_show_table">
				<tr>
					<th>Student name</th>
                    <th>Current school year</th>
                    <th>Email</th>
                    <th>Enrollment Date</th>
				</tr>
				<?php if(!empty($showAllCoursesInfo)){
					foreach ($showAllCoursesInfo as $row){
					?>
				<tr>
                    <?php $pathname = "<a href="."./StudentView.php?operation=view&object=student&courseOrStudentId=".$row['id'].">".$row['NAME']."</a>"?>
                    <td><?php echo $pathname?></td>
					<td><?php echo $row['school_year']?></td>
                    <?php $pathemail= "<a href=mailto:".$row['email'].">".$row['email']."</a>"?>
                    <td><?php echo $pathemail?></td>
                    <td><?php echo $row['enrollment_date']?></td>
					<td>
						<?php $path = "<a href="."./StudentView.php?operation=delete&object=student&courseOrStudentId=".$row['id'].">Delete</a>"?>
						<?php echo $path?>
					</td>

				</tr>
				<?php 
						}
					}else {
					?>
				<tr><td class="table_empty_show" colspan="6">No data</td></tr>
				<?php }?>
			</table>
		</div>
	</div>