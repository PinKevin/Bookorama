<?php include('./header.php') ?>
<div class="card mt-5">
    <div class="card-header">Books Data</div>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Category</th>
                <th>Author</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            // Include our login information
            require_once('../Bookorama-App/lib/db_login.php');

            // TODO 1: Tuliskan dan eksekusi query
            $query = 'SELECT isbn, title, categoryid, author, price FROM books ORDER BY isbn';
            $result = $db->query($query);
            if (!$result) {
                die('Tidak dapat terhubung dengan database');
            }

            $i = 1;
            while ($row = $result->fetch_object()) {
                echo '<tr>';
                echo '<td>' . $row->isbn . '</td>';
                echo '<td>' . $row->title . '</td>';
                echo '<td>' . $row->categoryid . '</td>';
                echo '<td>' . $row->author . '</td>';
                echo '<td>' . $row->price . '</td>';
                echo '<td>';
                echo '<a class="btn btn-warning btn-sm" href="edit_customer.php?id='
                    . $row->isbn . '">Edit</a>&nbsp;&nbsp';
                echo '<a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id=' 
                    . $row->isbn . '">Delete</a>';
                echo '</td>';
                // echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a></td>';
                echo '</tr>';
                $i++;
            }
            echo '</table>';
            echo '<br />';
            echo 'Total Rows = ' . $result->num_rows;

            $result->free();
            $db->close();
            ?>
    </div>
</div>
<?php include('./footer.php') ?>