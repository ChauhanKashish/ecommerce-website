
<?php
include('db/connection.php');
$sql="SELECT * from mg_catagories order by id desc";
                $check=mysqli_query($conn,$sql);
                
                
?>
<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>ADD PRODUCT</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap1.min.css" />
    <?php include'components/link.php'?>
  </head>
  <body class="crm_body_bg">
  <?php include'components/header.php'?>
    <section class="main_content dashboard_part large_header_bg">
      <div class="container-fluid g-0">
        <div class="row">
         
        </div>
      </div>
      <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
          <div class="row justify-content-center">
            <div class="col-lg-12 ">
               </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">Fill All The Products</h3>
                    </div>
                  </div>
                </div>
                <div class="white_card_body">
                  <div class="card-body">
                    <form action="function.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                    <div class=" col-md-6 mb-3 ">
                          <label class="form-label" for="inputCity" >Pdoduct Name</label>
                          <input type="text" name="pro_name" class="form-control" id="inputCity" required>
                        </div>
                        <div class=" col-md-6 mb-3 ">
                          <label class="form-label" for="inputCity">Parent Catagories</label>
                        <select name="parent_id" class="form-control" onchange="get_subcategories(this.value)" required>
                        <option value="">--select--</option>
                          <?php foreach($check as $val){?>
                            <option value="<?php echo $val['cat_id'];?>"><?php echo ucwords($val['cat_name']);?></option>
                           <?php }?> 
                           </select>
                        </div>
                        <div class=" col-md-6 mb-3 ">
                          <label class="form-label" for="inputCity">Sub Catagories</label>
                        <select name="sub_id" id="sub_id" class="form-control" required>
                        <option value="">--select--</option>
                           </select>
                        </div>
                        <div class=" col-md-12 mb-3 ">
                          <label class="form-label" for="inputCity">Pdoduct Description</label>
                       <textarea name="pro_desc" id="inputCity" class="form-control" required></textarea>
                        </div>
                        <div class=" col-md-6 mb-3">
                          <label class="form-label" for="inputCity">Stock</label>
                          <input type="text" name="stock" class="form-control" id="inputCity" required>
                          </div>
                        <div class=" col-md-6 mb-3">
                          <label class="form-label" for="inputCity">MRP</label>
                          <input type="text" name="mrp" class="form-control" id="inputCity" required>
                        </div>
                        <div class=" col-md-6 mb-3">
                          <label class="form-label" for="inputCity">Selling Price</label>
                          <input type="text" name="sell_price" class="form-control" id="inputCity" required>
                        </div>
                        <div class=" col-md-6 mb-3">
                          <label class="form-label" for="inputCity">Image</label>
                          <input type="file" name="pro_img" class="form-control" id="inputCity" required>
                        </div>
                        <div class=" col-md-6 mb-3">
                          <label class="form-label" for="inputCity">Meta title</label>
                          <input type="text" name="meta_title" class="form-control" id="inputCity" required>
                        </div>
                        <div class=" col-md-6 mb-3">
                          <label class="form-label" for="inputCity">Meta Keyword</label>
                          <input type="text" name="Meta_key" class="form-control" id="inputCity" required>
                        </div>
                        <div class=" col-md-6 mb-3">
                          <label class="form-label" for="inputCity">Meta Description</label>
                          <input type="text" name="Meta_desc" class="form-control" id="inputCity" required>
                        </div> 
                     <div class="col-md-6 mb-3">
                          <label class="form-label" for="inputState">State</label>
                          <select id="inputState" name="status"class="form-control" required>
                            <option selected>Choose...</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                          </select>
                        </div>
                      </div>
                      <button type="submit" name="add_product" class="btn btn-primary " >Add Catagories</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php include'components/footer.php'?>
      <script>
        function get_subcategories(cat_id){
            var cat_id=cat_id;
            $.ajax({
              url:'function.php',
                method:'post',
                data:{cat_id:cat_id},
                error:function(){
                    alert("Some thing went wrong");
                },
                success:function(data){
                    // $('#myhead').html(data);
                    $("#sub_id").html(data);
                }
            });
        }
      </script>
      