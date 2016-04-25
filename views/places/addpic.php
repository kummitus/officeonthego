
<h2 class="trn">Select pictures</h2>

<form id="upload" class="form-group" method="post" action="?controller=places&action=insertpic" enctype="multipart/form-data">
  <div class="form-group hidden">
    <input type="number" name="o_id" id="o_id" value="<?php echo $place; ?>">
  </div>
  <div class="form-group">
    <p style="text-align: left; font-weight: bold" class="trn">Comment</p>
    <textarea style="min-width: 100%" type="text" name="comment" rows="5" id="comment" value=""></textarea>
  </div>
  <div id="drop">
		<span class="trn">Drop Here</span>
		<a class="trn">Browse</a>
		<input type="file" name="image" />
	</div>

	<ul>
		<!-- The file uploads will be shown here -->
	</ul>
</form>
<br>
<a href="?controller=places&action=show&id=<?php echo $place; ?>" class="btn btn-primary trn">Back</a>

		<!-- JavaScript Includes -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
		<script src="assets/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="assets/js/jquery.ui.widget.js"></script>
    <script src="assets/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="assets/js/canvas-to-blob.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="assets/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="assets/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="assets/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="assets/js/jquery.fileupload-image.js"></script>
		<!-- Our main JS file -->
		<script src="assets/js/script.js"></script>
