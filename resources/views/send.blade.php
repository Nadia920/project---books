<div id="send" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <h3 class="name-modal">Заказ</h3>
            <div class="formPosition">
            <form id="sendData"  class="createForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="general-for-all-languages">   
						<div class="form-group">
                            <label>Name</label><br>
                            <input type="text" name="name" class="form-control name">
                        </div>
                        <div class="form-group">
                            <label>Email</label><br>
                            <input type="email" name="email" class="form-control email">
                        </div>
                </div>
            </form>
            <div>
        </div>
        <div class="modal-footer">
            <button name="insert" value='Save' type="button" data-dismiss="modal" class='btn btn-success actionButton'> Send </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>





