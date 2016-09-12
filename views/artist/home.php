
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


        <form action="./index.php?controller=artist&action=add" method="POST" class="form-inline">
            <div class="form-group">
                <label for="Name">Artist's Name:</label>
                <input type="text" name="Name"  size="40" maxlength="35" class="form-control" id="Name" placeholder="The Beatle's">
            </div>
            <button type="submit" class="btn btn-primary" role="button">Add Artist</button>
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
                <th>Artist's Name</th>
                <th></th>
                <th></th>
                </thead>
                <tbody class="searchable">
                    <?php foreach ($Artists as $artist) { ?>
                        <tr>
                            <td>
                                <?php echo $artist->Name; ?>
                            </td>
                            <td>
                                <a href="./index.php?controller=artist&action=edit&ArtistID=<?php echo $artist->ArtistID; ?>"   class="btn btn-danger" role="button">Edit</a>
                            </td>
                            <td>
                                <a href="./index.php?controller=artist&action=delete&ArtistID=<?php echo $artist->ArtistID; ?>"   class="btn btn-danger" role="button">Delete</a>
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
