<!DOCTYPE html>
<div id="form">
    <?php echo form_open('agent_assigned_controller/add_case_to_agent'); ?>
    <table class ="table table-hover" >
        <h4 class="">Add New Case to Agent Form:</h4>

        <tr>
        <th>Agent Number</th>
        <td> <?php echo form_dropdown("agentNo",$data); ?></div></td>
</tr>
<tr>
    <th>Case Number</th>
    <td> <?php if($caseNo == null){
            echo "<strong>no cases availabe</strong>";
        }else
            echo form_dropdown("caseNo",$caseNo);
        ?></div></td>
</tr>

</table>

<div class='pull-right control-group'>
    <div class='btn-group'>
        
        <?php echo form_submit("input_submit", "Add Agent",'class="btn btn-primary btn-xs"');?>
    </div>
</div><br/><br/>

</div>
</form>


