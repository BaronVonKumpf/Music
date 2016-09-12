<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      
      
        <form action="./index.php?controller=artist&action=edit" method="POST" class="form-inline">
            <input type="hidden" name="ArtistID" value="<?php echo $Artist->ArtistID ?>"/>
            <input type="hidden" name="Save" value="True"/>
            <div class="form-group">
              <label for="Title">Artist's Name:</label>
              <input type="text" name="Name" class="form-control" size="40" maxlength="35" id="Name" value="<?php echo $Artist->Name ?>" />
            </div>
            <button type="submit" class="btn btn-primary" role="button">Save Edits</button>
          </form>
    </div>
    <div class="col-sm-2">
    </div>
  </div>

