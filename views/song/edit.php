<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
      
      
        <form action="./index.php?controller=song&action=edit" method="POST" class="form-inline">
            <input type="hidden" name="SongID" value="<?php echo $Song->SongID ?>"/>
            <input type="hidden" name="Save" value="True"/>
            <div class="form-group">
              <label for="Title">Song Title:</label>
              <input type="text" name="Title" class="form-control" size="40" maxlength="35" id="Title" value="<?php echo $Song->Title ?>"  required />
              
            
              </div>     <br><br>
              <div class="form-group">
              <label for="Duration">Duration:</label>
              <input type="text" name="Duration" class="form-control" size="10" maxlength="10" id="Duration" value="<?php echo $Song->Duration ?>"  pattern="\d{1,2}:\d{1,2}" placeholder="mm:ss" title="Format the Duration as mm:ss" required />
              </div>
              <br><br>
              <div class="form-group">
             	<label for="AlbumID">Select Album:</label>
                <select name="AlbumID" id="AlbumID" class="selectpicker" data-live-search="true" required>
                
                        <?php foreach ($Albums as $album) { ?>
                            <option  data-tokens="<?php echo $album->Title ?>"
                             
							 <?php if ($Song->AlbumID == $album->AlbumID){
								 echo ' selected="selected" ';
							 }?>
                             	
                             
                             	value="<?php echo $album->AlbumID ?>">
								<?php echo $album->Title ?>
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

