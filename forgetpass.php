<h4>Forgot Password</h4>
<form name="form1" id="form1" method="post" action="login.php">

    <table class="table table-condensed" border="0" style="width:600px">
        <tr>
          <td>Member Username</td>
          <td>
            <div class='col-lg-12'>
                 <input class="form-control" type="text" name="username" id="username" required/> 
            </div>
          </td>
        </tr>
        <tr>
          <td>Email</td>
          <td>
            <div class='col-lg-12'>
                  <input type='text' name="email" id="email" class="form-control" required/>
            </div>
          </td>
        </tr>
    </table>

  <input name="forget" type="submit" class="btn btn-primary" id="Submit" value="Send" />
  <input name="reset" type="reset" class="btn btn-danger" value="Reset" />

</form>
