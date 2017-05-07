<html>
    <body>
        <h1>2. EDIT DOCTOR ID <?php echo $doctor_id ?></h1>
	<form name="doctor-edit" action="/doctor/<?php echo $doctor_id ?>/edit" method="post">
	    <input name="_method" type="hidden" value="PUT"><br/>
	    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"><br/>
            specialty_id
	    <input type="number" name="speciality_id" value="<?php echo $doctor->SPECIALITY_id ?>"><br/>
            first_name
	    <input type="text" name="first_name" value="<?php echo $doctor->first_name ?>"><br/>
            last_name
	    <input type="text" name="last_name" value="<?php echo $doctor->last_name ?>"><br/>
            phone
	    <input type="phone" name="phone" value="<?php echo $doctor->phone ?>"><br/>
            gender
	    <input type="boolean" name="gender" value="<?php echo $doctor->gender ?>"><br/>
            birthday
	    <input type="date" name="birthday" value="<?php echo $doctor->birthday ?>"><br/>
            email
	    <input type="email" name="email" value="<?php echo $doctor->email ?>"><br/>
            room
	    <input type="text" name="room" value="<?php echo $doctor->room ?>"><br/>
	    <input type="submit" value="Send"><br/>
	</form>
    </body>
</html>