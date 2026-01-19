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

function imageSorter() {
    return {
        draggedElement: null,

        init() {
            this.dragging = false;
        },

        dragStart(event, imageId) {
            this.draggedElement = imageId;
            event.dataTransfer.effectAllowed = 'move';
            event.target.classList.add('opacity-50');
            this.dragging = true;
        },

        dragEnd(event) {
            event.target.classList.remove('opacity-50');
            this.dragging = false;
        },

        dragOver(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
        },

        drop(event, targetId) {
            event.preventDefault();

            if (this.draggedElement !== targetId) {
                // Get all image elements
                const container = event.target.closest('[x-data]');
                const images = Array.from(container.querySelectorAll('[draggable="true"]'));

                // Build ordered ID array
                const draggedEl = images.find(el => {
                    const attr = Array.from(el.attributes).find(a =>
                        a.value.includes(this.draggedElement)
                    );
                    return attr !== undefined;
                });

                const targetEl = images.find(el => {
                    const attr = Array.from(el.attributes).find(a =>
                        a.value.includes(targetId)
                    );
                    return attr !== undefined;
                });

                if (draggedEl && targetEl) {
                    const draggedIndex = images.indexOf(draggedEl);
                    const targetIndex = images.indexOf(targetEl);

                    // Reorder in DOM
                    if (draggedIndex < targetIndex) {
                        targetEl.parentNode.insertBefore(draggedEl, targetEl.nextSibling);
                    } else {
                        targetEl.parentNode.insertBefore(draggedEl, targetEl);
                    }

                    // Get new order and notify Livewire
                    const newOrder = Array.from(container.querySelectorAll('[draggable="true"]'))
                        .map(el => {
                            const startAttr = Array.from(el.attributes).find(a =>
                                a.value.includes('dragStart')
                            );
                            if (startAttr) {
                                const match = startAttr.value.match(/'(.*?)'/);
                                return match ? match[1] : null;
                            }
                            return null;
                        })
                        .filter(id => id !== null);

                    @this.call('reorderImages', newOrder);
                }
            }

            this.dragging = false;
        }
    }
}
