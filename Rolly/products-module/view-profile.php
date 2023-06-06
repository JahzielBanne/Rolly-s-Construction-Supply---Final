<?php
if ($user->get_user_access($user_id) !== "Owner" && $id !== $user_id) {
    header('location: index.php?page=products&subpage=view');
} else {
    ?>
    <h3 style="text-align:center;">Provide the Required Information</h3>
    <div class="btn-box">
        <a class="btn-jsactive" onclick="document.getElementById('id02').style.display='block'">Delete Product</a>
    </div>
    <br>
    <div id="form-block">
        <form method="POST" action="processes/process.product.php?action=update">
            <div id="form-block-half">
                <label for="pname">Product name</label>
                <input type="text" id="pname" class="input" name="pname" value="<?php echo $product->get_product_name($id); ?>" placeholder="<?php echo $product->get_product_name($id); ?>">

                <label for="category">Category</label>
                <select id="category" name="category">
                    <option value="sand" <?php if ($product->get_product_category($id) == "Sand") {
                        echo "selected";
                    }; ?>>Sand</option>
                    <option value="metal" <?php if ($product->get_product_category($id) == "Metal") {
                        echo "selected";
                    }; ?>>Metal</option>
                    <option value="stone" <?php if ($product->get_product_category($id) == "Stone") {
                        echo "selected";
                    }; ?>>Stone</option>
                    <option value="wood" <?php if ($product->get_product_category($id) == "Wood") {
                        echo "selected";
                    }; ?>>Wood</option>
                </select>
            </div>
            <div id="form-block-half">
                <label for="status">Product Status</label>
                <select id="status" name="status" disabled>
                    <option <?php if ($product->get_product_status($id) == "0") {
                        echo "selected";
                    }; ?>>Deactivated</option>
                    <option <?php if ($product->get_product_status($id) == "1") {
                        echo "selected";
                    }; ?>>Active</option>
                </select>
                <label for="price">Price</label>
                <input type="number" id="price" class="input" name="price" value="<?php echo $product->get_product_price($id); ?>" placeholder="Enter Price...">
            </div>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <div id="button-block">
                <input type="submit" value="Update">
            </div>
        </form>
    <?php } ?>
    <div id="id01" class="modal">
        <div id="form-update" class="modal-content">
            <div class="container">
                <h2>Change Product Status</h2>
                <p>Are you sure you want to change the product status?</p>
                <div class="clearfix">
                    <?php
                    if ($product->get_product_status($id) == "1") {
                        ?>
                        <button class="confirmbtn" onclick="disableSubmit()">Confirm</button>
                    <?php } else { ?>
                        <button class="confirmbtn" onclick="enableSubmit()">Confirm</button>
                    <?php }; ?>
                    <button class="cancelbtn" onclick="document.getElementById('id01').style.display='none'">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div id="id02" class="modal">
        <div id="form-update" class="modal-content">
            <div class="container">
                <h2>Delete Product</h2>
                <p>Are you sure you want to delete the product?</p>
                <div class="clearfix">
                    <a href="processes/process.product.php?action=delete&id=<?php echo $id;?>" class="btn-jsactive">Delete</a>
                    <a class="cancelbtn" onclick="document.getElementById('id02').style.display='none'">Cancel</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        var modal = document.getElementById('id01');
        var modalDelete = document.getElementById('id02');

        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            } else if (event.target == modalDelete) {
                modalDelete.style.display = "none";
            }
        }
    </script>
