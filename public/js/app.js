const button = document.getElementById("form-submit");
button.addEventListener("click", function () {
    form = document.getElementById("form");
    form.submit();
});

// const fileUpload = document.getElementById("file_upload");
// fileUpload.onchange = (e) => {
//     const [file] = fileUpload.files;
//     if (file) {
//         image.src = URL.createObjectURL(file);
//     }
// };
