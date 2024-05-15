document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.see-more').forEach(function(button) {
        button.addEventListener('click', function() {

            const postId = this.getAttribute('data-post-id');
            const prefix = postId.startsWith('top-') ? 'top-' : '';
            const descriptionId = (prefix ? 'top-description-' : 'description-') + postId.replace(prefix, '');
            const description = document.getElementById(descriptionId);
            description.classList.toggle('text-truncate');

            if (this.textContent.trim() === this.getAttribute('data-more').trim()) {
                this.textContent = this.getAttribute('data-less');
            } else {
                this.textContent = this.getAttribute('data-more');
            }
        });
    });
});
