<?php echo view("Layouts/header.php"); ?>
<div class="container shadow p-0">
    <div class="card-header bg-success">
        <h5 class="block-title text-uppercase text-light">Add Book
            <a href="/books" style="float:right;">
            <button type="button" class="btn btn-dark" data-toggle="tooltip" title="Add Location">
                Back
            </button>
            </a>
        </h5>
    </div>
            
    <div class="card-body bg-white">
        <form  name="add_book" id="add_book" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Book Name</label>
                <input type="text" name="name" class="form-control <?php
                    echo (isset($validation) && $validation->hasError('name'))?'is-invalid':''; ?>" id="name" placeholder="Please enter Book Name" value="<?php echo set_value('name'); ?>">
                <span class="text-danger"><?php
                    if(isset($validation) && $validation->hasError('name')){
                        echo $validation->getError('name');
                    }
                ?>
                </span>
            </div>       
            <div class="form-group">
                <label for="email">Author</label>
                <input type="text" name="author" class="form-control <?php
                    echo (isset($validation) && $validation->hasError('author'))?'is-invalid':''; ?>" id="author" placeholder="Please enter Author Name" value="<?php echo set_value('author'); ?>">
                <span class="text-danger"><?php
                    if(isset($validation) && $validation->hasError('author')){
                        echo $validation->getError('author');
                    }
                ?>
                </span>
            </div>
                   
            <div class="form-group">
                <label for="email">ISBN No</label>
                <input type="text" name="isbn_no" class="form-control <?php
                    echo (isset($validation) && $validation->hasError('isbn_no'))?'is-invalid':''; ?>" id="isbn_no" placeholder="Please enter ISBN No" value="<?php echo set_value('isbn_no'); ?>">
                <span class="text-danger"><?php
                    if(isset($validation) && $validation->hasError('isbn_no')){
                        echo $validation->getError('isbn_no');
                    }
                ?>
                </span>
            </div> 
            <div class="form-group">
                <button type="submit" id="send_form" class="btn btn-dark">Submit</button>
            </div>
        </form>
    </div>    
</div>        
<?php echo view("Layouts/footer.php"); ?>
