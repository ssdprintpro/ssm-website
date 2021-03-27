

<div class="overlay" id="overlay">
      <div class="form_div">
      <div><h2 class="ml-auto close">x</h2></div>

        <h4>Apply Now</h4>
        <hr class="style-two">
        <form action="phpscripts.php" method="post" id="apply-now-form">
          <div class=" mb-2">
            <label for="  ">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div>
            <div class=" mb-2">
              <label for="  ">Phone Number</label>
              <input type="number" class="form-control" name="phno" placeholder="Mobile" required>
            </div>
            <div class=" mb-2">
              <label for="  ">Email</label>
              <input type="email" class="form-control" name="Email" placeholder="Email" required>
            </div>
            <div class=" mb-3">
              <label for="  ">Institute</label>
              <select name="institute" style="padding-left: 2px;" class="form-control" id="institute" required>
                <?php  
                  $con = getCon();
                  $insts = $con->query("SELECT * FROM institutes");

                  while ($row=$insts->fetch_assoc()) {
                    echo "<option value='".$row['id']."'>".$row['name']." </option>";
                  }
                ?>
              </select>
            </div>
            <div class=" mb-3">
              <label for="  ">Message</label>
              <input type="text" class="form-control" name="Message" placeholder="Message" required>
            </div>
           
            <div class="input-group" style="border: 0;">
              <input type="submit" class="form-control btn btn-success" value="submit" name="enq"  >
            </div>
            
      </form>
      </div>
    </div>
    
    