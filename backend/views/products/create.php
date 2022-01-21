
<div class="container-fluid">
    <h2>Thêm sản phẩm mới</h2>
    <?php if($this->error != ''): ?>
        <div class="noti-error">
            <p>
                <?php echo $this->error; ?>
            </p>
        </div>
    <?php endif; ?>
    <form class="form-create" action="" method="post" enctype="multipart/form-data">
        <div class="title text-center">
            Nhập thông tin sản phẩm
        </div>
        <div class="row form-group">
            <label for="product_name" class="col-lg-3 text-right">Nhập tên sản phẩm</label>
            <input type="text" class="col-lg-8" id="product_name" name="product_name" value="<?php echo isset($_POST['product_name']) ? $_POST['product_name'] : ''  ?>">
        </div>
        <div class="row form-group">
            <label for="product_image" class="col-lg-3 text-right">Chọn ảnh</label>
            <input type="file" class="col-lg-8" id="product_image" name="product_image">
            <?php if (!empty($product_image)): ?>
                <img src="assets/images/uploads/<?php echo $product_image?>"  height="50px" />
            <?php endif; ?>
        </div>
        <div class="row form-group">
            <label for="brand" class="col-lg-3 text-right">Chọn thương hiệu</label>
            <?php
                $ad_selected = '';
                $ni_selected = '';
                $pu_selected = '';
                $co_selected = '';
                if(isset($_POST['brand'])){
                    $brand = $_POST['brand'];
                    switch ($brand) {
                        case 0: $ad_selected = "selected"; break;
                        case 1: $ni_selected = "selected"; break;
                        case 2: $pu_selected = "selected"; break;
                        case 3: $co_selected = "selected";
                    }
                }
            ?>
            <select class="form-select" name="brand" aria-label="Default select example">
                <option value="0" <?php echo $ad_selected?>>Adidas</option>
                <option value="1" <?php echo $ni_selected?>>Nike</option>
                <option value="2" <?php echo $pu_selected?>>Puma</option>
                <option value="3" <?php echo $co_selected?>>Converse</option>
            </select>
        </div>
        <div class="row form-group">
            <label for="price" class="col-lg-3 text-right">Nhập giá bán</label>
            <input type="text" class="col-lg-8" id="price" name="price" value="<?php echo isset($_POST['price'])? $_POST['price'] : ''; ?>">
        </div>
        <div class="row form-group">
            <label for="size" class="col-lg-3 text-right">Chọn size giày</label>
            <?php
                $checked_38 = '';
                $checked_39 = '';
                $checked_40 = '';
                $checked_41 = '';
                $checked_42 = '';
                if(isset($_POST['size'])){
                    $size = $_POST['size'];
                    switch ($size) {
                        case 38: $checked_38 = "checked"; break;
                        case 39: $checked_39 = "checked"; break;
                        case 40: $checked_40 = "checked"; break;
                        case 41: $checked_41 = "checked"; break;
                        case 42: $checked_42 = "checked";
                    }
                }
            ?>
            <div class="col-lg-8" style="padding-top: 5px">
                <input type="radio" name="size" id="38" value="38" <?php echo $checked_38?>>
                <label for="38">38</label>
                <input type="radio" name="size" id="39" value="39" <?php echo $checked_39?>>
                <label for="39">39</label>
                <input type="radio" name="size" id="40" value="40" <?php echo $checked_40?>>
                <label for="40">40</label>
                <input type="radio" name="size" id="41" value="41" <?php echo $checked_41?>>
                <label for="41">41</label>
                <input type="radio" name="size" id="42" value="42" <?php echo $checked_42?>>
                <label for="42">42</label>
            </div>
        </div>
        <div class="row form-group">
            <label for="color" class="col-lg-3 text-right">Chọn màu</label>
            <?php
            $checked_red = '';
            $checked_yellow = '';
            $checked_blue = '';
            $checked_green = '';
            $checked_black = '';
            if(isset($_POST['color'])){
                $color = $_POST['color'];
                switch ($color) {
                    case "Đỏ": $checked_red = "checked"; break;
                    case "Vàng": $checked_yellow = "checked"; break;
                    case "Xanh lam": $checked_blue = "checked"; break;
                    case "Xanh lá": $checked_green = "checked"; break;
                    case "Đen": $checked_black = "checked";
                }
            }
            ?>
            <div class="col-lg-8" style="padding-top: 5px">
                <input type="radio" name="color" id="red" value="0" <?php echo $checked_red; ?>>
                <label for="red">Đỏ</label>
                <input type="radio" name="color" id="yellow" value="1" <?php echo $checked_yellow; ?>>
                <label for="yellow">Vàng</label>
                <input type="radio" name="color" id="blue" value="2" <?php echo $checked_blue; ?>>
                <label for="blue">Xanh lam</label>
                <input type="radio" name="color" id="green" value="3" <?php echo $checked_green; ?>>
                <label for="green">Xanh lá</label>
                <input type="radio" name="color" id="black" value="4" <?php echo $checked_black; ?>>
                <label for="black">Đen</label>
            </div>
        </div>
        <div class="text-center butt">
            <input type="reset" class="btn btn-warning" value="Reset form">
            <input type="submit" name="submit" class="btn btn-success" value="Lưu">
        </div>
    </form>
    <div class="back">
        <a href="index.php?controller=product&action=index">Về trang danh sách sản phẩm</a>
    </div>

</div>