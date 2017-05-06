<html>
    <body>
        <h1>Doctor create</h1>
	<form name="doctor-create" action="/doctor/create" method="post">
	    <input name="_method" type="hidden" value="POST"><br/>
	    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"><br/>
	    <input type="number" name="speciality_id"><br/>
	    <input type="text" name="first_name"><br/>
	    <input type="text" name="last_name"><br/>
	    <input type="phone" name="phone"><br/>
	    <input type="number" name="gender"><br/>
	    <input type="date" name="birthday"><br/>
	    <input type="email" name="email"><br/>
	    <input type="text" name="room"><br/>
	    <input type="submit" value="Send"><br/>
	</form>
    </body>
</html>