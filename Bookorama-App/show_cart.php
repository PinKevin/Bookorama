<?php
// File         : show_cart.php
// Deskripsi    : Untuk menambahkan item ke shopping cart dan menampilkan isi shopping cart

// TODO 1: Tuliskan session

?>
<?php include('./header.php') ?>
<br>
<div class="card mt-4">
    <div class="card-header">Shopping Cart</div>
    <div class="card-body">
        <br>
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Author</th>
                <th>Title</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Price * Qty</th>
            </tr>
            <?php
            
                    // TODO 2: Tuliskan dan eksekusi query
            
            ?>
        </table>
        // TODO 3: Panggil total item
        Total items = <br><br>
        <a class="btn btn-primary" href="view_books.php">Continue Shopping</a>
        <a class="btn btn-danger" href="delete_cart.php">Empty Cart</a>
    </div>
</div>
<?php include('./footer.php') ?>