<?php include('../header.php') ?>
<div class="card mt-5">
    <div class="card-header">Search Books</div>
    <div class="card-body">
        <form action="search_books.php" method="GET" class="form-inline mb-3 mt-3">
            <div class="form-group">
                <input type="text" class="form-control mb-2" name="query" placeholder="Search your books">
                <button type="submit" class="btn btn-primary">Search</button>
                <button class="btn btn-primary" type="button" data-toggle="collapse" aria-expanded="false" aria-controls="filterCollapse">
                    Filter
                </button>
                <div class="collapse mt-3" id="filterCollapse">
                    <button class="btn btn-secondary">Category Filter</button>
                    <button class="btn btn-secondary">Price Filter</button>
                </div>
            </div>
        </form>

        <?php
        require_once('../lib/db_login.php');

        if (isset($_GET['query'])) {
            $search_key = $_GET['query'];

            $query = "SELECT b.isbn, b.author, b.title, b.price, c.name AS category_name 
                        FROM books b
                        INNER JOIN categories AS c ON b.categoryid = c.categoryid
                        WHERE b.isbn LIKE '%" . $search_key . "%'
                        OR b.author LIKE '%" . $search_key . "%'
                        OR b.title LIKE '%" . $search_key . "%'
                        ";

            $result = $db->query($query);
            if (!$result) {
                die("Could not query the database: <br />" . $db->error);
            }

            if ($result->num_rows > 0) {
                echo '<table class="table table-striped">';
                echo '<tr>';
                echo '<th>ISBN</th>';
                echo '<th>Title</th>';
                echo '<th>Category</th>';
                echo '<th>Author</th>';
                echo '<th>Price</th>';
                echo '<th>Action</th>';
                echo '</tr>';

                while ($row = $result->fetch_object()) {
                    echo '<tr>';
                    echo '<td>' . $row->isbn . '</td>';
                    echo '<td>' . $row->title . '</td>';
                    echo '<td>' . $row->category_name . '</td>';
                    echo '<td>' . $row->author . '</td>';
                    echo '<td>' . $row->price . '</td>';
                    // echo '<td><a class="btn btn-primary btn-sm" href="show_cart.php?id=' . $row->isbn . '">Add to Cart</a></td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo '<p>No results found!</p>';
            }
        }
        ?>
    </div>
</div>

<?php include('../footer.php') ?>