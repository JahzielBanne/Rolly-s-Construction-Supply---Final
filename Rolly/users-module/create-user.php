<h3 style="text-align:center;">Provide the Required Information</h3>
<div id="form-block">
    <form onsubmit="return CheckPassword()" name="form1" method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name..">

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name..">

            <label for="access">Access Level</label>
            <select id="access" name="access">
                <option value="staff">Staff</option>
                <option value="supervisor">Supervisor</option>
                <option value="Owner">Owner</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email..">

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password..">

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password..">

        </div>
        <div id="button-block">
            <input type="submit" value="Save">
        </div>
    </form>
</div>
<script>
    function CheckPassword() {
        var passw = /^[A-Za-z]\w{7,14}$/;
        var emails = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        let fname = document.form1.firstname.value;
        let lname = document.form1.lastname.value;
        let email = document.form1.email.value;
        let pass = document.form1.password.value;
        let cpass = document.form1.confirmpassword.value;

        if (fname === "" || lname === "" || email === "" || pass === "" || cpass === "") {
            alert("Please fill out the form!");
            return false;
        } else if (pass !== cpass) {
            alert('Passwords do not match!');
            return false;
        }
          else if (!email.match(emails)) {
            alert('Email Invalid!');
            return false;
        } else if (!pass.match(passw)) {
            alert('Invalid Password! Enter 7 to 15 characters which contain only characters, numeric digits, underscore, and the first character must be a letter.');
            return false;
        } else {
            return true;
        }
    }
</script>
