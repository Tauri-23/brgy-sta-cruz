const elements = document.querySelectorAll('.btn-text-editor');
const textEditorContent = document.getElementById('text-editor-content');

function updateButtonStates() {
    elements.forEach(element => {
        let command = element.dataset['element'];
        let isActive = document.queryCommandState(command);
        element.classList.toggle('active', isActive);
    });
}

elements.forEach(element => {
    element.addEventListener('click', () => {
        let command = element.dataset['element'];

        if (command == 'createLink' || command == 'insertImage') {
            let url = prompt('Enter the link here', 'https://');
            if (url !== null) {
                document.execCommand(command, false, url);
            }
        } else {
            document.execCommand(command, false, null);
        }

        // Update button states after executing the command
        updateButtonStates();
    });
});

// Update button states when the cursor is moved or content is updated
textEditorContent.addEventListener('input', updateButtonStates);
textEditorContent.addEventListener('mouseup', updateButtonStates);
