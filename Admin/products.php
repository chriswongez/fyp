<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
</head>

<script src="../js/jquery-3.5.1.min.js"></script>

<?php include_once("./templates/top.php"); ?>
<?php
// include_once("./templates/navbar.php"); 
?>
<?php
include("../php/dbconnect.php");
?>

<body>


    <div class="container-fluid">
        <div class="row">

            <?php include("./Adminnavbar.php")
            ?>


            <div class="row">
                <div class="col-10">
                    <h2>Product List</h2>
                </div>
                <div class="col-2">
                    <a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add
                        Product</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Price</th>
                            <!-- <th>Quantity</th> -->
                            <th class="text-center">Category</th>
                            <!-- <th>Brand</th> -->
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="product_list">
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM `product`");
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                        <td class='align-middle text-center'>" . $row['productID'] . "</td>
                        <td class='align-middle'>" . $row['productCode'] . "</td>
                        <td class='align-middle'>" . $row['productName'] . "</td>
                        <td class='align-middle'><img class='mx-auto d-block' height='70px' src='../product/" . $row['productImg'] . "' alt='' srcset=''></td>
                        <td class='align-middle text-center'>RM " . number_format((float)$row['productPrice'], 2, '.', '') . "</td>
                        <td class='align-middle text-center'>" . $row['productCategory'] . "</td>
                        <td class='align-middle text-center'><a id='" . $row['productCode'] . "' class='btn btn-sm btn-info' data-toggle='modal' data-target='#edit_product_modal'>Edit</a><a class='btn btn-sm btn-danger'>Hide</a></td>
                    </tr>";
                        }
                        ?>

                        <!-- <tr>
                        <td>1</td>
                        <td>ABC</td>
                        <td>FDGR.JPG</td>
                        <td>122</td>
                        <td>eLECTRONCS</td>
                        <td>aPPLE</td>
                        <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
                    </tr> -->
                    </tbody>
                </table>
            </div>
            </main>
        </div>
    </div>



    <!-- Add Product Modal start -->
    <div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-product-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="product_name" class="form-control"
                                        placeholder="Enter Product Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <select class="form-control brand_list" name="brand_id">
                                        <option value="">Select Brand</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <select class="form-control category_list" name="category_id">
                                        <option value="">Select Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea class="form-control" name="product_desc"
                                        placeholder="Enter product desc"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Qty</label>
                                    <input type="number" name="product_qty" class="form-control"
                                        placeholder="Enter Product Quantity">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" name="product_price" class="form-control"
                                        placeholder="Enter Product Price">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
                                    <input type="text" name="product_keywords" class="form-control"
                                        placeholder="Enter Product Keywords">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                                    <input type="file" name="product_image" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="add_product" value="1">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary add-product">Add Product</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Product Modal end -->

    <!-- Edit Product Modal start -->
    <div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit-product-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" id="e_product_name" value="" name="e_product_name"
                                        class="form-control" placeholder="Enter Product Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input type="text" name="e_product_code" class="form-control"
                                        placeholder="Enter Product Name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control category_list" name="e_category">
                                        <option value="">Food</option>
                                        <option value="">Beverage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea class="form-control" name="e_product_desc"
                                        placeholder="Enter product desc"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" name="e_product_price" class="form-control"
                                        placeholder="Enter Product Price">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                                    <input type="file" name="e_product_image" class="form-control">
                                    <img src="" name="e_product_img" class="img-fluid" height="50px">
                                </div>
                            </div>
                            <input type="hidden" name="pid">
                            <input type="hidden" name="edit_product" value="1">
                            <div class="col-12">
                                <button type="button" class="btn btn-primary submit-edit-product">Save Product
                                    Detail</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Product Modal end -->
</body>

</html>
<?php include_once("./templates/footer.php"); ?>



<!-- <script type="text/javascript" src="./js/products.js"></script> -->
<script>
$('<?php
        $result = mysqli_query($con, "SELECT * FROM `product`");
        $rownum = mysqli_num_rows($result);
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $counter++;
            if ($counter == $rownum)
                echo "#" . $row['productCode'];
            else
                echo "#" . $row['productCode'] . ", ";
        }
        ?>').on('click', function() {
    var id = $(this).attr("id");

    $.ajax({
        type: 'POST',
        url: './php/getrow.php',
        data: {
            passid: id,
        },
        success: (response) => {
            var resp = JSON.parse(response);
            document.querySelector('[name="e_product_name"]').setAttribute("value", resp.prodName);
            document.querySelector('[name="e_product_code"]').setAttribute("value", resp.prodCode);
            document.querySelector('[name="e_category"]').setAttribute("value", resp.prodCategory);
            document.querySelector('[name="e_product_desc"]').setAttribute("placeholder", resp
                .prodDesc);
            document.querySelector('[name="e_product_price"]').setAttribute("value", resp
                .prodPrice);
            document.querySelector('[name="e_product_img"]').setAttribute("src", "../product/" +
                resp
                .prodImg);

        }
    });
});
</script>