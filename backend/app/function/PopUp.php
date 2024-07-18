<?php

if (!class_exists('CreatePopup')) {
    class CreatePopup
    {
        public function create($status, $massage, $url)
        {
?>

            <head>
                <link rel="stylesheet" href="./../../assets/css/styles.min.css" />
                <link href="https://cdn.datatables.net/v/dt/dt-2.0.0/datatables.min.css" rel="stylesheet">
                <link href="./../../assets/css/tabler.min.css?1684106062" rel="stylesheet" />
                <link href="./../../assets/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
                <link href="./../../assets/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
                <link href="./../../assets/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
                <link href="./../../assets/css/demo.min.css?1684106062" rel="stylesheet" />
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
                <style>
                    @import url('https://rsms.me/inter/inter.css');

                    :root {
                        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
                    }

                    body {
                        font-feature-settings: "cv03", "cv04", "cv11";
                    }
                </style>
            </head>
            <?
            ?>
            <div class="modal  fade show animate__animated animate__slideInDown" id="<?php echo $status == 'succes' ? 'modal-success' : 'modal-danger' ?>" tabindex="-1" role="dialog" aria-modal="true" style="display: block;">
                <!-- Add animate__animated and animate__slideInDown classes for animation -->
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-status <?php echo $status == 'succes' ? 'bg-success' : 'bg-danger' ?>"></div>
                        <div class="modal-body text-center py-4">
                            <?php if ($status === 'succes') : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                    <path d="M9 12l2 2l4 -4"></path>
                                </svg>
                            <?php else : ?>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z"></path>
                                    <path d="M12 9v4"></path>
                                    <path d="M12 17h.01"></path>
                                </svg>
                            <?php endif; ?>

                            <h3><?php echo $status == 'succes' ? 'succeeded' : 'Upps.... failed' ?></h3>
                            <div class="text-muted"><?php echo $massage ?></div>
                        </div>
                        <div class="modal-footer">
                            <div class="w-100">
                                <div class="row">
                                    <div class="col"><a href="<?php echo $url; ?>" class="<?php echo $status == 'succes' ? 'btn btn-success w-100' : 'btn w-100' ?>"><?php echo $status == 'succes' ? 'Go' : 'Go back' ?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?
            ?>

            <script src="./../../assets/libs/jquery/dist/jquery.min.js"></script>
            <script src="./../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="./../../assets/js/sidebarmenu.js"></script>
            <script src="./../../assets/js/app.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdn.datatables.net/v/dt/dt-2.0.0/datatables.min.js"></script>
<?php
        }
    }
}
?>