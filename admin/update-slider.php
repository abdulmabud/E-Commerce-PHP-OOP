<?php include 'header.php'; ?>
<?php
    $db = new Database();
    if(isset($_POST['saveImage'])){
        $file_extension = pathinfo($_FILES['slider']['name'], PATHINFO_EXTENSION);
        $filename = time().'.'.$file_extension;
        $destination = './../uploads/'.$filename;
        if(move_uploaded_file($_FILES['slider']['tmp_name'], $destination)){
            $insert = $db->insert("INSERT INTO settings(meta_key, meta_value, remarks) VALUES('slider_image', '$filename', 'Homepage Slider Image')");
            if($insert){
                echo '<h4 class="alert alert-success">Slider Added Successfully</h4>';
            }else{
                echo $conn->error;
            }
        }
    }

    if(isset($_POST['deleteImage'])){
        $imageId = $_POST['imageId'];
        $delete = $db->delete("DELETE FROM settings WHERE id = '$imageId' ");
        if($delete){
            echo '<h4 class="alert alert-success">Slider Deleted Successfully</h4>';
        }else{
            echo $conn->error;
        }
    }

    $slider_images = $db->select("SELECT id, meta_value FROM settings WHERE meta_key ='slider_image' ");

?>
<style>
        .slideimg{
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }
        .middle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            }

            .con:hover .slideimg {
            opacity: 0.3;
            }

            .con:hover .middle {
            opacity: 1;
            }
       
    </style>
<div class="container">
       <div class="row">
           <div class="col-md-6 offset-md-3">
            <form action="" method="post" enctype="multipart/form-data" class="form-group">
                <table class="table">
                    <tr>
                        <td>Select Image</td>
                        <td><input type="file" name="slider" class="form-control"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Upload New Slider Image" name="saveImage" class="btn btn-primary"></td>
                    </tr>
                </table>
                <h6 class="text-center text-danger">* Image size must be 1200*350px</h6>
            </form>
           </div>
       </div>
       <h3 class="text-light bg-primary p-2 text-center mb-4 w-75 mx-auto" style="border-radius: 10px;">Currently Active Slider</h3>
       <?php while($slider_image = $slider_images->fetch_assoc()){ ?>
            <div class="row">
                <div class="col-md-6 offset-md-3 con">
                    <img src="./../uploads/<?php echo $slider_image['meta_value']; ?>" width="50%" alt="no image" class="slideimg">
                    <div class="middle">
                        <form action="" method="POST">
                            <input type="hidden" name="imageId" value="<?php echo $slider_image['id']; ?>">
                            <input type="submit" class="btn btn-danger" name="deleteImage" value="Remove This Slider">
                        </form>
                    </div>
                    <hr><hr>
                  </div>
            </div>
       <?php } ?>
    </div>
<?php include 'footer.php'; ?>