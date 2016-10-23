 
    <script type="text/javascript">
 
      function fileSelected() {
 
        var count = document.getElementById('fileToUpload').files.length;
 
              document.getElementById('details').innerHTML = "";
 
              for (var index = 0; index < count; index ++)
 
              {
 
                     var file = document.getElementById('fileToUpload').files[index];
                     if(file.size > 5 * 1024 * 1024){
                         alert("File tidak boleh lebih dari 2MB");
                     }
                     var fileSize = 0;
                     if (file.size > 1024 * 1024)
 
                            fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
 
                     else
 
                            fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
 
                     document.getElementById('details').innerHTML += 'Name: ' + file.name + '<br>Size: ' + fileSize + '<br>Type: ' + file.type;
 
                     document.getElementById('details').innerHTML += '<p>';
 
              }
 
      }
 
      function uploadFile() {
 
        var fd = new FormData();
 
              var count = document.getElementById('fileToUpload').files.length;
 
              for (var index = 0; index < count; index ++)
 
              {
 
                     var file = document.getElementById('fileToUpload').files[index];
                     var komen =  document.getElementById('komen').value;
                     fd.append('myFile', file);
                     fd.append('komen', komen);
 
              }
 
        var xhr = new XMLHttpRequest();
 
        xhr.upload.addEventListener("progress", uploadProgress, false);
 
        xhr.addEventListener("load", uploadComplete, false);
 
        xhr.addEventListener("error", uploadFailed, false);
 
        xhr.addEventListener("abort", uploadCanceled, false);
 
        xhr.open("POST", "<?php echo base_url('index.php/foto/upload') ?>");
 
        xhr.send(fd);
 
      }
 
      function uploadProgress(evt) {
 
        if (evt.lengthComputable) {
 
          var percentComplete = Math.round(evt.loaded * 100 / evt.total);
 
          document.getElementById('progress').innerHTML = percentComplete.toString() + '%';
 
        }
 
        else {
 
          document.getElementById('progress').innerHTML = 'unable to compute';
 
        }
 
      }
 
      function uploadComplete(evt) {
 
        /* This event is raised when the server send back a response */
 
        if(evt.target.responseText != "error"){
            $("#picture").html("<img height='100' width='100' src='<?php echo base_url('/uploads') ?>/"+evt.target.responseText+"'>");
        }
 
      }
 
      function uploadFailed(evt) {
 
        alert("There was an error attempting to upload the file.");
 
      }
 
      function uploadCanceled(evt) {
 
        alert("The upload has been canceled by the user or the browser dropped the connection.");
 
      }
 
    </script>
 
<div class="grid" style="padding-top: 1em">
    <div class="row">
        <div class="span4">
            <?php
            if($_SESSION['USER']['USER_ROLE'] == "S"){
                include APPPATH . "/views/sidebar_siswa.php";
            }else{
                include APPPATH . "/views/sidebar.php";
            }
            ?>
        </div>

        <div class="span10">
                <div id="konten" style="width: 100%;height: 100%;background-color:white;padding: 10px ">
        
  <form id="form1" enctype="multipart/form-data" method="post" action="<?php echo base_url('index.php/foto/upload') ?>">
 
    <div>
 
      <label for="fileToUpload">Take or select photo(s)</label><br />
 
      <input type="file" name="fileToUpload" id="fileToUpload" onchange="fileSelected();" accept="image/*" capture="camera" />
      <p><br>
          <textarea id="komen" name="komen" placeholder="keterangan" cols="25" rows="5" style="resize: none"></textarea>
    </div>
 
    <div id="details"></div>
 
    <div style="padding-top: 20px">
 
      <input type="button" onclick="uploadFile()" value="Upload" />
 
    </div>
 
    <div id="progress"></div>
        <div id="picture">

    </div>
 
  </form>
            </div>
        </div>
    </div>
</div>
    
