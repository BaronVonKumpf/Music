
 <?php if(ISSET($_GET['Error'])){ ?>
	<div class="alert alert-danger">
  		<strong>Whoops!</strong> 
		<?php echo $_GET['Error']; ?>
	</div>
   <?php } ?>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-8">
        <form action="./index.php?controller=album&action=add" method="POST" class="form-inline">
            <div class="form-group">
                <label for="Title">Album Title:</label>
                <input type="text" name="Title"  size="25" maxlength="35" class="form-control" id="Title" placeholder="The Beatle's" required>
            </div>
            <div class="form-group">
             	<label for="ArtistID">Select Artist:</label>
                <select name="ArtistID" id="ArtistID" class="selectpicker" data-live-search="true" required>
                		<option disabled selected value></option>>
                        <?php foreach ($Artists as $artist) { ?>
                            <option  data-tokens="<?php echo $artist->Name ?>" value="<?php echo $artist->ArtistID ?>">
								<?php echo $artist->Name ?>
                            </option>
                        <?php } ?>

                </select>
            </div>
            <button type="submit" class="btn btn-primary" role="button">Add Album</button>
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
                <th>Album Name</th>
                <th></th>
                <th></th>
                </thead>
                <tbody class="searchable">
                    <?php foreach ($Albums as $album) { ?>
                        <tr>
                            <td>
                                <?php echo $album->Title; ?>
                            </td>
                            
                            <td>
                                <a href="./index.php?controller=album&action=edit&AlbumID=<?php echo $album->AlbumID; ?>"   class="btn btn-danger" role="button">Edit</a>
                            </td>
                            <td>
                                <a href="./index.php?controller=album&action=delete&AlbumID=<?php echo $album->AlbumID; ?>"   class="btn btn-danger" role="button">Delete</a>
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
