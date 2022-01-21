<div class="container-fluid">
    <h2>Thông tin sản phẩm</h2>
    <?php if(!empty($this->error)): ?>
        <div class="noti-error">
            <p>
                <?php
                foreach($this->error as $e){
                    echo $e ."<br>" ;
                }
                ?>
            </p>
        </div>
    <?php endif; ?>
        <div class="title text-center">
            Sản phẩm #<?php echo $product['product_id']; ?>
        </div>
    <table id="pro-inf">
        <tr class="row">
            <td class="col-lg-3 text-right name-label">Tên sản phẩm</td>
            <td class="col-lg-8 name-product"><?php echo $product['product_name']; ?></td>
        </tr>
        <tr class="row">
            <td class="col-lg-3 text-right img-label">Ảnh sản phẩm</td>
            <td class="col-lg-8 img">
                <img src="assets/images/uploads/<?php echo $product['product_img']; ?>" alt="<?php echo $product['product_name']; ?>" class="img-rounded">
            </td>
        </tr>
        <tr class="row">
            <td class="col-lg-3 text-right brand-label">Thương hiệu</td>
            <td class="col-lg-8 brand"><?php echo $product['brand']; ?></td>
        </tr>
        <tr class="row">
            <td class="col-lg-3 text-right price-label">Giá bán</td>
            <td class="col-lg-8 price"><?php echo number_format($product['price'],0, '.', ' ') ?><sup>đ</sup></td>
        </tr>
        <tr class="row">
            <td class="col-lg-3 text-right size-label">Size</td>
            <td class="col-lg-8 size"><?php echo $product['size']; ?></td>
        </tr>
        <tr class="row">
            <td class="col-lg-3 text-right color-label">Màu sắc</td>
            <td class="col-lg-8 color"><?php echo $product['color']; ?></td>
        </tr>
    </table>

    <div class="status">
        <a href="index.php?controller=product&action=update&id=<?php echo $product['product_id'] ?>" class="btn btn-warning">Sửa</a>
        <a href="index.php?controller=product&action=delete&id=<?php echo $product['product_id'] ?>" onclick="return confirm('Chắc chắn muốn xóa sản phẩm này?')" class="btn btn-danger">Xóa</a>
    </div>
    <div class="back">
        <a href="index.php?controller=product&action=index">Về trang danh sách sản phẩm</a>
    </div>
</div>