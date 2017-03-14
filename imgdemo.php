
<html>
<form class="form-horizontal" method="post" action="addmenuphoto.php" enctype="multipart/form-data">
	<div class="form-group">
												
							<div class="col-sm-8">
						<!--<input type="file"  class="form-control1" name="txtofferphoto" />-->
				<input type="file" name="fileField[]" id="fileField" multiple="multiple"/>
				</div>
		</div>
														


 <?php
if(isset($_FILES['file'])){
    $errors= array();
foreach($_FILES['file']['tmp_name'] as $key => $tmp_name ){
    $file_name = $key.$_FILES['file']['name'][$key];
    $file_size =$_FILES['file']['size'][$key];
    $file_tmp =$_FILES['file']['tmp_name'][$key];
    $file_type=$_FILES['file']['type'][$key];  
    if($file_size > 2097152){
        $errors[]='File size must be less than 2 MB';
    }       
    $query="INSERT into menuphoto_tbl ('menu_id',`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`) 
            VALUES('$user_id','$file_name','$file_size','$file_type'); ";

    $desired_dir="gallery";
    if(empty($errors)==true){
        if(is_dir($desired_dir)==false){
            mkdir("$desired_dir", 0700);        // Create directory if it does not exist
        }
        if(is_dir("$desired_dir/".$file_name)==false){
            move_uploaded_file($file_tmp,"gallery/".$file_name);
        }else{                                  //rename the file if another one exist
            $new_dir="gallery/".$file_name.time();
             rename($file_tmp,$new_dir) ;               
        }
        mysql_query($query) or die(mysql_error());          
    }else{
            print_r($errors);
    }
 }
if(empty($error)){
    echo "Success";
}
}
?>
</form>
</html>