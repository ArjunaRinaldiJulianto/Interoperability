<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?= URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward mx-1"></i>Kembali</a>
    <br>
    <div class="row">
        <div class="col-11">
            <h1><?= $data['post']->title; ?></h1>
        </div>
        <div class="col-1">
            <!-- Tombol berbagi untuk Facebook -->
            <a class="me-1" href="https://www.facebook.com/sharer/sharer.php?u=<?= $data['currentURL']; ?>" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/900px-Facebook_f_logo_%282019%29.svg.png" class="img-fluid" style="width: 30px;" alt="Bagikan di Facebook">
            </a>

            <!-- Tombol berbagi untuk Twitter -->
            <a href="https://twitter.com/intent/tweet?url=<?= $data['currentURL']; ?>" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/X_logo_2023.svg/180px-X_logo_2023.svg.png" class="img-fluid" style="width: 30px;" alt="Bagikan di Twitter">
            </a>
        </div>
    </div>

    
    <div class="bg-secondary text-white p-2 mb-3">
        Ditulis oleh <?= $data['user']->name; ?> pada <?= $data['post']->created_at; ?>
    </div>
    <p><?= $data['post']->body; ?></p>

    <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
        <hr>
        <div class="row mt-4">
            <div class="col d-grid">
                <a href="<?= URLROOT; ?>/posts/edit/<?= $data['post']->id; ?>" class="btn btn-dark w-25">Edit</a>
            </div>
            <div class="col d-grid">
                <form class="text-end" action="<?= URLROOT; ?>/posts/delete/<?= $data['post']->id; ?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
        </div>
    <?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>