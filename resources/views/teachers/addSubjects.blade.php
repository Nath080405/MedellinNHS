<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subjects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>       
    <div class="container mt-5">
      <h2 class="mb-3">Add class scedule</h2>
      <p class="text-muted">Please fill in the details below to create new class scedule.</p>
      <form action="/submit-student" method="POST">
        <!-- Subjects Information -->
        <div class="card mb-4">
          <div class="card-header fw-bold">
            Subjects Information
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="firstName" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter subject name..." required>
              </div>
              <div class="col-md-6">
                <label for="lastName" class="form-label">Teacher Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter teacher name..." required>
              </div>
            </div>
            <div class="mb-3">
              <label for="studentId" class="form-label">Subject Descriptions</label>
              <input type="text" class="form-control" id="studentId" name="student_id" placeholder="Enter subject description..." required>
            </div>
          </div>
        </div>

        <!-- Additional Note -->
        <div class="mb-4">
          <label for="note" class="form-label">Additional Note</label>
          <textarea class="form-control" id="note" name="note" rows="3" placeholder="Enter any additional notes about the subject..."></textarea>
        </div>

       <!-- Time and Schedule -->
<div class="card mb-4">
  <div class="card-header fw-bold">
    Time and Schedule
  </div>
  <div class="card-body">
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="day" class="form-label">Day</label>
        <select class="form-select" id="day" name="day" required>
          <option value="" selected disabled>Select day...</option>
          <option value="Monday">Monday</option>
          <option value="Tuesday">Tuesday</option>
          <option value="Wednesday">Wednesday</option>
          <option value="Thursday">Thursday</option>
          <option value="Friday">Friday</option>
          <option value="Saturday">Saturday</option>
          <option value="Sunday">Sunday</option>
        </select>
      </div>
      <div class="col-md-6">
        <label for="semester" class="form-label">Semester</label>
        <select class="form-select" id="semester" name="semester" required>
          <option value="" selected disabled>Select semester...</option>
          <option value="1st">1st semester</option>
          <option value="2nd">2nd semester</option>
        </select>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <label for="start_time" class="form-label">Start Time</label>
        <input type="time" class="form-control" id="start_time" name="start_time" required>
      </div>
      <div class="col-md-6">
        <label for="end_time" class="form-label">End Time</label>
        <input type="time" class="form-control" id="end_time" name="end_time" required>
      </div>
    </div>
  </div>
</div>
<div class="d-flex justify-content-end gap-2">
  <button type="reset" class="btn btn-outline-secondary">Clear</button>
  <button type="submit" class="btn btn-dark">Submit class</button>
</div>
    </form>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>
