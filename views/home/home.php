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
                <th>Artist</th>
                <th>Album</th>
                <th>Duration</th>
                </thead>
                <tbody class="searchable">
                    <?php foreach ($DetailSongList as $song) { ?>
                        <tr>
                            <td>
                                <?php echo $song['STitle']; ?>
                            </td>
                            <td>
                                <?php echo $song['Name']; ?>
                            </td>
                            <td>
                                <?php echo $song['ATitle']; ?>
                            </td>
                            <td>
                                <?php echo ltrim($song['Duration'],'0'); ?>
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