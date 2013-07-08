						<?php include 'inc/db.php'; ?>

				        <form action="inc/post.php" method="post" id="theForm">
				            <label>Name</label>
				            <fieldset>
				            <input type="text" name="firstName" id="firstName" class="clearThis" value="First">
				            <input type="text" name="lastName" id="lastName" class="clearThis" value="Last">
				            </fieldset>
				            <div id="namemessage"></div>
				            <label>Email Address</label>
				            <fieldset>
				            <input type="text" name="email">
				            </fieldset>
				            <label>Phone Number</label>
				            <fieldset>
				            <input type="text" name="phone">
				            </fieldset>
				            <fieldset>
				            <label>Birthday</label>
				            <fieldset>
				            	<select name="month" id="month">
				            		<option selected disabled value="">Month</option>
				            		<option value="Jan">January</option>
				            		<option value="Feb">February</option>
				            		<option value="March">March</option>
				            		<option value="April">April</option>
				            		<option value="May">May</option>
				            		<option value="June">June</option>
				            		<option value="July">July</option>
				            		<option value="August">August</option>
				            		<option value="September">September</option>
				            		<option value="October">October</option>
				            		<option value="November">November</option>
				            		<option value="December">December</option>
				            	</select>
				            	<select name="day" id="day">
				            		<option selected disabled value="">Day</option>
				            		<?php
				            			$i = 1;
				            			while($i <= 31) {
				            				echo "<option value=\"".$i."\">".$i."</option>";
				            				$i++;
				            			}
				            		?>
				            	</select>
				            	<select name="year" id="year">
				            		<option selected disabled value="">Year</option>
				            		<?php
				            			$y = 1940;
				            			while($y <= 2000) {
				            				echo "<option value=\"".$y."\">".$y."</option>";
				            				$y++;
				            			}
				            		?>
				            	</select>
				            </fieldset>
				            <div id="birthdaymessage"></div>
				            <label>Campus</label>
				            <fieldset>
				                <select name="campus" id="campus">
				                    <option selected disabled value="">Please select one</option>
				                    <?php foreach($schooldata as $school): ?>
				                        <option value="<?php echo $school['campus_id']; ?>"><?php echo $school['campus_name']; ?></option>
				                    <?php endforeach; ?>  
				                </select>
				            </fieldset>

				            <label>Session</label>
				            <fieldset>
				            <select name="session" id="resultsGoHere">
				                <option selected disabled value="">Please select one</option>
				               
				            </select>
				            </fieldset>

				            <label>T-shirt size</label>
				            <fieldset>
				            <select name="tshirt">
				                <option selected disabled value="">Please select one</option>
				                <option value="Small">Small</option>
				                <option value="Medium">Medium</option>
				                <option value="Large">Large</option>
				                <option value="X-Large">X-Large</option>
				            </select>
				            </fieldset>

				            <p class="limited">Space is Limited Register Now!</p>
							<input type="submit" class="header-register-btn submit-btn" value="" />

				        </form>