                             
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
        <form action="./index.php?controller=song&action=add" method="POST" class="form-inline">
            <div class="form-group">
                <label for="Title">Song Title:</label>
                <input type="text" name="Title"  size="25" maxlength="35" class="form-control" id="Title" placeholder="Eleanor Rigby" required>
            </div>
            <div class="form-group">
                <label for="Duration">Duration:</label>
                
                <input type="text" name="Duration"   size="10" maxlength="10"  id="Duration" class="form-control"  pattern="\d{1,2}:\d{1,2}" placeholder="mm:ss" title="Format the Duration as mm:ss" required>

            </div>
            <br><br>
            <div class="form-group">
             	<label for="AlbumID">Select Album:</label>
                <select name="AlbumID" id="AlbumID" class="selectpicker" data-live-search="true" required>
                		<option disabled selected value></option>
                        <?php foreach ($Albums as $album) { ?>
                             <option  data-tokens="<?php echo $album->Title ?>" value="<?php echo $album->AlbumID ?>">
								<?php echo $album->Title ?>
                            </option>
                        <?php } ?>

                </select>
            </div>
            <button type="submit" class="btn btn-primary" role="button">Add Song</button>
        </form>
    </div>
    <div class="col-sm-2">
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">

        <div class="input-group"> <span class="input-group-addon">Filter</span>

            <input id="filter" type="text" class="form-control" placeholder="Type here...">
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <th>Song Title</th>
                <th>Duration</th>
                <th></th>
                <th></th>
                </thead>
                <tbody class="searchable">
                    <?php foreach ($Songs as $song) { ?>
                        <tr>
                            <td>
                                <?php echo $song->Title; ?>
                            </td>
                            <td>
                                <?php echo ltrim($song->Duration,'0'); ?>
                            </td>
                            <td>
                                <a href="/Music/index.php?controller=song&action=edit&SongID=<?php echo $song->SongID; ?>"   class="btn btn-danger" role="button">Edit</a>
                            </td>
                            <td>
                                <a href="/Music/index.php?controller=song&action=delete&SongID=<?php echo $song->SongID; ?>"   class="btn btn-danger" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-2">
    </div>
</div>
