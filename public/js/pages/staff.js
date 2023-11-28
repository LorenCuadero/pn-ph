$(document).ready(function () {
    $("#edit-btn").click(function () {
        var studentId = $(this).data("student-id");
        var editUrl = $(this).data("edit-url");
        $("#editForm").attr(
            "action",
            editUrl.replace("__student_id__", $(this).data("student-id"))
        );

        const editModal = $("#editModal");

        editModal.show();

        editModal.find("#profile_image").attr("src", profileImage);
    });
});
