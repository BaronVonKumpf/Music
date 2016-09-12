<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      
      
        <form action="./index.php?controller=album&action=edit" method="POST" class="form-inline">
            <input type="hidden" name="AlbumID" value="<?php echo $Album->AlbumID ?>"/>
            <input type="hidden" name="Save" value="True"/>
            <div class="form-group">
              <label for="Title">Album Title:</label>
              <input type="text" name="Title" class="form-control" size="40" maxlength="35" id="Title" value="<?php echo $Album->Title ?>" required />
              
            
              </div>
              <br><br>
              <div class="form-group">
             	<label for="ArtistID">Select Artist:</label>
                <select name="ArtistID" id="ArtistID" class="selectpicker" data-live-search="true" required>
                
                        <?php foreach ($Artists as $artist) { ?>
                            <option  data-tokens="<?php echo $artist->Name ?>"
                             
							 <?php if ($artist->ArtistID == $Album->ArtistID){
								 echo ' selected="selected" ';
							 }?>
                             	
                             
                             	value="<?php echo $artist->ArtistID ?>">
								<?php echo $artist->Name ?>
                            </option>
                        <?php } ?>

                    </select>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary" role="button">Save Edits</button>
          </form>
    </div>
    <div class="col-sm-2">
    </div>
  </div>

