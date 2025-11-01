<?php
include("db.php");
?>
<html>
<head>
    
</head>
<body>
<form  method="post" enctype="multipart/form-data" id="formtemplate">
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-xl-4">
                            <label for="category" class="form-label">Category Name</label>
                            <select class="form-control" id="category" name="category">
                                <option value="" >Select Category</option>
                                <?php
                                $abc = mysqli_query($host, "SELECT * FROM category WHERE type='cate' ORDER BY id DESC");
                                if ($abc) {
                                    while ($array1 = mysqli_fetch_assoc($abc)) {
                                        echo '<option value="' . htmlspecialchars($array1['name']) . '">' . htmlspecialchars($array1['name']) . '</option>';
                                    }
                                } else {
                                    echo '<option value="">Error fetching categories</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-xl-4">
                            <label for="product" class="form-label">Product Name</label>
                            <input type="file" class="form-control" required id="product" name="product" placeholder="Enter Product Name">
                        </div>

                        <div class="col-xl-4" style="margin-top: 47px;">
                            <input type="hidden" name="update" id="update"/>
                            <button type="submit" id="submit" class="btn btn-sm btn-primary">Submit</button>
                            <button type="reset" id="resetbtn" class="btn btn-sm btn-danger">Reset</button>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</form>


<!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>-->
<span id="output"></span>
<script src="build/core.js"></script>
<!--<script src="build/core.min.js"></script>-->
<script>
$(document).ready(function () {
  $("#formtemplate").on('submit',(function(e) {
e.preventDefault();
if($("#category").val()==""){
    alert("not work");
    return false;
}
$.ajax({
	url: "data/testing.php",
	type: "POST",
	data:  new FormData(this),
	contentType: false,
	cache: false,
	processData:false,
	success: function(html){
	$("#output").text("");	
$("#output").prepend(html);
	
	},
	error: function(){} 	        
});
}));
});
</script>
</body>
</html>