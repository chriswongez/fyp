<?php session_start();
include('./php/dbconnect.php');

if (isset($_POST['confirmhide'])) {
    $productCode = $_POST['confirmhide'];
    $query = "UPDATE product SET isHide = '1' WHERE productCode = '$productCode' ";
    $result = mysqli_query($con, $query);
} else if (isset($_POST['confirmunhide'])) {
    $productCode = $_POST['confirmunhide'];
    $query = "UPDATE product SET isHide = '0' WHERE productCode = '$productCode' ";
    $result = mysqli_query($con, $query);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <script src="../js/jquery-3.5.1.min.js"></script>
</head>

<?php
include_once("./templates/top.php");
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
                            if ($row['isHide'] == 0) {
                                echo "<tr>";
                            } else if ($row['isHide'] == 1) {
                                echo "<tr style='background-color:red'>";
                            }
                            echo "<td class='align-middle text-center'>" . $row['productID'] . "</td>
                        <td class='align-middle'>" . $row['productCode'] . "</td>
                        <td class='align-middle'>" . $row['productName'] . "</td>
                        <td class='align-middle'><img class='mx-auto d-block' height='70px' src='../product/" . $row['productImg'] . "' alt='' srcset=''></td>
                        <td class='align-middle text-center'>RM " . number_format((float)$row['productPrice'], 2, '.', '') . "</td>
                        <td class='align-middle text-center'>" . $row['productCategory'] . "</td>
                        <td class='align-middle text-center'><a id='" . $row['productCode'] . "' class='btn btn-sm btn-info' data-toggle='modal' data-target='#edit_product_modal'>Edit</a>";
                            if ($row['isHide'] == 0)
                                echo "<a id='" . $row['productCode'] . "' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#hide_product_modal' onclick='passID(this.id)'>Hide</a>";
                            else if ($row['isHide'] == 1)
                                echo "<a id='" . $row['productCode'] . "' class='btn btn-sm btn-danger' data-toggle='modal' data-target='#unhide_product_modal' onclick='passID(this.id)'>Un-Hide</a>";
                            echo "</td>
                    </tr>";
                        }
                        ?>
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
                    <form method="POST" action="./php/addproduct.php" id="add-product-form"
                        enctype="multipart/form-data">
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
                                    <label>Product Code</label>
                                    <input type="text" name="product_code" class="form-control"
                                        placeholder="Enter Product Code">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control category_list" name="category">
                                        <option value="food">Food</option>
                                        <option value="beve">Beverage</option>
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
                                    <label>Product Price (RM)</label>
                                    <input type="number" name="product_price" class="form-control"
                                        placeholder="Enter Product Price">
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
                                <button type="submit" class="btn btn-primary add-product">Add Product</button>
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
                    <form id="edit-product-form" enctype="multipart/form-data" method="POST"
                        action="./php/addproduct.php">
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
                                        <option value="food">Food</option>
                                        <option value="beve">Beverage</option>
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
                                    <label>Product Price (RM)</label>
                                    <input type="number" name="e_product_price" class="form-control"
                                        placeholder="Enter Product Price">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                                    <input type="file" name="e_product_image" class="form-control">
                                    <img src="" name="e_product_img" class="img-fluid">
                                </div>
                            </div>
                            <input type="hidden" name="oricode">
                            <input type="hidden" name="edit_product" value="1">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary submit-edit-product">Save Product
                                    Detail</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Product Modal end -->

    <div class="modal fade" id="hide_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="POST">
                        <div class="row">
                            <div class="col">Do you want to hide this food from the menu?</div>
                            <div class="col-2"><button class="btn btn-sm btn-info" type="submit" name="confirmhide"
                                    value="">Yes</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="unhide_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form method="POST">
                        <div class="row">
                            <div class="col">Do you want to unhide this food and make it visible on the menu?</div>
                            <div class="col-2"><button class="btn btn-sm btn-info" type="submit" name="confirmunhide"
                                    value="">Yes</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>




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
            document.querySelector('[name="e_product_desc"]').innerHTML = resp.prodDesc;
            document.querySelector('[name="e_product_price"]').setAttribute("value", resp
                .prodPrice);
            document.querySelector('[name="e_product_img"]').setAttribute("src", "../product/" +
                resp
                .prodImg);
            document.querySelector('[name="oricode"]').setAttribute("value", resp.prodCode);

        }
    });
});

function passID(code) {
    document.querySelector('[name="confirmhide"]').setAttribute("value", code);
    document.querySelector('[name="confirmunhide"]').setAttribute("value", code);
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>