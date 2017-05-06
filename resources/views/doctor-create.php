<html>
    <body>
        <h1>1. CREATE_DOCTOR</h1>
	<form name="doctor-create" action="/doctor/create" method="post">
	    <input name="_method" type="hidden" value="POST"><br/>
	    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"><br/>
            specialty_id
	    <input type="number" name="speciality_id"><br/>
            first_name
	    <input type="text" name="first_name"><br/>
            last_name
	    <input type="text" name="last_name"><br/>
            phone
	    <input type="phone" name="phone"><br/>
            gender
	    <input type="boolean" name="gender"><br/>
            birthday
	    <input type="date" name="birthday"><br/>
            email
	    <input type="email" name="email"><br/>
            room
	    <input type="text" name="room"><br/>
	    <input type="submit" value="Send"><br/>
	</form>
       <?php if (isset($id)) { echo json_encode(['id' => $id]); } ?>
    </body>
</html>