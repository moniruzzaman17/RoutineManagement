<div class="container">
	<div class="home-body m-auto">
		<h4 class="text-center">Welcome to CPSCN Routine System</h4>
		<div class="search-identity w-25 m-auto pb-5">
			<div class="d-flex align-items-center mt-5">
				<h4 style="width: 35%;" class="m-auto">I am a</h4>
				<select class="form-control" id="searchIdentity">
					<option readonly required>------</option>
					<option value="teacher">Teacher</option>
					<option value="student">Student</option>
				</select>
			</div>
		</div>
		<div class="student-search-wrapper m-auto" style="display: none;">
			<form action="" method="post">
				<div class="form-group">
					<label for="shift" class="required">Shift</label>
					<select class="form-control" id="shift">
						<option readonly required>Select Shift</option>
						<option>Morning</option>
						<option>Day</option>
					</select>
				</div>
				<div class="form-group">
					<label for="class" class="required">Class</label>
					<select class="form-control" id="class">
						<option readonly required>Select Class</option>
						<option>Class I</option>
						<option>Class II</option>
						<option>Class III</option>
						<option>Class IV</option>
						<option>Class V</option>
						<option>Class VI</option>
						<option>Class VII</option>
						<option>Class VIII</option>
						<option>Class IX</option>
						<option>Class X</option>
						<option>Class XI</option>
						<option>Class XI</option>
					</select>
				</div>
				<div class="form-group">
					<label for="group" class="required">Group</label>
					<select class="form-control" id="group">
						<option readonly required>Select Group</option>
						<option>Science</option>
						<option>Arts</option>
						<option>Commerce</option>
					</select>
				</div>
				<div class="form-group">
					<label for="section" class="required">Section</label>
					<select class="form-control" id="section">
						<option readonly required>Select Section</option>
						<option>A</option>
						<option>B</option>
						<option>C</option>
						<option>D</option>
						<option>E</option>
						<option>F</option>
					</select>
				</div>
				<button type="submit" class="btn action-button">Get Routine</button>
			</form>
		</div>
		<div class="teacher-search-wrapper m-auto" style="display: none;">
			<form action="" method="post">
				<div class="form-group">
					<label for="tname" class="required">Teacher Name</label>
					<select class="form-control" id="tname">
						<option readonly required>Select Teacher Name</option>
						<option>Mohammad Sarwar</option>
						<option>Md. Morshedul Alam</option>
						<option>Md. Wazed Ali</option>
					</select>
				</div>
				<button type="submit" class="btn action-button">Get Routine</button>
			</form>
		</div>
	</div>
</div>