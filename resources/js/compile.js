import "./bootstrap";
import "./components/staff/cmpt-staff-table-header.js";
import "./components/student/cmpt-student-reports.js";
import "./components/admin/admin.js";

$(document).ready(function () {
    $("#add-btn").click(function () {
        const addModal = $("#addModal");

        addModal.modal("show");
    });
});

$(document).ready(function () {
    $("#add-btn").click(function () {
        const addModal = $("#addModal");

        addModal.modal("show");
    });
});

$(document).ready(function () {
    $("#grade-button").click(function () {
        const addModal = $("#student-acd-rpt-modal");

        addModal.modal("show");
    });
});

$(document).ready(function () {
    // Add a click event handler to the "Edit" buttons
    $(".edit-grade-btn").on("click", function () {
        const modal = $("#student-acd-rpt-modal");

        // Get the data attributes
        const courseId = $(this).data("academic-id");
        const courseCode = $(this).data("academic-course_code");
        const firstSem1stYear = $(this).data("academic-first_sem_1st_year");
        const secondSem1stYear = $(this).data("academic-second_sem_1st_year");
        const firstSem2ndYear = $(this).data("academic-first_sem_2nd_year");
        const secondSem2ndYear = $(this).data("academic-second_sem_2nd_year");
        const gpa = $(this).data("academic-gpa");

        // Populate the modal fields with the data attributes
        modal.find("#id").val(courseId);
        modal.find("#course_code").val(courseCode);
        modal.find("#first_sem_1st_year").val(firstSem1stYear);
        modal.find("#second_sem_1st_year").val(secondSem1stYear);
        modal.find("#first_sem_2nd_year").val(firstSem2ndYear);
        modal.find("#second_sem_2nd_year").val(secondSem2ndYear);
        modal.find("#gpa").val(gpa);

        modal.modal("show");
    });
});

$(document).ready(function () {
    $("#addGradeBtn").click(function () {
        const addModal = $("#add-student-grd-modal");

        addModal.modal("show");
    });
});

$(document).ready(function () {
    $("#edt-dcpl-btn").click(function () {
        const addModal = $("#student-dcpl-rpt-edit-modal");

        addModal.modal("show");
    });
});

$(document).ready(function () {
    $("#addDiscplinaryBtn").click(function () {
        const addModal = $("#student-selection-modal");

        addModal.modal("show");
    });
});

$(document).ready(function () {
    $("#selectToAdd").click(function () {
        const addModal = $("#student-selection-modal");

        addModal.modal("show");
    });
});

$(document).ready(function () {
    $("#addSelectButton").click(function () {
        $("#student-selection-modal").modal("show");
    });
});

$(document).ready(function () {
    $(".select-student-link").on("click", function (event) {
        event.preventDefault();

        $("#student-selection-modal").modal("hide");
    });
});

$(document).ready(function () {
    $("#closeButton").on("click", function (event) {
        event.preventDefault();

        $("#add-student-dcpl-modal").modal("hide");
    });
});

$(document).ready(function () {
    $("#add-student-dcpl-modal").on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);
        const studentId = button.data("student-id");

        const studentLName = button.data("student-lname");
        const studentFName = button.data("student-fname");

        $(".first_name").val(studentFName);
        $(".last_name").val(studentLName);
        $(".student_id").val(studentId);
    });
});

$(document).ready(function () {
    // Function to hide the loading spinner
    function hideLoadingSpinner() {
        loadingOverlay.hide();
        $("body").css("overflow", "auto");
    }

    function returnToIndex() {
        window.location.href = "/students";
    }

    $("#edit-student-info-form").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Show the loading spinner when the form is submitted
        showLoadingSpinner();

        // Perform an AJAX form submission
        $.ajax({
            url: $(this).attr("action"), // Use the form's action attribute as the URL
            type: $(this).attr("method"), // Use the form's method attribute as the HTTP method
            data: $(this).serialize(), // Serialize the form data

            success: function (response) {
                // Display a success Toastr notification if it hasn't been shown already
                if (!successNotificationShown) {
                    returnToIndex();
                    toastr.success("Student information updated successfully!");
                    successNotificationShown = true; // Set the flag to true
                }

                // Optionally, you can redirect to another page after success
                // window.location.href = "{{ route('your.redirect.route') }}";
            },
            error: function (error) {
                // Hide the loading spinner when there's an error
                hideLoadingSpinner();

                // Handle errors if needed
                toastr.error("An error occurred while submitting the form.");
            },
        });
    });
});

$(document).ready(function () {
    const loadingOverlay = $(".loading-spinner-overlay");
    let successNotificationShown = false; // Flag to track whether the success notification has been shown

    // Function to show the loading spinner
    function showLoadingSpinner() {
        loadingOverlay.show();
        $("body").css("overflow", "hidden");
    }

    // Function to hide the loading spinner
    function hideLoadingSpinner() {
        loadingOverlay.hide();
        $("body").css("overflow", "auto");
    }

    function returnToIndex() {
        window.location.href = "/students";
    }

    $("#edit-form").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Show the loading spinner when the form is submitted
        showLoadingSpinner();

        // Perform an AJAX form submission
        $.ajax({
            url: $(this).attr("action"), // Use the form's action attribute as the URL
            type: $(this).attr("method"), // Use the form's method attribute as the HTTP method
            data: $(this).serialize(), // Serialize the form data

            success: function (response) {
                // Display a success Toastr notification if it hasn't been shown already
                if (!successNotificationShown) {
                    returnToIndex();
                    toastr.success("Student information added successfully!");
                    successNotificationShown = true; // Set the flag to true
                }

                // Optionally, you can redirect to another page after success
                // window.location.href = "{{ route('your.redirect.route') }}";
            },
            error: function (error) {
                // Hide the loading spinner when there's an error
                hideLoadingSpinner();
                console.log(error);
                // Handle errors if needed
                toastr.error("An error occurred while submitting the form.");
            },
        });
    });
});

$(document).ready(function () {
    const loadingOverlay = $(".loading-spinner-overlay");
    let successNotificationShown = false; // Flag to track whether the success notification has been shown

    // Function to show the loading spinner
    function showLoadingSpinner() {
        loadingOverlay.show();
        $("body").css("overflow", "hidden");
    }

    // Function to hide the loading spinner
    function hideLoadingSpinner() {
        loadingOverlay.hide();
        $("body").css("overflow", "auto");
    }

    $("#new-form-dcpl").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Show the loading spinner when the form is submitted
        showLoadingSpinner();

        // Perform an AJAX form submission
        $.ajax({
            url: $(this).attr("action"), // Use the form's action attribute as the URL
            type: $(this).attr("method"), // Use the form's method attribute as the HTTP method
            data: $(this).serialize(), // Serialize the form data

            success: function (response) {
                // Display a success Toastr notification if it hasn't been shown already
                if (!successNotificationShown) {
                    returnToIndex();
                    toastr.success("Student added successfully!");
                    successNotificationShown = true; // Set the flag to true
                }

                // Optionally, you can redirect to another page after success
                // window.location.href = "{{ route('your.redirect.route') }}";
            },
            error: function (error) {
                // Hide the loading spinner when there's an error
                hideLoadingSpinner();

                // Handle errors if needed
                toastr.error("An error occurred while submitting the form.");
            },
        });

        function returnToIndex() {
            window.location.href = "/reports-dcpl";
        }
    });
});

$(document).ready(function () {
    const loadingOverlay = $(".loading-spinner-overlay");
    let successNotificationShown = false; // Flag to track whether the success notification has been shown
    const studentId = $("#edit-form").data("student-id");
    $("#student_id").val(studentId);

    // Function to show the loading spinner
    function showLoadingSpinner() {
        loadingOverlay.show();
        $("body").css("overflow", "hidden");
    }

    // Function to hide the loading spinner
    function hideLoadingSpinner() {
        loadingOverlay.hide();
        $("body").css("overflow", "auto");
    }

    // Define a variable to track if the modal is already open
    let isModalOpen = false;

    $("#edit-student-dcpl-modal").on("show.bs.modal", function (event) {
        // Check if the modal is already open
        if (isModalOpen) {
            return;
        }

        const button = $(event.relatedTarget);
        const studentId = button.data("student-id");
        const verbalWarningDate = button.data("verbal-warning-date");
        const verbalWarningDesc = button.data("verbal-warning-desc");
        const writtenWarningDate = button.data("written-warning-date");
        const writtenWarningDesc = button.data("written-warning-desc");
        const provisionaryDate = button.data("provisionary-warning-date");
        const provisionaryDesc = button.data("provisionary-warning-desc");
        const studentUrl = button.data("student-url");
        const studentLName = button.data("student-lname");
        const studentFName = button.data("student-fname");

        $("#edit-form").attr(
            "action",
            studentUrl.replace("__student_id__", studentId)
        );

        $("#student_id").val(studentId);
        $("#verbal_warning_date").val(verbalWarningDate);
        $("#verbal_warning_description").val(verbalWarningDesc);

        $("#written_warning_date").val(writtenWarningDate);
        $("#written_warning_description").val(writtenWarningDesc);

        $("#provisionary_date").val(provisionaryDate);
        $("#provisionary_description").val(provisionaryDesc);

        $("#first_name").val(studentFName);
        $("#last_name").val(studentLName);

        // Set isModalOpen to true when the modal is open
        isModalOpen = true;

        // Handle the modal close event to reset isModalOpen
        $(this).on("hidden.bs.modal", function () {
            isModalOpen = false;
        });

        // Handle the form submission
        $("#edit-form #saveEdit").on("click", function () {
            const form = $("#edit-form");
            const studentUrl = form.data("student-url");
            const studentId = $("#student_id").val();
            const studentRoute = form.data("student-route");

            // Show the loading spinner when the form is submitted
            showLoadingSpinner();

            // Replace '__student_id__' with the actual studentId
            const url = studentUrl.replace("__student_id__", studentId);

            // Serialize the form data
            const formData = form.serialize();

            function returnToIndex() {
                window.location.href = "/reports-dcpl";
            }

            // Make an AJAX POST request to submit the form data
            $.ajax({
                url: url, // Use the updated URL
                type: "POST", // Change to POST
                data: formData,
                success: function () {
                    // Display a success Toastr notification if it hasn't been shown already
                    if (!successNotificationShown) {
                        returnToIndex();
                        toastr.success(
                            "Student disciplinary record updated successfully!"
                        );
                        successNotificationShown = true; // Set the flag to true
                    }

                    // Optionally, you can redirect to another page after success
                    // window.location.href = "{{ route('your.redirect.route') }}";
                },
                error: function () {
                    // Hide the loading spinner when there's an error
                    hideLoadingSpinner();

                    // Handle errors if needed
                    toastr.error(
                        "An error occurred while submitting the form."
                    );
                },
            });
        });
    });
});

$(document).ready(function () {
    const loadingOverlay = $(".loading-spinner-overlay");
    let successNotificationShown = false; // Flag to track whether the success notification has been shown

    // Function to show the loading spinner
    function showLoadingSpinner() {
        loadingOverlay.show();
        $("body").css("overflow", "hidden");
    }

    // Function to hide the loading spinner
    function hideLoadingSpinner() {
        loadingOverlay.hide();
        $("body").css("overflow", "auto");
    }
});

$(document).ready(function () {
    const loadingOverlay = $(".loading-spinner-overlay");
    let successNotificationShown = false; // Flag to track whether the success notification has been shown

    // Function to show the loading spinner
    function showLoadingSpinner() {
        loadingOverlay.show();
        $("body").css("overflow", "hidden");
    }

    // Function to hide the loading spinner
    function hideLoadingSpinner() {
        loadingOverlay.hide();
        $("body").css("overflow", "auto");
    }

    $("#new-form-edit").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Show the loading spinner when the form is submitted
        showLoadingSpinner();

        // Perform an AJAX form submission
        $.ajax({
            url: $(this).attr("action"), // Use the form's action attribute as the URL
            type: $(this).attr("method"), // Use the form's method attribute as the HTTP method
            data: $(this).serialize(), // Serialize the form data

            success: function (response) {
                // Display a success Toastr notification if it hasn't been shown already
                if (!successNotificationShown) {
                    location.reload();
                    toastr.success("Updated grade successfully!");
                    successNotificationShown = true; // Set the flag to true
                }

                // Optionally, you can redirect to another page after success
                // window.location.href = "{{ route('your.redirect.route') }}";
            },
            error: function (error) {
                // Hide the loading spinner when there's an error
                hideLoadingSpinner();

                // Handle errors if needed
                toastr.error("An error occurred while submitting the form.");
            },
        });
    });
});

$(document).ready(function () {
    const loadingOverlay = $(".loading-spinner-overlay");
    let successNotificationShown = false; // Flag to track whether the success notification has been shown

    // Function to show the loading spinner
    function showLoadingSpinner() {
        loadingOverlay.show();
        $("body").css("overflow", "hidden");
    }

    // Function to hide the loading spinner
    function hideLoadingSpinner() {
        loadingOverlay.hide();
        $("body").css("overflow", "auto");
    }

    // $("#verify_otp").submit(function (e) {
    //     // showLoadingSpinner();
    // });

    $("#login-form").submit(function (e) {
        showLoadingSpinner();
    });

    const log_out_submit = $("#log-out-submit");
    log_out_submit.click(function (e) {
        showLoadingSpinner();
    });
});

$(document).ready(function () {
    $("#cancel").click(function () {
        var loadingOverlay1 = $(".loading-spinner-overlay");
        let successNotificationShown = false; // Flag to track whether the success notification has been shown

        // Function to show the loading spinner
        function showLoadingSpinner() {
            loadingOverlay1.show();
            $("body").css("overflow", "hidden");
        }

        // Function to hide the loading spinner
        function hideLoadingSpinner() {
            loadingOverlay1.hide();
            $("body").css("overflow", "auto");
        }

        // Show the loading spinner when the form is submitted
        showLoadingSpinner();

        // Perform an AJAX form submission
        $.ajax({
            url: $("#cancel_verify").attr("href"),
            type: "GET",

            success: function (response) {
                toastr.success("Canceled OTP verification!");
                window.location.href = "/login";
            },
            error: function (error) {
                toastr.error("Incorrect OTP, please try again.");
                toastr.error(error);

                // Hide the loading spinner when there's an error
                hideLoadingSpinner();
                toastr.error("An error occurred, please try again.");
            },
        });
    });
});

// Todo

// $(document).ready(function() {
//     let emailInputClicked = false;

//     // Disable email input after it's clicked
//     $('#email').click(function() {
//         if (!emailInputClicked) {
//             $(this).prop('disabled', true);
//             emailInputClicked = true;
//         }
//     });

//     // Enable email input when form is reset
//     $('#login-form').on('reset', function() {
//         $('#email').prop('disabled', false);
//         emailInputClicked = false;
//     });
// });

$(document).ready(function () {
    $(".logout-link").on("click", function (e) {
        $("#logoutModal").modal("show");
    });
});

$(document).ready(function () {
    $(".change-pass").on("click", function (e) {
        $("#changePassModal").modal("show");
    });
});

$(document).ready(function () {
    if ($(".data-table tbody tr").length > 0) {
        $(".data-table").DataTable({
            paging: true,
            paging: true,
            pageLength: 5,
            searching: true,
            ordering: false,
            lengthChange: true,
        });
    } else {
        $(".data-table").html("<p>No data available.</p>");
    }
});

$(document).ready(function () {
    const loadingOverlay = $(".loading-spinner-overlay");
    let successNotificationShown = false; // Flag to track whether the success notification has been shown

    // Function to show the loading spinner
    function showLoadingSpinner() {
        loadingOverlay.show();
        $("body").css("overflow", "hidden");
    }

    // Function to hide the loading spinner
    function hideLoadingSpinner() {
        loadingOverlay.hide();
        $("body").css("overflow", "auto");
    }

    $("#edit-personal-ca-form").submit(function (e) {
        e.preventDefault(); // Prevent the default form submission

        // Show the loading spinner when the form is submitted
        showLoadingSpinner();

        // Perform an AJAX form submission
        $.ajax({
            url: $(this).attr("action"), // Use the form's action attribute as the URL
            type: $(this).attr("method"), // Use the form's method attribute as the HTTP method
            data: $(this).serialize(), // Serialize the form data

            success: function (response) {
                // Display a success Toastr notification if it hasn't been shown already
                if (!successNotificationShown) {
                    location.reload();
                    toastr.success("Successfully updated!");
                    successNotificationShown = true; // Set the flag to true
                }
            },
            error: function (error) {
                // Hide the loading spinner when there's an error
                hideLoadingSpinner();
                toastr.error(
                    "An error occurred while submitting the form. Please try again."
                );
            },
        });
    });
});

// LOGIN

$(document).ready(function () {
    $("#togglePassword").click(function () {
        const passwordInput = $("#password");
        const toggleButton = $(this);

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            toggleButton.html('<span class="far fa-eye-slash"></span>');
        } else {
            passwordInput.attr("type", "password");
            toggleButton.html('<span class="far fa-eye"></span>');
        }
    });

    $("#togglePasswordOnConfirm").click(function () {
        const passwordInputCurrent = $("#current_password");
        const toggleButtonThis = $(this);

        if (passwordInputCurrent.attr("type") === "password") {
            passwordInputCurrent.attr("type", "text");
            toggleButtonThis.html('<span class="far fa-eye-slash"></span>');
        } else {
            passwordInputCurrent.attr("type", "password");
            toggleButtonThis.html('<span class="far fa-eye"></span>');
        }
    });

    $("#togglePasswordOnReset").click(function () {
        togglePasswordVisibility("password_onreset", "togglePasswordOnReset");
    });

    $("#toggleCPassword").click(function () {
        togglePasswordVisibility("cpassword", "toggleCPassword");
    });

    function togglePasswordVisibility(inputId, toggleButtonId) {
        const passwordInput = $("#" + inputId);
        const toggleButton = $("#" + toggleButtonId);

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            toggleButton.html('<span class="far fa-eye-slash"></span>');
        } else {
            passwordInput.attr("type", "password");
            toggleButton.html('<span class="far fa-eye"></span>');
        }
    }
});
$(document).ready(function () {
    setTimeout(() => {
        $(".success-display").fadeOut();
    }, 5000);

    setTimeout(() => {
        $(".error-display").fadeOut();
    }, 5000);
});
