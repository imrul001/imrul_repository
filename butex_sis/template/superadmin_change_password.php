<style>
    dt {
        float: left;
        width: 140px;
        font-size: 11px;
    }
    .passwordChangeModal{
        margin: 0 auto;
        left: 0px;
        overflow: hidden;
        top: 10px;
    }
    .passwordChangeModal dd input{
        width: 200px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function(){
        var allFieldRequiredMesg = "All Fields are required.";
        var passwordMisMatchMesg = "Password Miss Matched."
        var passwordLengthMesg = "Too Short Password";
        var isAllParamCorrect = true;
        var isFieldEmpty = false;
        
        $('.textpsd').focusin(function(){
            clearFlugs();
        })
        $('#changePasswordSubmitBtn').click(function(){
            $('.textpsd').each(function(){
                if($(this).val() == ''){
                    showErrorBox(allFieldRequiredMesg);
                    isFieldEmpty = true;
                }
            })
            if(!isFieldEmpty){
                if($('#new_pass').val()!= $('#cnf_pass').val()){
                    showErrorBox(passwordMisMatchMesg);
                    isAllParamCorrect = false;
                }
                if($('#new_pass').val().length < 6 || $('#cnf_pass').val().length < 6){
                    showErrorBox(passwordLengthMesg);
                    isAllParamCorrect = false;
                }
                if(isAllParamCorrect){
                    //submit form
                    var url = "./index.php?p=resouces_change_superadmin_password";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#changePasswordForm').serialize(),
                        success: function(data){
                            if(data == 'done'){
                                $.msgBox({
                                    title: "Confirmation",
                                    content: "Password Successfully Changed. Loggin out. Use the new one to Login.",
                                    type: "info",
                                    buttons: [{ value: "Ok" }],
                                    success: function (result) {
                                        $(location).attr("href","./index.php?p=logout");
                                    }
                                });
                            }else{
                                $.msgBox({
                                    title: "Error",
                                    content: "Got an Error",
                                    type: "error",
                                    buttons: [{ value: "Ok" }],
                                    success: function (result) {
                                                        
                                    }
                                });
                            }
                        },
                        error: function(){
                            alert("failed");
                        }
                    })
                }
            }
            return false;
        });
        function showErrorBox(errorMsg){
            $('#ersb_login').show();
            $('#ers_login').html(errorMsg);
        }
        function clearFlugs(){
            $('#ersb_login').hide();
            $('#ers_login').html("");
            isFieldEmpty = false;
            isAllParamCorrect = true;
        }
    });
</script>
<div id="login_modal_body">
    <form method="post" action="" enctype="multipart/form-data" id="changePasswordForm">
      <!--            <h2>User Login<span class="arrow"></span></h2>-->
        <div id="login-box" class="login-popup loginContainer passwordChangeModal">
            <div id="error_box">
                <a name="errr_login"></a>
                <fieldset id="ersb_login" style="padding: 2;display: none;font-size: 12px; border: 2px solid red">
                    <legend><b style="font-size: 13px; color: red;">Validation Errors</b></legend>
                    <span id="ers_login"></span>
                </fieldset>
            </div>

            <div style="margin-top: 0px; margin-bottom: 19px; margin-left: 40px;" id="header_login">
                <center>
                    <h3 style="font-weight: normal; font-size: 16px; margin: 0 auto">Change Password</h3>
                </center>
            </div>
            <dl>
                <dt><label for="user_id">Old Password:</label></dt>
                <dd><input type="password" class="textpsd" name="old_password" id="user" size="30" value="" /></dd>
            </dl>
            <dl>
                <dt><label for="password">New Password:</label></dt>
                <dd><input type="password" class="textpsd" name="new_password" id="new_pass" size="30" value="" /></dd>
            </dl>
            <dl>
                <dt><label for="password">Confirm New Password:</label></dt>
                <dd><input type="password" class="textpsd" name="confirm_new_password" id="cnf_pass" size="30" value="" /></dd>
            </dl>
            <input type="submit" class="submitlogin" id="changePasswordSubmitBtn" disabled="disabled" name="changePasswordSubmit" value="Submit" /> 
        </div>
    </form>
</div>