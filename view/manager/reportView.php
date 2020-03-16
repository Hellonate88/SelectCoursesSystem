<div class="select_courses">
    <p class="can_selecte_courses_show">Report</p>
    <?php
    $managerController = new ManagerController();
    $showReport = $managerController->showReports();
    ?>
    <div class="table_show">
        <table class="can_select_courses_show_table">
            <tr>
                <th>Current School Year</th><th>Total Number of Students</th>
            </tr>
            <?php if(!empty($showReport)){
                foreach ($showReport as $row){
                    ?>
                    <tr>
                        <td>Year <?php echo $row['school_year']?></td>
                        <td><?php echo $row['totalNumberForYear']?></td>
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