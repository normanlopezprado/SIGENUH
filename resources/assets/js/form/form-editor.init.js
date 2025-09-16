
// Initialize Quill editor
const snowEditor = new Quill('#snowEditor', {
    theme: 'snow', // Using snow theme
    modules: {
        toolbar: true,
    },
    placeholder: 'Compose your content here...',
});

const bubbleEditor = new Quill('#bubbleEditor', {
    theme: 'bubble', // Corrected theme
    placeholder: 'Compose an epic...',
});
