
document.addEventListener('DOMContentLoaded', function () {
    // Initialize Choices.js without search
    const choices = new Choices('#default-choice', {
        searchEnabled: false,
        placeholder: false, // Ensure no placeholder is shown
        itemSelectText: false,
    });

    let glightboxElement = document.getElementsByClassName('.lightbox');
    if (glightboxElement) {
        GLightbox({
            selector: '.lightbox',
            title: false,
        });
    }
});
