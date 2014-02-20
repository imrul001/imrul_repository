<style>
    .newUserCreateDivcls{
        text-align: center;
    }
    table.user_table, .user_table th, .user_table td
    {
        font-family: arial;
        border:1px solid green;
    }
    table.user_table
    {
        position: relative;
        width:96%;
        border-collapse:collapse;
    }
    .user_table th
    {
        height:22px;
        background-color:#30769E;
        color:white;
        font-size: 11px;
    }
    .user_table td
    {
        text-align:center;
        height:18px;
        vertical-align:bottom;
        padding:1px;
        font-size: 11px;
        font-weight: bold;
    }
</style>
<script>
    $(document).ready(function(){
//        $('#editStatus_0').attr("disabled", "disabled");
        $('td.status').each(function(){
           if($(this).html()== 'Active'){
              $(this).css("color","green"); 
           }else{
               $(this).css("color","red"); 
           } 
        });
        /**
         *Method to create general user with "GENERAL_USER" role
         *
         *General users only have READ ONLY access to database content
         *
         **/
        $('#createGeneralUser').click(function(){
            var checkFlugvalue = $(this).attr("checkFlug");
            var title = "Create General User";
            $.msgBox({ type: "prompt",
                title: title,
                inputs: [
                    { header: "User Name", type: "text", name: "user_name"},
                    { header: "Password", type: "text", name: "password"},
                ],
                buttons: [
                    { value: "Submit" }, {value:"Cancel"}],
                beforeShow: function(){
                    
                },
                success: function (result, value){   
                    if(result == "Submit"){
                        var user_name=$('input[name="user_name"]').val();
                        var password=$('input[name="password"]').val();
                        if(user_name!= '' && password !='' && checkFlugvalue!= ''){
                            
                            var postData = "user_name="+user_name+"&password="+password+"&method="+checkFlugvalue;
                            var url = "./template/resource_createORedit_general_user.php"; 
                            $.ajax({
                                url: url,
                                type : "GET",
                                data : postData,
                                success: function(data){
                                    if(data == "InsertDone"){
                                        $.msgBox({
                                            title: "Confirmation",
                                            content: "General User Successfully Created.",
                                            type: "info",
                                            buttons: [{ value: "Ok" }],
                                            success: function (result) {
                                                $('#super_tabs-2').load("./index.php?p=general_user");
                                            }
                                        }); 
                                    }
                                    else if(data == "EditDone"){
                                        $.msgBox({
                                            title: "Confirmation",
                                            content: "Stutas Successfully Edited.",
                                            type: "info",
                                            buttons: [{ value: "Ok" }],
                                            success: function (result) {
                                                $('#super_tabs-2').load("./index.php?p=general_user");
                                            }
                                        }); 
                                    
                                    }
                                    else{
                                        alert("got error");
                                    }
                                }
                            });    
                        
                            
                        }else{
                            $.msgBox({
                                title: "Error",
                                content: "User Name & Password Can not be empty",
                                type: "error",
                                buttons: [{ value: "Ok" }],
                                success: function (result) {
                                                        
                                }
                            });
                        }
                    }
                }
            });
        });
        /***
         ** Edit General User Status
         **/
        $('.editStatus').off("click")
        $('.editStatus').on("click", function(){
            var thisID = $(this).attr("id");
            var index = thisID.split("_");
            var thisUser_name = $("td#userNameID_"+index[1]).html();
            var method = $(this).attr("method");
            var statusData =$("#statusData_"+index[1]).html();
            var title = "Edit User Status";
            $.msgBox({ type: "prompt",
                title: title,
                inputs: [
                    { header: "User Status", type: "radio", name: "user_status"},
                ],
                buttons: [
                    { value: "Submit" }, {value:"Cancel"}],
                beforeShow: function(){
                    $('div:first span.msgInputHeader span','div.msgBoxInputs')
                    .html('<input type="radio" name="status" value="Active">Active<br><input type="radio" name="status" value="Inactive">Inactive<br>');
                    $("input[type=radio][value='"+statusData+"']").attr('checked','checked');
                },
                success: function (result, value){
                    if(result == 'Submit'){
                        var url = "./template/resource_createORedit_general_user.php"; 
                        var statusToBeSubmitted = $('input[name=status]:radio:checked').val();
                        var postData = "user_name="+thisUser_name+"&method="+method+"&status="+statusToBeSubmitted;
                        $.ajax({
                            url: url,
                            type : "GET",
                            data : postData,
                            success: function(data){
                                if(data == "EditDone"){
                                    $.msgBox({
                                        title: "Confirmation",
                                        content: "Stutas Successfully Edited.",
                                        type: "info",
                                        buttons: [{ value: "Ok" }],
                                        success: function (result) {
                                            $('#super_tabs-2').load("./index.php?p=general_user");
                                        }
                                    }); 
                                    
                                }
                                else{
                                    $.msgBox({
                                        title: "Error",
                                        content: "Got an Error.",
                                        type: "error",
                                        buttons: [{ value: "Ok" }],
                                        success: function (result) {
                                                        
                                        }
                                    });
                                }
                            }
                        });
                    }
                }   
            });
        });
    })
</script>

<div id="login_modal_body">
    <div id="newUserCreateDiv" class="newUserCreateDivcls">
        Press to Create New General User <input type="button" id="createGeneralUser" checkFlug="CREATE_USER" name="createGeneralUser" value="Create User" />
    </div>
    <h4>General User List</h4>
    <?php
    $sql = "SELECT * FROM codeIg_table WHERE role='GENERAL_USER'";
    $result = mysql_query($sql);
    $num_row = mysql_num_rows($result);
    ?>
    <?php if ($num_row > 0) : ?>
        <div id="tableContainer">
            <table class='user_table' style='margin: 0 auto;'>
                <tr>
                    <th>User Name</th>
                    <th>User Password</th>
                    <th>User Status</th>
                    <th>Edit Option</th>
                </tr>
                <?php
                $i = 0;
                while ($row = mysql_fetch_array($result)) {
                    echo '<tr>
                          <td id=userNameID_' . $i . '>' . $row['user_name'] . '</td>
                          <td>' . $row['readable_password'] . '</td>
                          <td class="status" id=statusData_' . $i . '>' . $row['status'] . '</td>
                          <td><input type="button" class="editStatus" method="EDIT_USER" id=editStatus_' . $i . ' value="Edit" /></td>
                      </tr>';
                    $i++;
                }
                ?>
            </table>
        </div>
    <?php endif; ?>
</div>