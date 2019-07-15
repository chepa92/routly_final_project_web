<!-- logout modal -->
<div id="logout_modal" class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Logout<i class="fa fa-lock"></i></h4>
            </div>
            <div class="modal-body"><i class="fa fa-question-circle"></i> Are you sure you want to Logout?</div>
            <div class="modal-footer"><a href="index.php" class="btn btn-danger btn-block">Logout</a></div>
        </div>
    </div>
</div>
<!-- logout modal -->


<!-- new station modal -->
<div class="modal fade" id="createTrip" tabindex="-1" role="dialog" aria-labelledby="createTrip" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTrip">New Trip Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="response">
                <div class="search-box">
                    <input type="text" class="from_class" autocomplete="off" placeholder="From.." />
                    <div class="result"></div>
                </div>
            </div>
            <div class="modal-body to_class" id="response">
                <div class="search-box">
                    <input type="text" class="dest_class" autocomplete="off" placeholder="To.." />
                    <div class="result"></div>
                </div>
            </div>
            <form id="make_order">
                <div class="modal-footer">
                    <input type="hidden" id="passId" name="passID" value='<?php echo $_SESSION["userid"];?>'>
                    <input type="hidden" id="fromID" name="fromID" value="0">
                    <input type="hidden" id="destID" name="destID" value="0">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No, thanks</button>
                    <input type="submit" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- new station modal -->

<!--delete station modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModal">Warning!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="response">
                <h6>Are you sure you want to delete this station?</h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No, thanks</button>
                <button type="button" class="btn btn-danger" onclick="deleteStation('<?php echo $_GET["stationID"] ?>')">Yes, Delete Station</button>
            </div>
        </div>
    </div>
</div>
<!-- delete station modal -->

