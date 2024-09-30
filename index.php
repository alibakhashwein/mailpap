<!doctype html>
<html lang="en"><!-- [Head] start -->

<head>
    <title>Mailpap | Bulk & Single Sender</title><!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mailpap Bulk sender and CRM">
    <meta name="keywords" content="Mailpap Bulk sender and CRM">
    <meta name="author" content="Mailpap send easy send smart">

    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/fonts/inter/inter.css" id="main-font-link">
    <link rel="stylesheet" href="assets/fonts/phosphor/duotone/style.css">

    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <link rel="stylesheet" href="assets/fonts/tabler-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/feather.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome.css">
    <link rel="stylesheet" href="assets/fonts/material.css">

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
    </div>
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
                                <h3 class="mb-0">Bulk and Single Sender</h3>
                            </div>
                            <ul class="nav nav-tabs analytics-tab" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab" data-bs-target="#analytics-tab-1-pane"
                                        type="button" role="tab" aria-controls="analytics-tab-1-pane"
                                        aria-selected="true">
                                        Bulk Sender
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="analytics-tab-2" data-bs-toggle="tab" data-bs-target="#analytics-tab-2-pane" type="button"
                                        role="tab" aria-controls="analytics-tab-2-pane"
                                        aria-selected="false">
                                        Single Sender
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="analytics-tab-3" data-bs-toggle="tab" data-bs-target="#analytics-tab-3-pane" type="button"
                                        role="tab" aria-controls="analytics-tab-3-pane"
                                        aria-selected="false">
                                        Customers
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" class="colorForm">
                                        <?php echo $message; ?>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Upload CSV File</label>
                                            <input type="file" name="csv_file" class="form-control" accept=".csv" required />
                                        </div>
                                        <input type="hidden" name="template_id" id="template_id">
                                        <input type="hidden" name="csv_send" value="1">
                                        
                                        <div class="form-group mb-3">
                                            <label for="email_label" class="form-label">Email Subject</label>
                                            <input type="text" id="email_label" name="email_subject" class="form-control" placeholder="Email Subject" required />
                                        </div>                            
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="template">Select Template:</label>
                                            <select class="form-control toggle-select" id="template" name="template" onchange="toggleForm('toggle-select')">
                                                <option value="default" disabled selected>-- Select Template --</option>
                                                <?php foreach ($templates as $template): ?>
                                                    <option value="<?php echo $template['id']; ?>"><?php echo $template['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        
                                        <?php
                                            // Fetch the template IDs from the email_templates table
                                            $query = "SELECT id FROM email_templates";
                                            $stmt = $connect->prepare($query);
                                            $stmt->execute();
                                            
                                            // Fetch all the template IDs
                                            $template_ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <div id="template-form-container-1-<?php echo htmlspecialchars($template['id']); ?>" style="display: none;">
                                            <?php
                                                include 'template/bulk/default.php';
                                            ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel"
                                aria-labelledby="analytics-tab-2" tabindex="0">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" class="colorForm">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email ( e.g: email@example.com (name) )</label><br>
                                            
                                            <!-- <input type="file" name="csv_file" class="form-control-file" accept=".csv" required /> -->
                                            <input type="text" name="email_address" class="form-control" placeholder="Email" required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email Subject</label>
                                            <input type="text" name="email_subject" class="form-control" placeholder="Email Subject" required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="template_id">Select Template:</label>
                                            <select class="form-control toggle-select-2" id="template_id" name="template_id" onchange="toggleForm('toggle-select-2')">
                                                <option value="default" disabled selected>-- Select Template --</option>
                                                <?php foreach ($templates as $template): ?>
                                                    <option value="<?php echo $template['id']; ?>"><?php echo $template['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        
                                        <?php
                                            // Fetch the template IDs from the email_templates table
                                            $query = "SELECT id FROM email_templates";
                                            $stmt = $connect->prepare($query);
                                            $stmt->execute();
                                            
                                            // Fetch all the template IDs
                                            $template_ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <div id="template-form-container-2-<?php echo htmlspecialchars($template['id']); ?>" style="display: none;">
                                            <?php
                                                include 'template/single/default.php';
                                            ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="analytics-tab-3-pane" role="tabpanel"
                                aria-labelledby="analytics-tab32" tabindex="0">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" class="mt-3" action="bulk_email_customer.php">
                                        <?php
                                        // Fetch unique categories from subscribers where the status is 'subscribed'
                                        $sql = "SELECT DISTINCT category FROM subscribers WHERE status = 'subscribed'";
                                        $stmt = $connect->prepare($sql);
                                        $stmt->execute();
                                        
                                        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="category">Select Category:</label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option value="" disabled selected>Select category</option>
                                                <!-- Loop through categories dynamically -->
                                                <?php foreach ($categories as $category): ?>
                                                    <option value="<?php echo $category['category']; ?>">
                                                        <?php echo $category['category']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Email Subject</label>
                                            <input type="text" name="email_subject" class="form-control" placeholder="Email Subject" required />
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="template_id">Select Template:</label>
                                            <select class="form-control toggle-select-3" id="template_id" name="template_id" onchange="toggleForm('toggle-select-3')">
                                                <option value="default" disabled selected>-- Select Template --</option>
                                                <?php foreach ($templates as $template): ?>
                                                    <option value="<?php echo $template['id']; ?>"><?php echo $template['name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        
                                        <?php
                                            // Fetch the template IDs from the email_templates table
                                            $query = "SELECT id FROM email_templates";
                                            $stmt = $connect->prepare($query);
                                            $stmt->execute();
                                            
                                            // Fetch all the template IDs
                                            $template_ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <div id="template-form-container-3-<?php echo htmlspecialchars($template['id']); ?>" style="display: none;">
                                            <?php
                                                include 'template/customers/default.php';
                                            ?>
                                        </div>
                                    </form>
                                    <script>
                                        // Initialize CKEditor for the customers message textarea
                                        ClassicEditor
                                            .create(document.querySelector('#customer_message'))
                                            .then(editor => {
                                                window.customerEditor = editor; // Make the editor instance globally accessible
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    
                                        // Function to load the selected note's body into the CKEditor
                                        function loadNoteBody() {
                                            const subjectSelecttwo = document.getElementById('subjectSelecttwo'); // Get the dropdown element
                                            const selectedBody = subjectSelecttwo.value; // Get the body of the selected option
                                    
                                            // Update CKEditor's content dynamically
                                            if (window.customerEditor) { // Check if the editor is initialized
                                                window.customerEditor.setData(selectedBody); // Set CKEditor content to the selected note's body
                                            }
                                        }
                                    </script>

                                    
                                    <script>
                                      ClassicEditor
                                        .create(document.querySelector('#email_description'))
                                        .then(editor => {
                                            window.editor = editor;
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                    
                                      // Function to load the note content into the CKEditor
                                      function loadNoteContent() {
                                          const selectedBody = document.getElementById('subject').value;
                                    
                                          // Set the content in the CKEditor
                                          window.editor.setData(selectedBody);
                                      }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/fontawesome.js" crossorigin="anonymous"></script>
    <script>
        // Tab functionality
        const tabSettings = document.getElementById('tabSettings');
        const tabProfile = document.getElementById('tabProfile');
        const tabContentSettings = document.getElementById('tabContentSettings');
        const tabContentProfile = document.getElementById('tabContentProfile');

        tabSettings.addEventListener('click', () => {
            tabSettings.classList.add('active');
            tabProfile.classList.remove('active');
            tabContentSettings.style.display = 'block';
            tabContentProfile.style.display = 'none';
        });

        tabProfile.addEventListener('click', () => {
            tabProfile.classList.add('active');
            tabSettings.classList.remove('active');
            tabContentProfile.style.display = 'block';
            tabContentSettings.style.display = 'none';
        });
    </script>

     <script>
        // Function to show confirmation dialog
        function confirmSend() {
            // Show confirmation dialog
            var confirmed = confirm("Are you sure you want to send?");
            // If user clicks OK, return true to submit the form
            if (confirmed) {
                return true;
            } else {
                // If user clicks Cancel, return false to cancel form submission
                return false;
            }
        }
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap5.min.js"></script>
    <script src="js/all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $(".sidebar-tggl").on("click", function() {
            $(".side-bars").toggleClass("act");
        });
    </script>
    
    
    <script>
        document.getElementById('template').addEventListener('change', function() {
            document.getElementById('template_id').value = this.value;
        });
    </script>
    
    
    
    <script>
        const sun = document.querySelector('.sun')
        const moon = document.querySelector('.moon')
        const button = document.querySelector('.containerrr')
        
        button.addEventListener('click', () => {
        sun.classList.toggle('visible')
        moon.classList.toggle('visible')
        })
    </script>
    
    <script>
        // Function to toggle dark mode
        function toggleDarkMode() {
            const dashboard = document.getElementById('dashboard');
            dashboard.classList.toggle('dark-mode');

            // Save preference to local storage
            if (dashboard.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.removeItem('darkMode');
            }
        }

        // Check local storage on page load
        document.addEventListener('DOMContentLoaded', () => {
            const dashboard = document.getElementById('dashboard');
            if (localStorage.getItem('darkMode') === 'enabled') {
                dashboard.classList.add('dark-mode');
            }

            // Add event listener to the toggle button
            document.getElementById('darkModeToggle').addEventListener('click', toggleDarkMode);
        });
    </script>
    
    <script>
        function toggleForm(className) {
            var selectElements = document.getElementsByClassName(className);
            for (var i = 0; i < selectElements.length; i++) {
                var selectElement = selectElements[i];
                var selectedValue = selectElement.value;
                var formContainerId;

                // Determine the form container ID based on the selected class
                if (className === 'toggle-select') {
                    formContainerId = 'template-form-container-1-' + <?php echo htmlspecialchars($template['id']); ?>;
                } else if (className === 'toggle-select-2') {
                    formContainerId = 'template-form-container-2-' + <?php echo htmlspecialchars($template['id']); ?>;
                } else if (className === 'toggle-select-3') { // New condition for the third select
                    formContainerId = 'template-form-container-3-' + <?php echo htmlspecialchars($template['id']); ?>;
                }

                var formContainer = document.getElementById(formContainerId);

                // Hide all form containers first
                var allFormContainers = document.querySelectorAll('[id^="template-form-container-"]');
                allFormContainers.forEach(function(container) {
                    container.style.display = 'none';
                });

                if (formContainer) {
                    formContainer.style.display = 'block'; // Show the specific form container
                }
            }
        }
    </script>


    <!-- preloder start -->
    <div class="preloader">
        <div class="loader"></div>
    </div>
    <script src="js/main.js"></script>
    <!-- preloder end -->

    <script src="js/app.js"></script>

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
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/plugins/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard-default.js"></script><!-- [Page Specific JS] end --><!-- Required Js -->
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
</body>

</html>