<!doctype html>
<html lang="en"><!-- [Head] start -->

<head>
    <title>Mailpap | SMTP Settings</title><!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mailpap | Bulk & Single Sender">
    <meta name="keywords" content="Mailpap | Bulk & Single Sender">
    <meta name="author" content="Mailpap"><!-- [Favicon] icon -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <!-- [Page specific CSS] start --><!-- fileupload-custom css -->
    <link rel="stylesheet" href="assets/css/plugins/dropzone.min.css">
    <!-- [Page specific CSS] end --><!-- [Font] Family -->
    <link rel="stylesheet" href="assets/fonts/inter/inter.css" id="main-font-link">
    <!-- [phosphor Icons] https://phosphoricons.com/ -->
    <link rel="stylesheet" href="assets/fonts/phosphor/duotone/style.css">
    <!-- [Tabler Icons] https://tablericons.com -->
    <link rel="stylesheet" href="assets/fonts/tabler-icons.min.css"><!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="assets/fonts/feather.css">
    <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <!-- [Material Icons] https://fonts.google.com/icons -->
    <link rel="stylesheet" href="assets/fonts/material.css"><!-- [Template CSS Files] -->
    <link rel="stylesheet" href="assets/css/style.css" id="main-style-link">
    <script src="assets/js/tech-stack.js"></script>
    <link rel="stylesheet" href="assets/css/style-preset.css">
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-layout="vertical" data-pc-direction="ltr"
    data-pc-theme_contrast="" data-pc-theme="light"><!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div><!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <?php include 'sidebar/sidebar.php'; ?>

    <!-- [ Profile ] start -->
    <?php include 'profile/profile.php'; ?>

    <div class="pc-container">
        <div class="pc-content"><!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="cad">
                        <div class="card-body border-bottom pb-4 mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0">SMTP Settings</h3>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                                <div class="card-body">
                                <?php if ($message): ?>
                                    <div class="alert alert-info"><?php echo $message; ?></div>
                                <?php endif; ?>
                                    <form action="app/smtp/update_smtp.php" method="post">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Sender From Email:</label> 
                                                    <input type="email" class="form-control" id="smtp_from_email" name="smtp_from_email" value="<?php echo htmlspecialchars($smtp_from_email); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Sender From Name:</label> 
                                                    <input type="text" class="form-control" id="smtp_from_name" name="smtp_from_name" value="<?php echo htmlspecialchars($smtp_from_name); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">SMTP Host:</label> 
                                                    <input type="text" class="form-control" id="smtp_host" name="smtp_host" value="<?php echo htmlspecialchars($smtp_host); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">SMTP Username:</label> 
                                                    <input type="text" class="form-control" id="smtp_username" name="smtp_username" value="<?php echo htmlspecialchars($smtp_username); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">SMTP Password:</label> 
                                                    <input type="password" class="form-control" id="smtp_password" name="smtp_password" value="<?php echo htmlspecialchars($smtp_password); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">SMTP Secure (tls/ssl):</label> 
                                                    <input type="text" class="form-control" id="smtp_secure" name="smtp_secure" value="<?php echo htmlspecialchars($smtp_secure); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">SMTP Port:</label> 
                                                    <input type="number" class="form-control" id="smtp_port" name="smtp_port" value="<?php echo htmlspecialchars($smtp_port); ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-4 toggle-btn-sub">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function layout_change(theme) {
            // Change the theme (light or dark)
            document.body.setAttribute('data-theme', theme);

            // Update active state
            document.querySelectorAll('.preset-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to the selected button
            const selectedBtn = document.querySelector(`.preset-btn[data-value="${theme}"]`);
            if (selectedBtn) {
                selectedBtn.classList.add('active');
            }
        }

        function layout_change_default() {
            // Set the default theme logic (e.g., match system theme)
            document.body.removeAttribute('data-theme');

            // Update active state
            document.querySelectorAll('.preset-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // Add active class to the default button
            const defaultBtn = document.querySelector(`.preset-btn[data-value="default"]`);
            if (defaultBtn) {
                defaultBtn.classList.add('active');
            }
        }
    </script>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/simplebar.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/fonts/custom-font.js"></script>
    <script src="assets/js/pcoded.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script>layout_change('light');</script>
    <script>change_box_container('false');</script>
    <script>layout_caption_change('true');</script>
    <script>layout_rtl_change('false');</script>
    <script>preset_change('preset-1');</script>
    <script>main_layout_change('vertical');</script>
    <script src="assets/js/plugins/dropzone-amd-module.min.js"></script>
</body>

</html>