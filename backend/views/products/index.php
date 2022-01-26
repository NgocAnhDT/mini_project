
<div class="container-fluid">
    <h2>Danh sách sản phẩm</h2>
    <a href="index.php?controller=product&action=create" class="btn btn-success">Thêm sản phẩm mới</a>
    <div class="products row">
        <?php foreach ($products as $product) : ?>
            <div class="col-lg-3 col-md-6 col-sm-12 text-center mr-tb-20">
                <div class="product">
                    <div class="product-image">
                        <a href="index.php?controller=product&action=detail&id=<?php echo $product['product_id'] ?>">
                            <img src="assets/images/uploads/<?php echo $product['product_img'] ?>" alt="<?php echo $product['product_name'] ?>">
                        </a>
                    </div>
                    <div class="product-name">
                        <?php echo $product['product_name'] ?>
                    </div>
                    <div class="product-price">
                        <?php echo number_format($product['price'],0,'.', ' '); ?><sup>đ</sup>
                    </div>
                    <div class="status">
                        <a href="index.php?controller=product&action=detail&id=<?php echo $product['product_id'] ?>" class="btn btn-info">Chi tiết</a>
                        <a href="index.php?controller=product&action=update&id=<?php echo $product['product_id'] ?>" class="btn btn-warning">Sửa</a>
                        <a href="index.php?controller=product&action=delete&id=<?php echo $product['product_id'] ?>" onclick="return confirm('Chắc chắn muốn xóa sản phẩm này?')" class="btn btn-danger">Xóa</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pagination">
        <?php
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="index.php?controller=product&action=index&page='.($current_page-1).'" class="btn btn-default"><</a> ';
            }

            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<a href="index.php?controller=product&action=index&page='.$i.'" class="btn btn-warning">'.$i.'</a> ';
                }
                else{
                    echo '<a href="index.php?controller=product&action=index&page='.$i.'" class="btn btn-default">'.$i.'</a> ';
                }
            }

            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="index.php?controller=product&action=index&page='.($current_page+1).'" class="btn btn-default">></a>';
            }
        ?>
    </div>
</div>