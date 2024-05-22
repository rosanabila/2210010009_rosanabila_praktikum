<main>
    <div class="container-fluid">
        <h1 class="mt-4"></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?php echo site_url('user') ?>">User</a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form action="<?php echo site_url('user/save') ?>" method="post" >
                <div class="mb-3">
                    <label for="nik">NIK<code>*</code></label>
                    <input class="form-control" type="text" name="nik" placeholder="NIK" required ?>
                </div>
                <div class="mb-3">
                    <label for="username">USERNAME <code>*</code></label>
                    <input class="form-control" <?php echo form_error('username') ? 'is-invalid': ''?>"
                        type="text" name="username" placeholder="USERNAME" required />
                    <div class="invalid-feedback">
                        <?php echo form_error('username') ?>
                    </div>
                </div>
                    <div class="mb-3">
                        <label for="username">USERNAME <code>*</code></label>
                        <input class="form-control" type="text" name="nik" placeholder="NIK" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </form>
            </div>
        </div>
    </div>
</main>