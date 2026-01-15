import Quill from 'quill';
// Or if you only need the core build
// import Quill from 'quill/core';

const quill = new Quill("#editor", {
    theme: "snow",
    placeholder: "Write your content here...",
    modules: {
        toolbar: [
            [{ header: [1, 2, 3, false] }],
            ["bold", "italic", "underline", "strike"],
            [{ list: "ordered" }, { list: "bullet" }],
            [{ color: [] }, { background: [] }],
            ["link", "image"],
            ["clean"],
        ],
    },
});
