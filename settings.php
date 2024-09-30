<!doctype html>
<html lang="en"><!-- [Head] start -->

<head>
    <title>Mailpap | Settings</title><!-- [Meta] -->
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
                        <div class="card-body border-bottom pb-0 mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h3 class="mb-0">Settings</h3>
                            </div>
                            <ul class="nav nav-tabs analytics-tab" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab" data-bs-target="#analytics-tab-1-pane"
                                        type="button" role="tab" aria-controls="analytics-tab-1-pane"
                                        aria-selected="true">
                                        Upload New Profile
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="analytics-tab-2" data-bs-toggle="tab" data-bs-target="#analytics-tab-2-pane" type="button"
                                        role="tab" aria-controls="analytics-tab-2-pane"
                                        aria-selected="false">
                                        Change User Name & Email
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <div class="flex-shrink-0">
                                                        <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="user-image" class="user-avtar wid-45 rounded-circle" style="width: 70px; height: 70px; border-radius: 50%;">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Upload New Profile Image:</label> 
                                                    <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*" required> 
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" name="upload_image" class="btn btn-primary mb-4 toggle-btn-sub">Upload</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel"
                                aria-labelledby="analytics-tab-2" tabindex="0">
                                <div class="card-body">
                                    <form method="POST">
                                        <?php if ($updateSuccess): ?>
                                            <div class="message success">Update successful!</div>
                                        <?php elseif ($updateError): ?>
                                        <div class="message error"><?php echo $updateError; ?></div>
                                        <?php endif; ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">User Name:</label> 
                                                    <input type="text" id="username" name="username" class="form-control"  value="<?php echo htmlspecialchars($currentUsername); ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Email:</label> 
                                                    <input type="email" class="form-control"  id="email" name="email" value="<?php echo htmlspecialchars($currentEmail); ?>" required>
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