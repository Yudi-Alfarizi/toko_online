    <!-- alert simple -->
    <!-- <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger" role="alert">
            <p><strong>Whoops!</strong> Ada beberapa masalah dengan masukan Anda.</p>
            <ul>
                <?php foreach ($errors as $field => $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif ?>

    <?php if (!empty($session->getFlashdata('success'))): ?>
        <div class="alert alert-success">
            <?= $session->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($session->getFlashdata('errors'))): ?>
        <div class="alert alert-danger ">
            <?= $session->getFlashdata('errors') ?>
        </div>
    <?php endif; ?> -->


    <!-- Alert + close button -->
    <!-- <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p><strong>Whoops!</strong> Ada beberapa masalah dengan masukan Anda.</p>
            <ul>
                <?php foreach ($errors as $field => $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (!empty($session->getFlashdata('success'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= esc($session->getFlashdata('success')) ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (!empty($session->getFlashdata('errors'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= esc($session->getFlashdata('errors')) ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?> -->



    <!-- alert otomatis -->
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger alert-dismissible fade show auto-dismiss" role="alert">
            <p class="text-center"><i class="fas fa-exclamation-triangle mr-2"></i><strong>Whoops!</strong></p>
            <p class="text-center">Ada masalah dengan masukan Anda.</p>
            <ul>
                <?php foreach ($errors as $field => $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($session->getFlashdata('success'))) : ?>
        <div class="alert alert-success alert-dismissible fade show auto-dismiss" role="alert">
            <i class="fas fa-check-circle mr-2"></i>
            <?= esc($session->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($session->getFlashdata('errors'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show auto-dismiss" role="alert">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <?= esc($session->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>