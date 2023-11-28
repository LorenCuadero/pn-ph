$(document).ready(function () {
    // Handle tab switching
    $('#grades-tab').click(function (e) {
        e.preventDefault();
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
        $('.tab-pane').removeClass('show active');
        $('#grades').addClass('show active');
    });
    // Add similar code for other tabs if needed
});

$(document).ready(function () {
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href"); // Get the target tab content ID
        $('.tab-pane').removeClass('show active'); // Hide all tab content
        $(target).addClass('show active'); // Show the selected tab content
    });
});