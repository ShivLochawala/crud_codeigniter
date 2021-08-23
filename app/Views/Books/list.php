<?php echo view("Layouts/header.php"); ?>
<div class="container shadow p-0">
    <div class="card-header bg-success">
        <h5 class="block-title text-uppercase text-light">Books
            <a href="/add-book" style="float:right;">
            <button type="button" class="btn btn-dark" data-toggle="tooltip" title="Add Location">
                + Add
            </button>
            </a>
        </h5>
    </div>
            
    <div class="card-body bg-white">
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>ISBN No</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($books): ?>
                <?php foreach($books as $book):?>
                <tr>
                    <td><?php echo $book['id'];?></td>
                    <td><?php echo $book['title'];?></td>
                    <td><?php echo $book['isbn_no'];?></td>
                    <td><?php echo $book['author'];?></td>
                    <td>
                        <a class="btn btn-primary" href="/edit-book/<?php echo $book['id']; ?>">Edit</a>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book detail?')" href="/delete-book/<?php echo $book['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
          
</div>        
<?php echo view("Layouts/footer.php"); ?>
