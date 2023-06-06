/*
Template Name: Shreyu - Responsive Bootstrap 5 Admin Dashboard
Author: CoderThemes
Website: https://coderthemes.com/
Contact: support@coderthemes.com
File: Form Edior init js
*/

// Snow theme
var quill = new Quill("#snow-editor", {
    theme: "snow",
    modules: {
        toolbar: [
            [{ size: [] }],
            ["bold", "italic", "underline", "strike"],
            [{ color: [] }],
            [{ header: [false, 1, 2, 3, 4, 5, 6] }],
            [{ align: [] }],
            ["image"],
            ["clean"],
        ],
    },
});
quill.on("text-change", function (delta, oldDelta, source) {
    document.getElementById("quill_html").value = quill.root.innerHTML;
});
